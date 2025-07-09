<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penyedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;

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
            // Validasi khusus jika role Penyedia
            'nama_penyedia' => 'required_if:role,Penyedia',
            'nama_direktur_penyedia' => 'required_if:role,Penyedia',
            'alamat' => 'required_if:role,Penyedia',
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $user->foto = $request->file('foto')->store('user_fotos', 'public');
        }
        $user->save();
        // Berikan role
        $user->assignRole($request->role);
        // Jika role-nya Penyedia, buat entri di tabel penyedias
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
        // Cegah selain Admin mengakses data orang lain
        if (auth()->user()->id !== $user->id && !auth()->user()->hasRole('Admin')) {
            abort(403);
        }
        $roles = Role::all();
        return view('user.edit', compact('user', 'roles'));
    }
    public function update(Request $request, User $user)
    {
        // Akses hanya oleh user itu sendiri atau Admin
        if (auth()->user()->id !== $user->id && !auth()->user()->hasRole('Admin')) {
            abort(403);
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required_if:role_enabled,true|exists:roles,name',
            'password' => 'nullable|confirmed|min:6',
            'foto' => 'nullable|image|max:2048',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('foto')) {
            if ($user->foto && Storage::disk('public')->exists($user->foto)) {
                Storage::disk('public')->delete($user->foto);
            }
            $user->foto = $request->file('foto')->store('user_fotos', 'public');
        }
        $user->save();
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
