<?php
include 'cek_session.php';
include 'koneksi.php';

// Proteksi khusus level 1 (Owner)
if ($_SESSION['level'] != 1) {
    echo "<script>alert('Akses ditolak! Halaman ini hanya untuk Owner.'); window.location='index.php';</script>";
    exit;
}

// Proses Tambah User
if (isset($_POST['tambah'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);
    $nama     = mysqli_real_escape_string($conn, $_POST['nama']);
    $level    = $_POST['level'];

    mysqli_query($conn, "INSERT INTO user (username, password, nama_user, level) VALUES ('$username', '$password', '$nama', '$level')");
    header("location:data_user.php");
    exit;
}

// Proses Hapus User
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM user WHERE id_user='$id'");
    header("location:data_user.php");
    exit;
}

$data_user = mysqli_query($conn, "SELECT * FROM user");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data User - Sistem Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-4">
        <h3>Data User</h3>

        <!-- Form Tambah User -->
        <form method="POST" class="row g-2 my-3">
            <div class="col-md-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="col-md-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
            </div>
            <div class="col-md-2">
                <select name="level" class="form-select" required>
                    <option value="1">1 - Owner</option>
                    <option value="2">2 - Kasir</option>
                </select>
            </div>
            <div class="col-md-1">
                <button type="submit" name="tambah" class="btn btn-primary w-100">Tambah</button>
            </div>
        </form>

        <!-- Tabel Data User -->
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; while ($row = mysqli_fetch_assoc($data_user)) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['username']); ?></td>
                    <td><?= htmlspecialchars($row['nama_user'] ?? $row['nama'] ?? '-'); ?></td>
                    <td><?= ($row['level'] == 1) ? 'Owner (1)' : 'Kasir (2)'; ?></td>
                    <td>
                        <a href="data_user.php?hapus=<?= $row['id_user']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus user ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>