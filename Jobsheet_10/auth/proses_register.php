<?php
session_start();

require __DIR__ . '/../includes/koneksi.php';

$nama = trim($_POST['nama'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$role = $_POST['role'] ?? 'petugas';

if ($nama === '' || $username === '' || $password === '') {
    $_SESSION['flash'] = [
        'type' => 'error',
        'pesan' => 'Semua field wajib diisi.'
    ];

    header('Location: register.php');
    exit;
}

$stmt = $pdo->prepare(
    "SELECT id FROM users WHERE username = :username"
);

$stmt->execute([
    'username' => $username
]);

if ($stmt->fetch()) {
    $_SESSION['flash'] = [
        'type' => 'error',
        'pesan' => 'Username sudah digunakan.'
    ];

    header('Location: register.php');
    exit;
}

$passwordHash = password_hash(
    $password,
    PASSWORD_DEFAULT
);

$stmt = $pdo->prepare(
    "INSERT INTO users
    (nama, username, password, role)
    VALUES
    (:nama, :username, :password, :role)"
);

$stmt->execute([
    'nama' => $nama,
    'username' => $username,
    'password' => $passwordHash,
    'role' => $role
]);

$_SESSION['flash'] = [
    'type' => 'success',
    'pesan' => 'Registrasi berhasil. Silakan login.'
];

header('Location: login.php');
exit;