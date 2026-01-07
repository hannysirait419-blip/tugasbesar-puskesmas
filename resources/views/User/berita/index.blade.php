@extends('user.layouts.app')
@section('title','Berita')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4 text-success">📰 Berita Terbaru</h2>

    <div class="row g-4">
    @forelse($beritas as $b)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                @if($b->gambar)
                    <img src="{{ asset('storage/'.$b->gambar) }}" class="card-img-top" style="height:200px;object-fit:cover" alt="{{ $b->judul }}">
                @else
                    <img src="https://via.placeholder.com/400x200?text=Berita+Puskesmas" class="card-img-top" style="height:200px;object-fit:cover">
                @endif

                <div class="card-body">
                    <h5 class="fw-bold text-dark">{{ $b->judul }}</h5>
                    <p class="text-muted small mb-2">
                        <i class="bi bi-calendar-event"></i> 
                        {{ $b->created_at ? $b->created_at->format('d M Y') : 'Tanggal tidak tersedia' }}
                    </p>
                    <p class="text-muted">
                        {{ Str::limit(strip_tags($b->konten), 100) }}
                    </p>
                    
                    <a href="#" class="btn btn-success btn-sm w-100 mt-auto">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <div class="alert alert-light border shadow-sm">
                <p class="mb-0 text-muted">Belum ada berita yang diterbitkan saat ini.</p>
            </div>
        </div>
    @endforelse
    </div>
</div>
@endsection
