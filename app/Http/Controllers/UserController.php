<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\Penyedia;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('user.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|exists:roles,name',
            'foto' => 'nullable|image|max:2048',
            // validasi hanya jika role penyedia dipilih
            'nama_penyedia' => 'required_if:role,Penyedia',
            'nama_direktur_penyedia' => 'required_if:role,Penyedia',
            'alamat' => 'required_if:role,Penyedia',
        ]);
        // Simpan user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('user_fotos', 'public');
            $user->foto = $fotoPath;
            $user->save();
        }
        // Beri role ke user
        $user->assignRole($request->role);
        // Jika role-nya Penyedia → simpan juga ke tabel penyedias
        if ($request->role === 'Penyedia') {
            Penyedia::create([
                'user_id' => $user->id,
                'nama_penyedia' => $request->nama_penyedia,
                'nama_direktur_penyedia' => $request->nama_direktur_penyedia,
                'alamat' => $request->alamat,
            ]);
        }
        return redirect()->route('user.index')->with('success', 'User berhasil ditambah');
    }
    public function edit(User $user)
    {
        // dd(auth()->user()->getRoleNames());
        // Cegah selain admin mengakses profil orang lain
        if (auth()->user()->id !== $user->id && !auth()->user()->hasRole('Admin')) {
            abort(403);
        }
        $roles = Role::all();
        return view('user.edit', compact('user', 'roles'));
    }
    public function update(Request $request, User $user)
    {
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto && \Storage::disk('public')->exists($user->foto)) {
                \Storage::disk('public')->delete($user->foto);
            }
            $user->foto = $request->file('foto')->store('user_fotos', 'public');
        }
        $user->save();
        // Hanya admin atau user itu sendiri yang boleh update
        if (auth()->user()->id !== $user->id && !auth()->user()->hasRole('Admin')) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required_if:role_enabled,true|exists:roles,name',
            'password' => 'nullable|confirmed|min:6',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('foto')) {
            // hapus foto lama
            if ($user->foto && \Storage::disk('public')->exists($user->foto)) {
                \Storage::disk('public')->delete($user->foto);
            }
            $user->foto = $request->file('foto')->store('user_fotos', 'public');
        }
        $user->save();
        // Hanya admin yang boleh mengubah role
        if (auth()->user()->hasRole('Admin')) {
            $user->syncRoles([$request->role]);
        }
        return redirect()->route('user.index')->with('success', 'User berhasil diupdate');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }
}
