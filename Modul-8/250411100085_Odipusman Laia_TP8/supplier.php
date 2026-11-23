<?php
include 'cek_session.php';
include 'koneksi.php';

$sql = "SELECT barang.*, supplier.*
        FROM barang
        LEFT JOIN supplier ON barang.id_supplier = supplier.id_supplier";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang - Sistem Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Data Barang</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Supplier</th>
                                <th>Harga</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($data = mysqli_fetch_array($query)) {
                                $kode  = $data['kode_barang'] ?? $data['id_barang'] ?? '-';
                                $nama  = $data['nama_barang'] ?? '-';
                                $sup   = $data['nama_supplier'] ?? $data['nama'] ?? '-';
                                $harga = $data['harga_jual'] ?? $data['harga'] ?? 0;
                                $stok  = $data['stok'] ?? 0;
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($kode); ?></td>
                                <td><?= htmlspecialchars($nama); ?></td>
                                <td><?= htmlspecialchars($sup); ?></td>
                                <td>Rp <?= number_format($harga, 0, ',', '.'); ?></td>
                                <td><?= $stok; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>