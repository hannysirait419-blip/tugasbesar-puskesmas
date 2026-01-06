@extends('user.layouts.app')

@section('title','Beranda')

@section('content')

{{-- HERO --}}
<section class="hero">
    <div class="container">
        <span class="badge badge-health mb-3">Pusat Pelayanan Kesehatan Masyarakat</span>

        <h1 class="display-5 fw-bold mt-3 mb-4">
            Melayani Kesehatan<br>
            Masyarakat Dengan<br>
            <span class="text-success">Profesional & Empati</span>
        </h1>

        <p class="fs-5 text-muted mb-4" style="max-width:600px">
            Puskesmas hadir sebagai garda terdepan pelayanan kesehatan
            yang mudah diakses, terpercaya, dan berkelanjutan.
        </p>

        <div class="d-flex gap-3">
            <a href="/pengumuman" class="btn btn-success btn-lg px-4">Pengumuman</a>
            <a href="/profil" class="btn btn-outline-success btn-lg px-4">Profil Kami</a>
        </div>
    </div>
</section>

{{-- LAYANAN --}}

<section class="py-5 bg-white">
    <div class="container">
        <div class="mb-4">
            <h2 class="section-title">Berita Terbaru</h2>
            <p class="text-muted">Informasi dan kegiatan terkini</p>
        </div>

        <div class="row g-4">
            @forelse ($berita as $item)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('storage/'.$item->gambar) }}"
                             class="card-img-top"
                             style="height:200px; object-fit:cover">

                        <div class="card-body">
                            <h5 class="fw-semibold">{{ $item->judul }}</h5>
                            <p class="text-muted small">
                                {{ Str::limit(strip_tags($item->isi), 100) }}
                            </p>
                            <a href="{{ route('berita.show', $item->id) }}"
                               class="btn btn-sm btn-outline-success">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada berita.</p>
            @endforelse
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="mb-4">
            <h2 class="section-title">Pengumuman</h2>
            <p class="text-muted">Informasi penting untuk masyarakat</p>
        </div>

        <div class="list-group">
            @forelse ($pengumuman as $item)
                <a href="{{ route('pengumuman.show', $item->id) }}"
                   class="list-group-item list-group-item-action">
                    <div class="fw-semibold">{{ $item->judul }}</div>
                    <small class="text-muted">
                        {{ $item->created_at->format('d M Y') }}
                    </small>
                </a>
            @empty
                <div class="text-muted">Belum ada pengumuman.</div>
            @endforelse
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="mb-5">
            <h2 class="section-title">Layanan Utama</h2>
            <p class="text-muted">Pelayanan kesehatan yang tersedia di Puskesmas</p>
        </div>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-heart-pulse"></i></div>
                    <h5 class="fw-semibold">Rawat Jalan</h5>
                    <p class="text-muted">Pemeriksaan dan pengobatan pasien umum</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-people"></i></div>
                    <h5 class="fw-semibold">KIA & KB</h5>
                    <p class="text-muted">Pelayanan kesehatan ibu dan anak</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-shield-plus"></i></div>
                    <h5 class="fw-semibold">Imunisasi</h5>
                    <p class="text-muted">Program imunisasi balita dan anak</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-flask"></i></div>
                    <h5 class="fw-semibold">Laboratorium</h5>
                    <p class="text-muted">Pemeriksaan penunjang medis</p>
                </div>
            </div>
        </div>
    </div>
</section>



{{-- STRIP INFO --}}
<section class="py-5">
    <div class="container">
        <div class="info-strip text-center">
            <h3 class="fw-bold mb-3">Informasi & Kegiatan Terbaru</h3>
            <p class="mb-4">
                Ikuti berita, pengumuman, dan kegiatan resmi Puskesmas
            </p>
            <a href="/berita" class="btn btn-light btn-lg px-4">Lihat Berita</a>
        </div>
    </div>
</section>


@endsection
