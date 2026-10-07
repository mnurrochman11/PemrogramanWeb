# SIMPUS-Mini

SIMPUS-Mini merupakan aplikasi sederhana untuk mengelola data perpustakaan. Aplikasi ini digunakan untuk mengelola data buku, anggota, peminjaman, pengembalian, dan riwayat transaksi.

## Fitur

- Melihat daftar buku
- Menambah, mengubah, dan menghapus data buku
- Melihat daftar anggota
- Menambah, mengubah, dan menghapus data anggota
- Registrasi petugas
- Login dan logout
- Peminjaman buku
- Pengembalian buku
- Riwayat peminjaman
- Perhitungan stok buku
- Perlindungan CSRF
- Perlindungan XSS
- Session protection
- Prepared statement

## Struktur Utama

```text
Jobsheet_13/
├── assets/
├── auth/
├── anggota/
├── buku/
├── peminjaman/
├── includes/
├── sql/
├── dokumentasi/
├── docs/
├── index.php
├── laporan.md
└── README.md
```

## Database

Aplikasi menggunakan PostgreSQL sebagai database.

Database yang digunakan adalah:

```text
simpus_mini
```

Tabel utama yang digunakan:

- `buku`
- `anggota`
- `users`
- `peminjaman`

## Konfigurasi Database

Konfigurasi database disimpan pada file:

```text
includes/config.php
```

File tersebut digunakan oleh:

```text
includes/koneksi.php
```

untuk melakukan koneksi ke database PostgreSQL.

## Menjalankan Aplikasi

1. Pastikan PostgreSQL sudah aktif.
2. Pastikan database `simpus_mini` sudah tersedia.
3. Pastikan konfigurasi database pada `includes/config.php` sudah sesuai.
4. Jalankan project menggunakan PHP Live Server.
5. Buka aplikasi melalui browser.

## Login

Pengguna dapat melakukan registrasi melalui halaman Registrasi.

Setelah memiliki akun, pengguna dapat melakukan login untuk mengakses fitur pengelolaan data dan transaksi perpustakaan.

## Pengelolaan Buku

Petugas dapat melihat, menambah, mengubah, dan menghapus data buku melalui menu Daftar Buku.

Data buku juga memiliki informasi stok yang digunakan dalam proses peminjaman dan pengembalian.

## Pengelolaan Anggota

Petugas dapat melihat, menambah, mengubah, dan menghapus data anggota melalui menu Daftar Anggota.

## Peminjaman

Petugas dapat melakukan peminjaman dengan memilih anggota dan buku yang tersedia.

Setelah transaksi berhasil:

- Data peminjaman disimpan ke database.
- Stok buku berkurang satu.
- Status transaksi menjadi `dipinjam`.

## Pengembalian

Petugas dapat memproses pengembalian buku melalui menu Pengembalian.

Setelah pengembalian berhasil:

- Status transaksi berubah menjadi `dikembalikan`.
- Tanggal pengembalian dicatat.
- Stok buku bertambah satu.

## Riwayat

Menu Riwayat digunakan untuk melihat seluruh transaksi peminjaman yang telah dilakukan.

Informasi yang ditampilkan meliputi anggota, buku, tanggal peminjaman, tanggal pengembalian, dan status transaksi.

## Dokumentasi Pengguna

Panduan penggunaan aplikasi tersedia pada:

```text
docs/manual-pengguna.md
```

Panduan tersebut menjelaskan cara menggunakan aplikasi mulai dari registrasi, login, pengelolaan buku dan anggota, peminjaman, pengembalian, hingga logout.

## Keamanan

SIMPUS-Mini menerapkan beberapa mekanisme keamanan, yaitu:

- CSRF Token
- Escaping output untuk membantu mencegah XSS
- Session regeneration setelah login
- Prepared statement
- Auth guard pada halaman yang membutuhkan login
