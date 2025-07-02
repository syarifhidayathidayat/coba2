@extends('layouts.app')

@section('title', 'Manajemen Menu')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Manajemen Menu</h4>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <a href="{{ route('menu.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Menu
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Icon</th>
                                    <th>Route</th>
                                    <th>Parent Menu</th>
                                    <th>Urutan</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($menus as $index => $menu)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $menu->name }}</td>
                                        <td><i class="{{ $menu->icon }}"></i> {{ $menu->icon }}</td>
                                        <td>{{ $menu->route }}</td>
                                        <td>{{ $menu->parent ? $menu->parent->name : '-' }}</td>
                                        <td>{{ $menu->order }}</td>
                                        <td>
                                            @foreach($menu->roles as $role)
                                            <span class="badge bg-info text-light">{{ $role->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $menu->is_active ? 'success' : 'danger' }}">
                                                {{ $menu->is_active ? 'Aktif' : 'Nonaktif' }}
                                              </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Tidak ada data menu</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
