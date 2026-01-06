@extends('admin.layouts.app')
@section('title','Pengumuman')

@section('content')
<h4 class="fw-bold text-primary mb-4">Pengumuman</h4>

@foreach($items as $p)
<div class="card card-soft mb-3 p-4">
    <h6 class="fw-bold">{{ $p->judul }}</h6>
    <p class="text-muted">{{ $p->deskripsi }}</p>

    <div>
        <a href="{{ asset('storage/'.$p->file) }}"
            class="btn btn-outline-primary btn-sm">
            Lihat File
        </a>

        <a href="/admin/pengumuman/{{ $p->id }}/edit"
            class="btn btn-outline-primary btn-sm">
            Edit
        </a>

        <form action="/admin/pengumuman/{{ $p->id }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button class="btn btn-outline-danger btn-sm">Hapus</button>
        </form>
    </div>
</div>
@endforeach
@endsection