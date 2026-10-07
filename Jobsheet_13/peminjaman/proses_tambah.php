<?php
require_once '../includes/auth.php';
require_once '../includes/koneksi.php';
require_once '../includes/helpers.php';
require_once '../includes/csrf.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: tambah.php');
    exit;
}

csrf_verify();

$anggota_id = $_POST['anggota_id'] ?? '';
$buku_id = $_POST['buku_id'] ?? '';

if ($anggota_id === '' || $buku_id === '') {
    header('Location: tambah.php');
    exit;
}

try {
    $pdo->beginTransaction();

    $stmt = $pdo->prepare(
        "SELECT stok FROM buku WHERE id = ? FOR UPDATE"
    );
    $stmt->execute([$buku_id]);
    $buku = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$buku || (int) $buku['stok'] <= 0) {
        $pdo->rollBack();
        header('Location: tambah.php');
        exit;
    }

    $stmt = $pdo->prepare(
        "INSERT INTO peminjaman 
        (anggota_id, buku_id, tanggal_pinjam, status)
        VALUES (?, ?, CURRENT_DATE, 'dipinjam')"
    );
    $stmt->execute([$anggota_id, $buku_id]);

    $stmt = $pdo->prepare(
        "UPDATE buku SET stok = stok - 1 WHERE id = ?"
    );
    $stmt->execute([$buku_id]);

    $pdo->commit();

    header('Location: riwayat.php');
    exit;
} catch (PDOException $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }

    die("Gagal menyimpan peminjaman: " . $e->getMessage());
}