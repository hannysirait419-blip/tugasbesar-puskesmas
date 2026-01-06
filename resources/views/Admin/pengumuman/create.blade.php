@extends('layouts.admin')
@section('title','Tambah Pengumuman')

@section('content')
<h4>Tambah Pengumuman</h4>

<form method="POST" action="/admin/pengumuman">
    @csrf
    <div class="mb-3">
        <label>Judul</label>
        <input name="judul" class="form-control">
    </div>

    <div class="mb-3">
        <label>Isi</label>
        <textarea name="isi" class="form-control" rows="5"></textarea>
    </div>

    <button class="btn btn-success">Simpan</button>
</form>
@endsection
