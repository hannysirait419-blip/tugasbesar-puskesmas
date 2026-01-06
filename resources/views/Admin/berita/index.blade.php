@extends('admin.layouts.app')
@section('title','Berita')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <h4 class="fw-bold text-primary">Berita</h4>
    <a href="/admin/berita/create" class="btn btn-primary">
        + Tambah Berita
    </a>
</div>

@foreach($items as $b)
<div class="card card-soft mb-3 p-4">
    <h6 class="fw-bold">{{ $b->judul }}</h6>
    <small class="text-muted">{{ $b->created_at->format('d M Y') }}</small>

    <div class="mt-3">
        <a href="/admin/berita/{{ $b->id }}/edit" class="btn btn-outline-primary btn-sm">
            Edit
        </a>

        <form action="/admin/berita/{{ $b->id }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button class="btn btn-outline-danger btn-sm"
                onclick="return confirm('Hapus berita?')">
                Hapus
            </button>
        </form>
    </div>
</div>
@endforeach
@endsection
