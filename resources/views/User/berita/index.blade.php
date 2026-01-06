@extends('user.layouts.app')
@section('title','Berita')

@section('content')
<h2 class="fw-bold mb-4">📰 Berita Terbaru</h2>

<div class="row g-4">
@foreach($beritas as $b)
    <div class="col-md-4">
        <div class="card h-100 shadow-sm">
            <img src="{{ asset('storage/'.$b->gambar) }}" class="card-img-top" style="height:200px;object-fit:cover">
            <div class="card-body">
                <h5 class="fw-bold">{{ $b->judul }}</h5>
                <p class="text-muted">{{ Str::limit($b->konten, 100) }}</p>
                <a href="{{ route('user.berita.show',$b->id) }}" class="btn btn-success btn-sm">
                    Baca Selengkapnya
                </a>
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection
