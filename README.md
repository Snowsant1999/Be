Aplikasi manajemen perpustakaan berbasis web dengan fitur:

1. CRUD buku untuk admin
2. Peminjaman buku untuk user
3. Autentikasi multi-role (admin/user)

Fitur Utama
Untuk Admin
- Tambah, edit, hapus data buku
- Melihat daftar buku
- Manajemen stok buku

Untuk User
- Melihat daftar buku tersedia
- Meminjam buku
- Mengembalikan buku
- Melihat riwayat peminjaman

Persyaratan Sistem
PHP 8.2+
Composer 2.5+
MySQL 8.0+
Node.js 18+
NPM 9+

Instalasi

1. Clone Repository
git clone https://github.com/username/aplikasi-perpustakaan.git
cd aplikasi-perpustakaan

2. Install Dependencies

composer install
npm install
npm run build

3. Konfigurasi Environment
Buat file .env dari template:

cp .env.example .env
Edit file .env dengan konfigurasi database Anda:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_hahay
DB_USERNAME=root
DB_PASSWORD=

4. Generate Key Aplikasi
php artisan key:generate

5. Migrasi Database

php artisan migrate --seed
Seeder akan membuat:

- 1 admin default (email: admin@perpustakaan.com, password: password)
- 10 data buku contoh
- 2 user contoh

6. Jalankan Aplikasi

php artisan serve
Buka browser dan akses:
http://localhost:8000

Struktur Proyek

app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/
│   │   │   └── BukuController.php
│   │   └── User/
│   │       └── PeminjamanController.php
├── Models/
│   ├── Buku.php
│   └── Peminjaman.php
database/
├── migrations/
├── seeders/
resources/
├── views/
│   ├── admin/
│   │   └── buku/
│   │       ├── index.blade.php
│   │       ├── create.blade.php
│   │       └── edit.blade.php
│   └── user/
│       └── peminjaman/
│           ├── index.blade.php
│           └── create.blade.php
routes/
└── web.php


Penggunaan
Login sebagai Admin
Email: admin@perpustakaan.com

Password: password

Fitur:
- Kelola data buku (tambah, edit, hapus)

Lihat daftar buku

Login sebagai User
Registrasi akun baru atau gunakan:

Email: user@perpustakaan.com

Password: password

Fitur:

- Lihat daftar buku tersedia
- Pinjam buku
- Kembalikan buku
- Lihat riwayat peminjaman