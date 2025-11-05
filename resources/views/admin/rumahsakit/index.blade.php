@extends('layouts.admin') 
@section('title', 'Data Rumah Sakit')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="font-weight-bold text-dark mb-0">Data Rumah Sakit</h5>
            <a href="{{ route('rumahsakit.create') }}" class="btn btn-cta btn-md">Tambah Rumah Sakit</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $rs)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rs->nama }}</td>
                            <td>{{ $rs->alamat }}</td>
                            <td>{{ $rs->email }}</td>
                            <td>{{ $rs->telepon }}</td>
                            <td>
                                <a href="{{ route('rumahsakit.edit', $rs->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $rs->id }}">
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
            text: 'Data ini akan dihapus permanen.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/rumahsakit/' + id,
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
