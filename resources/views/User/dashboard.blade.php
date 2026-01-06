@extends('admin.layouts.app')

@section('title','Dashboard Admin')
@section('page_title','Dashboard Puskesmas')
@section('page_subtitle','Pantau ringkasan layanan, konten, dan operasional')

@section('content')
  <!-- KPI Cards -->
  <div class="row g-4 mb-2">
    @php
      // contoh angka (nanti kamu ganti dari controller)
      $kpi = [
        ['label'=>'Kunjungan Hari Ini','value'=>$kunjungan_hari_ini ?? 18, 'icon'=>'bi-clipboard2-pulse'],
        ['label'=>'Antrian Aktif','value'=>$antrian_aktif ?? 7, 'icon'=>'bi-person-lines-fill'],
        ['label'=>'Berita','value'=>$berita ?? 0, 'icon'=>'bi-newspaper'],
        ['label'=>'Pengumuman','value'=>$pengumuman ?? 0, 'icon'=>'bi-megaphone-fill'],
      ];
    @endphp

    @foreach($kpi as $item)
      <div class="col-12 col-md-6 col-xl-3">
        <div class="card card-soft p-3">
          <div class="d-flex align-items-center justify-content-between">
            <div class="kpi-icon"><i class="bi {{ $item['icon'] }}"></i></div>
            <span class="badge badge-soft rounded-pill">Update realtime</span>
          </div>
          <div class="mt-3">
            <div class="text-muted small">{{ $item['label'] }}</div>
            <div class="fs-3 fw-bold">{{ $item['value'] }}</div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="row g-4 mt-1">
    <!-- Tabel Antrian/Janji -->
    <div class="col-12 col-xl-8">
      <div class="card card-soft">
        <div class="p-3 d-flex align-items-center justify-content-between">
          <div>
            <div class="fw-semibold">Antrian / Janji Hari Ini</div>
            <small class="text-muted">Daftar pasien yang sedang berjalan</small>
          </div>
          <a href="#" class="btn btn-puskesmas text-white rounded-pill px-3">
            <i class="bi bi-plus-circle me-1"></i>Tambah
          </a>
        </div>

        <div class="table-responsive">
          <table class="table align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Poli</th>
                <th>Jam</th>
                <th>Status</th>
                <th class="text-end">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                $rows = $rows ?? [
                  ['no'=>'A-012','nama'=>'Siti Aisyah','poli'=>'Umum','jam'=>'08:30','status'=>'Menunggu'],
                  ['no'=>'A-013','nama'=>'Budi Santoso','poli'=>'KIA','jam'=>'08:45','status'=>'Dipanggil'],
                  ['no'=>'A-014','nama'=>'Rina Putri','poli'=>'Gigi','jam'=>'09:00','status'=>'Selesai'],
                ];
              @endphp

              @foreach($rows as $r)
                <tr>
                  <td class="fw-semibold">{{ $r['no'] }}</td>
                  <td>{{ $r['nama'] }}</td>
                  <td><span class="badge badge-soft rounded-pill">{{ $r['poli'] }}</span></td>
                  <td>{{ $r['jam'] }}</td>
                  <td>
                    @php
                      $map = [
                        'Menunggu' => 'secondary',
                        'Dipanggil' => 'warning',
                        'Selesai' => 'success',
                      ];
                      $b = $map[$r['status']] ?? 'secondary';
                    @endphp
                    <span class="badge text-bg-{{ $b }} rounded-pill">{{ $r['status'] }}</span>
                  </td>
                  <td class="text-end">
                    <a class="btn btn-sm btn-light border rounded-pill" href="#"><i class="bi bi-eye"></i></a>
                    <a class="btn btn-sm btn-light border rounded-pill" href="#"><i class="bi bi-pencil"></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="p-3 border-top text-end">
          <a href="#" class="text-decoration-none">Lihat semua antrian <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
    </div>

    <!-- Aktivitas + Quick Actions -->
    <div class="col-12 col-xl-4">
      <div class="card card-soft mb-4">
        <div class="p-3">
          <div class="fw-semibold">Quick Actions</div>
          <small class="text-muted">Akses cepat untuk admin</small>

          <div class="d-grid gap-2 mt-3">
            <a href="#" class="btn btn-light border rounded-4 text-start">
              <i class="bi bi-newspaper me-2"></i> Tambah Berita
            </a>
            <a href="#" class="btn btn-light border rounded-4 text-start">
              <i class="bi bi-megaphone-fill me-2"></i> Tambah Pengumuman
            </a>
            <a href="#" class="btn btn-light border rounded-4 text-start">
              <i class="bi bi-calendar2-check-fill me-2"></i> Kelola Janji
            </a>
            <a href="#" class="btn btn-light border rounded-4 text-start">
              <i class="bi bi-capsule-pill me-2"></i> Stok Obat
            </a>
          </div>
        </div>
      </div>

      <div class="card card-soft">
        <div class="p-3">
          <div class="fw-semibold">Aktivitas Terbaru</div>
          <small class="text-muted">Log singkat admin</small>

          @php
            $logs = $logs ?? [
              ['t'=>'08:10','txt'=>'Admin menambahkan pengumuman jadwal dokter.'],
              ['t'=>'08:35','txt'=>'Update stok obat Paracetamol.'],
              ['t'=>'09:05','txt'=>'Menambah berita: “Program Imunisasi”.'],
            ];
          @endphp

          <ul class="list-group list-group-flush mt-3">
            @foreach($logs as $l)
              <li class="list-group-item px-0">
                <div class="d-flex justify-content-between">
                  <span>{{ $l['txt'] }}</span>
                  <span class="text-muted small">{{ $l['t'] }}</span>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection
