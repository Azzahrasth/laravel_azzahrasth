@extends('layouts.admin')
@section('title', 'Data Pasien')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="font-weight-bold text-dark mb-0">Data Pasien</h5>
            <a href="{{ route('pasien.create') }}" class="btn btn-cta btn-md">Tambah Pasien</a>
        </div>

        {{-- Filter Rumah Sakit --}}
        <form method="GET" action="{{ route('pasien.index') }}" class="form-inline mb-3">
            <label class="mr-2">Filter Rumah Sakit:</label>
            <select name="rumah_sakit_id" class="form-control mr-2" onchange="this.form.submit()">
                <option value="">Semua</option>
                @foreach($rumahSakits as $rs)
                    <option value="{{ $rs->id }}" {{ $rumahsakit_id == $rs->id ? 'selected' : '' }}>
                        {{ $rs->nama }}
                    </option>
                @endforeach
            </select>
        </form>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}</div>
        @endif

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th>Rumah Sakit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pasiens as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->no_telp }}</td>
                            <td>{{ $p->rumahSakit->nama }}</td>
                            <td>
                                <a href="{{ route('pasien.edit', $p->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $p->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted fst-italic">Tidak ditemukan data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- delete --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.btn-delete').click(function() {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Yakin hapus data?',
            text: 'Data pasien akan dihapus permanen.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/pasien/' + id,
                    type: 'DELETE',
                    data: {_token: '{{ csrf_token() }}'},
                    success: function() {
                        Swal.fire('Terhapus!', 'Data berhasil dihapus.', 'success')
                            .then(() => location.reload());
                    }
                });
            }
        });
    });
</script>
@endsection
