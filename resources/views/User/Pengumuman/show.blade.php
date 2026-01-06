@extends('layouts.public')

@section('title', $item->judul)

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">

                <span class="badge bg-success mb-3">
                    {{ date('d M Y', strtotime($item->tanggal_publish)) }}
                </span>

                <h3 class="fw-bold mb-3">{{ $item->judul }}</h3>

                <p style="line-height: 1.9; text-align: justify;">
                    {{ $item->isi }}
                </p>

                @if ($item->file)
                    <a href="{{ asset('storage/'.$item->file) }}"
                       target="_blank"
                       class="btn btn-success mt-3">
                        📄 Unduh Lampiran
                    </a>
                @endif

                <hr>

                <a href="{{ route('pengumuman.index') }}"
                   class="btn btn-outline-secondary btn-sm">
                    ← Kembali ke Pengumuman
                </a>

            </div>
        </div>

    </div>
</div>

@endsection
