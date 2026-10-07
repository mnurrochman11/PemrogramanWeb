<?php
$page_title = "Registrasi Petugas";

include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>

<section>
    <h2>Registrasi Petugas</h2>

    <?php if ($flash): ?>
    <p class="flash flash-<?php echo $flash['type']; ?>">
        <?php echo $flash['pesan']; ?>
    </p>
    <?php endif; ?>

    <form id="form-tambah" method="post" action="proses_register.php">

        <p>
            <label for="nama">Nama</label><br>
            <input type="text" id="nama" name="nama" required>
        </p>

        <p>
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username" required>
        </p>

        <p>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" required>
        </p>

        <p>
            <label for="role">Role</label><br>
            <select id="role" name="role">
                <option value="petugas">Petugas</option>
            </select>
        </p>

        <p>
            <button type="submit">Daftar</button>
        </p>

    </form>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>