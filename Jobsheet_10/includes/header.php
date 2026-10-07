<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$__jobsheetRoot = dirname(__DIR__);
$__scriptDir = dirname($_SERVER['SCRIPT_FILENAME']);
$__rel = ltrim(
    str_replace(
        '\\',
        '/',
        substr($__scriptDir, strlen($__jobsheetRoot))
    ),
    '/'
);

$base = $__rel === ''
    ? ''
    : str_repeat('../', substr_count($__rel, '/') + 1);

$isLogin = isset($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMPUS-Mini<?php echo isset($page_title) ? ' | ' . $page_title : ''; ?></title>
    <link rel="stylesheet" href="<?php echo $base; ?>assets/css/style.css">
</head>

<body>
    <header>
        <h1>SIMPUS-Mini</h1>

        <button type="button" id="nav-toggle-btn" class="nav-toggle-label" aria-label="Menu">
            &#9776;
        </button>

        <nav>
            <ul>
                <li>
                    <a href="<?php echo $base; ?>index.php">
                        Beranda
                    </a>
                </li>

                <li>
                    <a href="<?php echo $base; ?>buku/list.php">
                        Daftar Buku
                    </a>
                </li>

                <?php if ($isLogin): ?>

                <li>
                    <a href="<?php echo $base; ?>buku/tambah.php">
                        Tambah Buku
                    </a>
                </li>

                <li>
                    <a href="<?php echo $base; ?>anggota/list.php">
                        Daftar Anggota
                    </a>
                </li>

                <li>
                    <a href="<?php echo $base; ?>anggota/tambah.php">
                        Tambah Anggota
                    </a>
                </li>

                <li>
                    <span>
                        <?php echo $_SESSION['user']['nama']; ?>
                    </span>
                </li>

                <li>
                    <a href="<?php echo $base; ?>auth/logout.php">
                        Logout
                    </a>
                </li>

                <?php else: ?>

                <li>
                    <a href="<?php echo $base; ?>auth/login.php">
                        Login
                    </a>
                </li>

                <li>
                    <a href="<?php echo $base; ?>auth/register.php">
                        Registrasi
                    </a>
                </li>

                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>