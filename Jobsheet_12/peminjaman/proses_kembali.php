<?php
require_once '../includes/auth.php';
require_once '../includes/koneksi.php';
require_once '../includes/helpers.php';
require_once '../includes/csrf.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: kembali.php');
    exit;
}

csrf_verify();

$id = $_POST['id'] ?? '';

if ($id === '') {
    header('Location: kembali.php');
    exit;
}

try {
    $pdo->beginTransaction();

    $stmt = $pdo->prepare("
        SELECT buku_id
        FROM peminjaman
        WHERE id = ? AND status = 'dipinjam'
        FOR UPDATE
    ");
    $stmt->execute([$id]);
    $peminjaman = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$peminjaman) {
        $pdo->rollBack();
        header('Location: kembali.php');
        exit;
    }

    $stmt = $pdo->prepare("
        UPDATE peminjaman
        SET status = 'dikembalikan',
            tanggal_kembali = CURRENT_DATE
        WHERE id = ?
    ");
    $stmt->execute([$id]);

    $stmt = $pdo->prepare("
        UPDATE buku
        SET stok = stok + 1
        WHERE id = ?
    ");
    $stmt->execute([$peminjaman['buku_id']]);

    $pdo->commit();

    header('Location: kembali.php');
    exit;
} catch (PDOException $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }

    die("Gagal memproses pengembalian: " . $e->getMessage());
}