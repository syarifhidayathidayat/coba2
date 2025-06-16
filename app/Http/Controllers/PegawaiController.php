<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pegawai.index', compact('pegawais'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name');
        return view('pegawai.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'nullable|unique:pegawais',
            'jabatan' => 'required',
            'email' => 'nullable|email',
            'role' => 'required|exists:roles,name',
        ]);

        $pegawai = Pegawai::create($request->except('role'));
        $pegawai->assignRole($request->role);
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil disimpan.');
    }

    public function show(Pegawai $pegawai)
    {
        return view('pegawai.show', compact('pegawai'));
    }

    public function edit(Pegawai $pegawai)
    {
        $roles = Role::all();
        return view('pegawai.edit', compact('pegawai', 'roles'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $pegawai->id,
            'role' => 'required|exists:roles,name',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $pegawai->name = $request->name;
        $pegawai->email = $request->email;
        
        if ($request->filled('password')) {
            $pegawai->password = Hash::make($request->password);
        }

        $pegawai->save();

        // Update role
        $pegawai->syncRoles([$request->role]);

        return redirect()->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil diperbarui');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dihapus.');
    }
}

