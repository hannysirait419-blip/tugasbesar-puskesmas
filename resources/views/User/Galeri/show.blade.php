@extends('layouts.public')

@section('title',$galeri->judul_kegiatan)

@section('content')
<h1 class="fw-bold mb-4">{{ $galeri->judul_kegiatan }}</h1>

@foreach($galeri->fotos as $foto)
    <img src="{{ asset('storage/'.$foto->foto) }}"
         class="img-fluid rounded mb-4">
@endforeach
@endsection
