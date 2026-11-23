<?php
include 'cek_session.php';
include 'koneksi.php';

$jml_barang    = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM barang"));
$jml_pelanggan = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pelanggan"));
$jml_transaksi = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM transaksi"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Sistem Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-4">
        <div class="alert alert-primary shadow-sm" role="alert">
            <h4 class="alert-heading">Selamat Datang, <?= htmlspecialchars($_SESSION['nama']); ?>!</h4>
            <p class="mb-0">
                Anda berhasil login sebagai
                <strong><?= ($_SESSION['level'] == 1) ? 'Owner' : 'Kasir'; ?></strong>.
                Silakan gunakan menu navigasi di atas untuk mengelola sistem penjualan.
            </p>
        </div>

        <div class="row mt-4">
            <div class="col-md-4 mb-3">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Data Barang</h5>
                        <p class="card-text fs-2 fw-bold"><?= $jml_barang; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-white bg-info shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Pelanggan</h5>
                        <p class="card-text fs-2 fw-bold"><?= $jml_pelanggan; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-white bg-warning shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Transaksi</h5>
                        <p class="card-text fs-2 fw-bold"><?= $jml_transaksi; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>