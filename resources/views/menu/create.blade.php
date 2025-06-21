@extends('layouts.app')

@section('title', 'Create Manajemen Menu')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Tambah Menu</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('menu.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nama Menu</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="icon">Icon (Font Awesome)</label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                                id="icon" name="icon" value="{{ old('icon') }}" placeholder="fas fa-home">
                            @error('icon')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="route">Route</label>
                            <input type="text" class="form-control @error('route') is-invalid @enderror" 
                                id="route" name="route" value="{{ old('route') }}" placeholder="dashboard">
                            @error('route')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="parent_id">Parent Menu</label>
                            <select class="form-control @error('parent_id') is-invalid @enderror" 
                                id="parent_id" name="parent_id">
                                <option value="">Pilih Parent Menu</option>
                                @foreach($parentMenus as $parent)
                                    <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                                        {{ $parent->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="order">Urutan</label>
                            <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                id="order" name="order" value="{{ old('order', 0) }}">
                            @error('order')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Role yang Dapat Mengakses</label>
                            <div class="row">
                                @foreach($roles as $role)
                                    <div class="col-md-4">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" 
                                                id="role_{{ $role->id }}" name="roles[]" 
                                                value="{{ $role->id }}"
                                                {{ in_array($role->id, old('roles', [])) ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="role_{{ $role->id }}">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @error('roles')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                            <a href="{{ route('menu.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 