<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pegawai::all();
        return view('pegawai.index', compact('data'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:pegawais',
            'jabatan' => 'required',
        ]);
        Pegawai::create($request->all());
        return redirect()->route('pegawai.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->update($request->all());
        return redirect()->route('pegawai.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Pegawai::destroy($id);
        return back()->with('success', 'Data dihapus');
    }
}
