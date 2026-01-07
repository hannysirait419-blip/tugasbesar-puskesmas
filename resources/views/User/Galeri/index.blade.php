@extends('User.layouts.app')
@section('title','Galeri')

@section('content')
<h2 class="fw-bold mb-4">📸 Galeri Kegiatan</h2>

<div class="row g-3">
@foreach($galeri as $g)
    <div class="col-md-4">
        <div class="card shadow-sm">
            <img src="{{ asset('storage/'.$g->fotos->first()->foto) }}"
                 class="card-img-top"
                 style="height:220px;object-fit:cover">

            <div class="card-body text-center">
                <h6 class="fw-bold">{{ $g->judul_kegiatan }}</h6>
                <a href="{{ route('galeri.show',$g->id) }}"
                   class="btn btn-success btn-sm mt-2">
                    Lihat Galeri
                </a>
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection
