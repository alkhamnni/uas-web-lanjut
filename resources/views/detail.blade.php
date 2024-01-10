@extends('layout.template')

@section('title', $handphone ? $handphone->nama : 'Detail Handphone')

@section('content')
    @if ($handphone)
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-9">
                    <div class="card-body">
                        <h2 class="card-title">{{ $handphone->nama }}</h2>
                        <p class="card-text">{{ $handphone->deskripsi }}</p>
                        <p class="card-text">Kategori :
                            {{ $handphone->category ? $handphone->category->nama_kategori : 'Tidak ada kategori' }}</p>
                        <p class="card-text">Tahun : {{ $handphone->tahun }}</p>
                        <p class="card-text">Perusahaan : {{ $handphone->perusahaan }}</p>
                        <a href="/" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="/images/{{ $handphone->foto_sampul }}" class="img-fluid rounded-end" alt="...">
                </div>
            </div>
        </div>
    @else
        <p>Data handphone tidak ditemukan.</p>
    @endif
@endsection
