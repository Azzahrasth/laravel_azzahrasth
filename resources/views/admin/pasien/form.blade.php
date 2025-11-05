@extends('layouts.admin')
@section('title', isset($pasien) ? 'Edit Pasien' : 'Tambah Pasien')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <h5 class="font-weight-bold text-dark mb-4">
            {{ isset($pasien) ? 'Edit Data Pasien' : 'Tambah Data Pasien' }}
        </h5>

        <form 
            action="{{ isset($pasien) ? route('pasien.update', $pasien->id) : route('pasien.store') }}" 
            method="POST">
            @csrf
            @if(isset($pasien))
                @method('PUT')
            @endif

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nama Pasien</label>
                    <input type="text" name="nama" class="form-control" 
                           value="{{ old('nama', $pasien->nama ?? '') }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label>No. Telepon</label>
                    <input type="text" name="no_telp" class="form-control"
                           value="{{ old('no_telp', $pasien->no_telp ?? '') }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control"
                           value="{{ old('alamat', $pasien->alamat ?? '') }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Rumah Sakit</label>
                    <select name="rumah_sakit_id" class="form-control" required>
                        <option value="">-- Pilih Rumah Sakit --</option>
                        @foreach($rumahSakits as $rs)
                            <option value="{{ $rs->id }}" 
                                {{ (old('rumah_sakit_id', $pasien->rumah_sakit_id ?? '') == $rs->id) ? 'selected' : '' }}>
                                {{ $rs->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-3 d-flex justify-content-end">
                <a href="{{ route('pasien.index') }}" class="btn btn-secondary mr-2">Batal</a>
                <button type="submit" class="btn btn-cta">
                    {{ isset($pasien) ? 'Update' : 'Simpan' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
