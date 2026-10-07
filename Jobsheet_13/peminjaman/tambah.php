<?php
require_once '../includes/auth.php';
require_once '../includes/koneksi.php';
require_once '../includes/helpers.php';
require_once '../includes/csrf.php';

$stmtAnggota = $pdo->query("SELECT id, nama FROM anggota ORDER BY nama ASC");
$anggota = $stmtAnggota->fetchAll(PDO::FETCH_ASSOC);

$stmtBuku = $pdo->query("SELECT id, judul, stok FROM buku WHERE stok > 0 ORDER BY judul ASC");
$buku = $stmtBuku->fetchAll(PDO::FETCH_ASSOC);

require_once '../includes/header.php';
?>

<h2>Peminjaman Buku</h2>

<form action="proses_tambah.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">

    <label for="anggota_id">Anggota</label>
    <select name="anggota_id" id="anggota_id" required>
        <option value="">-- Pilih Anggota --</option>
        <?php foreach ($anggota as $row): ?>
        <option value="<?= e($row['id']) ?>">
            <?= e($row['nama']) ?>
        </option>
        <?php endforeach; ?>
    </select>

    <label for="buku_id">Buku</label>
    <select name="buku_id" id="buku_id" required>
        <option value="">-- Pilih Buku --</option>
        <?php foreach ($buku as $row): ?>
        <option value="<?= e($row['id']) ?>">
            <?= e($row['judul']) ?> (Stok: <?= e($row['stok']) ?>)
        </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Simpan Peminjaman</button>
</form>

<?php require_once '../includes/footer.php'; ?>