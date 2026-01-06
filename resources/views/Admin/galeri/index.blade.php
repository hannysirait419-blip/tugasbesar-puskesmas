@extends('admin.layouts.app')
@section('title','Galeri')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <h4 class="fw-bold text-primary">Galeri</h4>
    <a href="/admin/galeri/create" class="btn btn-primary">
        + Tambah Galeri
    </a>
</div>

<div class="row g-4">
    @foreach($galeri as $g)
    <div class="col-md-4">
        <div class="card card-soft">
            <img src="{{ asset('storage/'.$g->thumbnail) }}"
                height="180" style="object-fit:cover"
                class="rounded-top">

            <div class="card-body">
                <h6 class="fw-bold">{{ $g->judul }}</h6>

                <div class="mt-2">
                    <a href="/admin/galeri/{{ $g->id }}"
                        class="btn btn-outline-primary btn-sm">
                        Kelola Foto
                    </a>

                    <form action="/admin/galeri/{{ $g->id }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-outline-danger btn-sm">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection