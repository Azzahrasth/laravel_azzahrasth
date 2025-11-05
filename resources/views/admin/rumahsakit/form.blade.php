@extends('layouts.admin')
@section('title', isset($rs) ? 'Edit Rumah Sakit' : 'Tambah Rumah Sakit')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <h5 class="font-weight-bold text-dark mb-4">
            {{ isset($rs) ? 'Edit Data Rumah Sakit' : 'Tambah Rumah Sakit' }}
        </h5>

        <form method="POST" action="{{ isset($rs) ? route('rumahsakit.update', $rs->id) : route('rumahsakit.store') }}">
            @csrf
            @if(isset($rs)) @method('PUT') @endif

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nama Rumah Sakit</label>
                    <input type="text" name="nama" class="form-control" required
                           value="{{ old('nama', $rs->nama ?? '') }}">
                </div>
                <div class="form-group col-md-6">
                    <label>Telepon</label>
                    <input type="text" name="telepon" class="form-control"
                           value="{{ old('telepon', $rs->telepon ?? '') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ old('email', $rs->email ?? '') }}">
                </div>
                <div class="form-group col-md-6">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control"
                           value="{{ old('alamat', $rs->alamat ?? '') }}">
                </div>
            </div>

            <div class="mt-3 d-flex justify-content-end">
                <a href="{{ route('rumahsakit.index') }}" class="btn btn-secondary mr-2">Batal</a>
                <button type="submit" class="btn btn-cta">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
