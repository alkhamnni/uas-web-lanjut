@extends('layout.template')
@section('title', 'Input Data Handphone')
@section('content')
    <h2 class="mb-4">Edit Handphone</h2>
    <form action="/handphone/{{ $handphone->id }}/edit" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">ID Handphone:</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $handphone->id }}" disabled>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $handphone->nama }}"
                required="">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori:</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $handphone->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required="">{{ $handphone->sinopsis }}</textarea>
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun:</label>
            <input type="number" class="form-control" id="tahun" name="tahun" value="{{ $handphone->tahun }}"
                required="">
        </div>
        <div class="mb-3">
            <label for="pemain" class="form-label">Perusahaan:</label>
            <input type="text" class="form-control" id="perusahaan" name="perusahaan" value="{{ $handphone->perusahaan }}"
                required="">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto Sebelumnya:</label>
            <img src="/images/{{ $handphone['foto_sampul'] }}" class="img-thumbnail" alt="..." width="100px">
        </div>
        <div class="mb-3">
            <label for="foto_sampul" class="form-label">Foto Sampul:</label>
            <input type="file" class="form-control" id="foto_sampul" name="foto_sampul">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
