@extends('layout.template')

@section('title', 'Data Handphone Pemoggraman')

@section('content')

    <h1>Data jenis handphone</h1>
    <a href="/handphones/create" class="btn btn-primary">Input handphone</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Kategori</th>
                <th scope="col">Tahun</th>
                <th scope="col">Perusahaan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($handphones as $handphone)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $handphone->nama }}</td>
                    <td>{{ $handphone->category->nama_kategori }}</td>
                    <td>{{ $handphone->tahun }}</td>
                    <td>{{ $handphone->perusahaan }}</td>
                    <td class="text-nowrap">
                        <a href="/handphone/{{ $handphone['id'] }}/edit" class="btn btn-warning">Edit</a>
                        <a href="/handphone/delete/{{ $handphone->id }}" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $handphones->links() }}
    </div>
@endsection
