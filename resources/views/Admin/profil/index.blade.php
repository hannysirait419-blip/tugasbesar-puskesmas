@extends('admin.layouts.app')
@section('title','Profil')

@section('content')
<h4 class="fw-bold text-primary mb-4">Profil Puskesmas</h4>

<div class="card card-soft p-5">
<form method="POST" action="/admin/profil-website">
@csrf @method('PUT')

<label class="form-label">Nama Puskesmas</label>
<input type="text" name="nama" class="form-control mb-3"
       value="{{ $profil->nama }}">

<label class="form-label">Alamat</label>
<textarea name="alamat" class="form-control mb-3">
{{ $profil->alamat }}
</textarea>

<button class="btn btn-primary">
    Simpan Perubahan
</button>
</form>
</div>
@endsection
