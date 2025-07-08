@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Manajemen User</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">+ Tambah User</a>

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $i => $user)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td class="text-center">
                                    <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('img/undraw_profile.svg') }}"
                                        alt="Foto" class="rounded-circle"
                                        style="width: 40px; height: 40px; object-fit: cover;">
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <span class="badge bg-info text-light">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                                            id="aksiDropdown{{ $user->id }}" data-bs-toggle="dropdown"
                                            aria-expanded="false"> <i class="fas fa-cog"></i>
                                            Action
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="aksiDropdown{{ $user->id }}">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('user.edit', $user) }}">
                                                    <i class="fas fa-edit me-2 text-warning"></i> Edit
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('user.destroy', $user) }}" method="POST"
                                                    onsubmit="return confirm('Hapus user ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item text-danger" type="submit">
                                                        <i class="fas fa-trash me-2"></i> Hapus
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                        @if ($users->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">Data kosong</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
