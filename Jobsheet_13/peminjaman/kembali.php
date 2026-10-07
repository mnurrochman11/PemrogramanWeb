<?php
require_once '../includes/auth.php';
require_once '../includes/koneksi.php';
require_once '../includes/helpers.php';
require_once '../includes/csrf.php';

$stmt = $pdo->query("
    SELECT 
        peminjaman.id,
        anggota.nama AS nama_anggota,
        buku.judul,
        peminjaman.tanggal_pinjam
    FROM peminjaman
    JOIN anggota ON peminjaman.anggota_id = anggota.id
    JOIN buku ON peminjaman.buku_id = buku.id
    WHERE peminjaman.status = 'dipinjam'
    ORDER BY peminjaman.tanggal_pinjam ASC
");

$peminjaman = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once '../includes/header.php';
?>

<h2>Pengembalian Buku</h2>

<?php if (count($peminjaman) > 0): ?>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Anggota</th>
            <th>Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($peminjaman as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= e($row['nama_anggota']) ?></td>
            <td><?= e($row['judul']) ?></td>
            <td><?= e($row['tanggal_pinjam']) ?></td>
            <td>
                <form action="proses_kembali.php" method="POST">
                    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
                    <input type="hidden" name="id" value="<?= e($row['id']) ?>">
                    <button type="submit">Kembalikan</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<p>Tidak ada buku yang sedang dipinjam.</p>
<?php endif; ?>

<?php require_once '../includes/footer.php'; ?>