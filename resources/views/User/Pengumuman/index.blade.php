@extends('user.layouts.app')
@section('title','Pengumuman')

@section('content')
<h2 class="fw-bold mb-4">📢 Pengumuman</h2>

<div class="list-group shadow-sm">
@foreach($pengumuman as $p)
    <div class="list-group-item">
        <h5 class="fw-bold">{{ $p->judul }}</h5>
        <p class="mb-2">{{ $p->isi }}</p>

        @if($p->file)
        <a href="{{ asset('storage/'.$p->file) }}"
           class="btn btn-outline-success btn-sm" target="_blank">
            Download Lampiran
        </a>
        @endif
    </div>
@endforeach
</div>
@endsection
