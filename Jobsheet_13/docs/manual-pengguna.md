# Manual Pengguna SIMPUS-Mini

## 1. Registrasi

1. Buka aplikasi SIMPUS-Mini melalui browser.
2. Pilih menu **Registrasi**.
3. Masukkan nama pengguna.
4. Masukkan username.
5. Masukkan password.
6. Klik tombol **Registrasi**.
7. Setelah registrasi berhasil, pengguna dapat melakukan login.

## 2. Login

1. Pilih menu **Login**.
2. Masukkan username.
3. Masukkan password.
4. Klik tombol **Login**.
5. Setelah berhasil login, pengguna dapat mengakses fitur pengelolaan data dan transaksi.

## 3. Mengelola Data Buku

1. Pilih menu **Daftar Buku**.
2. Untuk menambahkan buku, pilih **Tambah Buku**.
3. Masukkan data buku seperti judul, penulis, penerbit, tahun terbit, dan stok.
4. Klik tombol **Simpan**.
5. Data buku akan tersimpan dan ditampilkan pada daftar buku.

### Mengubah Data Buku

1. Buka menu **Daftar Buku**.
2. Pilih buku yang ingin diubah.
3. Klik tombol **Edit**.
4. Ubah data yang diperlukan.
5. Klik tombol **Simpan**.

### Menghapus Data Buku

1. Buka menu **Daftar Buku**.
2. Pilih buku yang ingin dihapus.
3. Klik tombol **Hapus**.
4. Konfirmasi penghapusan data.

## 4. Mengelola Data Anggota

1. Pilih menu **Daftar Anggota**.
2. Untuk menambahkan anggota, pilih **Tambah Anggota**.
3. Masukkan data anggota.
4. Klik tombol **Simpan**.
5. Data anggota akan tersimpan dan ditampilkan pada daftar anggota.

### Mengubah Data Anggota

1. Buka menu **Daftar Anggota**.
2. Pilih anggota yang ingin diubah.
3. Klik tombol **Edit**.
4. Ubah data yang diperlukan.
5. Klik tombol **Simpan**.

### Menghapus Data Anggota

1. Buka menu **Daftar Anggota**.
2. Pilih anggota yang ingin dihapus.
3. Klik tombol **Hapus**.
4. Konfirmasi penghapusan data.

## 5. Peminjaman Buku

1. Pilih menu **Peminjaman**.
2. Pilih anggota yang akan melakukan peminjaman.
3. Pilih buku yang tersedia.
4. Klik tombol **Simpan Peminjaman**.
5. Sistem menyimpan data transaksi peminjaman.
6. Stok buku akan berkurang satu.

## 6. Pengembalian Buku

1. Pilih menu **Pengembalian**.
2. Sistem menampilkan daftar buku yang sedang dipinjam.
3. Pilih transaksi yang akan dikembalikan.
4. Klik tombol **Kembalikan**.
5. Sistem mengubah status transaksi menjadi `dikembalikan`.
6. Stok buku akan bertambah satu.

## 7. Melihat Riwayat Peminjaman

1. Pilih menu **Riwayat**.
2. Sistem menampilkan seluruh transaksi peminjaman.
3. Informasi yang ditampilkan meliputi anggota, buku, tanggal peminjaman, tanggal pengembalian, dan status transaksi.

## 8. Logout

1. Setelah selesai menggunakan aplikasi, pilih menu **Logout**.
2. Session pengguna akan diakhiri.
3. Pengguna akan diarahkan kembali ke halaman login.

## 9. Keamanan Sistem

SIMPUS-Mini menerapkan beberapa mekanisme keamanan untuk menjaga data aplikasi, yaitu:

- CSRF Token untuk melindungi form dari serangan CSRF.
- Escaping output untuk membantu mencegah XSS.
- Session regeneration setelah login.
- Prepared statement untuk query database.
- Auth guard pada halaman yang membutuhkan login.