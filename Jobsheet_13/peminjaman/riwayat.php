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
        peminjaman.tanggal_pinjam,
        peminjaman.tanggal_kembali,
        peminjaman.status
    FROM peminjaman
    JOIN anggota ON peminjaman.anggota_id = anggota.id
    JOIN buku ON peminjaman.buku_id = buku.id
    ORDER BY peminjaman.id DESC
");

$riwayat = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once '../includes/header.php';
?>

<h2>Riwayat Peminjaman</h2>

<?php if (count($riwayat) > 0): ?>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Anggota</th>
            <th>Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($riwayat as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= e($row['nama_anggota']) ?></td>
            <td><?= e($row['judul']) ?></td>
            <td><?= e($row['tanggal_pinjam']) ?></td>
            <td>
                <?= $row['tanggal_kembali']
                            ? e($row['tanggal_kembali'])
                            : '-' ?>
            </td>
            <td><?= e($row['status']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<p>Belum ada riwayat peminjaman.</p>
<?php endif; ?>

<?php require_once '../includes/footer.php'; ?>