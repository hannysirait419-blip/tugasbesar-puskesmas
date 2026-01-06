# SIPUS - Sistem Informasi Puskesmas

Aplikasi manajemen Puskesmas berbasis web menggunakan Laravel 12.

## Persyaratan Sistem

- PHP >= 8.2
- Composer
- MySQL / MariaDB
- Node.js & NPM (opsional, untuk asset)

## Langkah Instalasi

### 1. Clone Repository

```bash
git clone <repo-url>
cd tugasbesar-puskmas
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Konfigurasi Environment

```bash
cp .env.example .env
```

Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=puskesmas
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Jalankan Migrasi Database

```bash
php artisan migrate
```

### 6. Jalankan Seeder (Data Awal)

```bash
php artisan db:seed
```

### 7. Buat Symbolic Link Storage

```bash
php artisan storage:link
```

### 8. Jalankan Server

```bash
php artisan serve
```

Akses aplikasi di: **http://127.0.0.1:8000**

---

## Akun Default

| Role  | Username | Password   |
|-------|----------|------------|
| Admin | `admin`  | `Admin123!` |
| User  | `user`   | `User123!`  |

---

## Struktur Fitur

### Area Admin (`/admin`)
- Dashboard
- Manajemen Berita
- Manajemen Pengumuman
- Manajemen Galeri
- Manajemen Pasien
- Manajemen Antrian/Janji
- Manajemen Obat

### Area Publik
- Beranda
- Profil Puskesmas
- Berita
- Pengumuman
- Galeri

---

## Perintah Berguna

```bash
# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Reset database (hapus semua data & migrasi ulang)
php artisan migrate:fresh --seed
```

---

## Catatan

- Pastikan MySQL/MariaDB sudah berjalan sebelum menjalankan migrasi
- Folder `storage` harus memiliki permission yang benar
- Gunakan `php artisan serve` untuk development

---

**© 2026 SIPUS - Sistem Informasi Puskesmas**
