@extends('user.layouts.app')

@section('title', 'profil')

@section('content')

{{-- HERO PROFIL --}}
<section class="py-5 bg-success text-white">
    <div class="container text-center">
        <h1 class="fw-bold">Profil Puskesmas</h1>
        <p class="mt-2 mb-0">
            Informasi resmi mengenai Puskesmas, visi, misi, dan layanan kesehatan
        </p>
    </div>
</section>

{{-- TENTANG PUSKESMAS --}}
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-md-6">
                <img src="{{ URL::asset('adminlte/dist/img/Logo_Puskesmas.jpg') }}"
                     class="img-fluid rounded-4 shadow"
                     alt="Puskesmas">
            </div>
            <div class="col-md-6">
                <h3 class="fw-bold text-success mb-3">Tentang Kami</h3>
                <p class="text-muted">
                    Puskesmas merupakan fasilitas pelayanan kesehatan tingkat pertama
                    yang menyelenggarakan upaya kesehatan masyarakat dan perorangan
                    dengan mengutamakan upaya promotif dan preventif.
                </p>
                <p class="text-muted mb-0">
                    Kami berkomitmen memberikan pelayanan kesehatan yang profesional,
                    cepat, dan ramah bagi seluruh masyarakat.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- VISI & MISI --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        <h4 class="fw-bold text-success mb-3">Visi</h4>
                        <p class="text-muted mb-0">
                            Terwujudnya masyarakat yang sehat, mandiri, dan berkeadilan
                            melalui pelayanan kesehatan yang bermutu.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        <h4 class="fw-bold text-success mb-3">Misi</h4>
                        <ul class="text-muted mb-0">
                            <li>Meningkatkan mutu pelayanan kesehatan</li>
                            <li>Mengembangkan upaya promotif dan preventif</li>
                            <li>Meningkatkan profesionalisme tenaga kesehatan</li>
                            <li>Mendorong partisipasi aktif masyarakat</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- LAYANAN --}}
<section class="py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-success">Layanan Kesehatan</h3>
            <p class="text-muted">Pelayanan utama yang tersedia di Puskesmas</p>
        </div>

        <div class="row g-4">
            @php
                $layanan = [
                    'Pemeriksaan Umum',
                    'Kesehatan Ibu & Anak',
                    'Imunisasi',
                    'Pelayanan Gizi',
                    'Kesehatan Lingkungan',
                    'Laboratorium Sederhana'
                ];
            @endphp

            @foreach ($layanan as $item)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 text-center">
                        <div class="card-body">
                            <div class="mb-3 text-success fs-1">
                                <i class="bi bi-heart-pulse"></i>
                            </div>
                            <h6 class="fw-semibold">{{ $item }}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
