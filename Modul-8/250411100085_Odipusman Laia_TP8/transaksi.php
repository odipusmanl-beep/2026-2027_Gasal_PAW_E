<?php
include 'cek_session.php';
include 'koneksi.php';

$sql = "SELECT transaksi.*, pelanggan.*, user.*
        FROM transaksi
        LEFT JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan
        LEFT JOIN user ON transaksi.id_user = user.id_user";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi - Sistem Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">Data Transaksi</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>ID / No. Faktur</th>
                                <th>Tanggal</th>
                                <th>Pelanggan</th>
                                <th>Kasir</th>
                                <th>Total Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($data = mysqli_fetch_array($query)) {
                                // Menyesuaikan otomatis dengan nama kolom yang ada di database tp_modul08
                                $faktur  = $data['no_faktur'] ?? $data['id_transaksi'] ?? '-';
                                $tanggal = $data['tanggal_transaksi'] ?? $data['waktu_transaksi'] ?? $data['tanggal'] ?? '-';
                                $plg     = $data['nama_pelanggan'] ?? $data['nama'] ?? 'Umum';
                                $kasir   = $data['nama_user'] ?? $data['nama'] ?? $data['username'] ?? '-';
                                $total   = $data['total_bayar'] ?? $data['total'] ?? 0;
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($faktur); ?></td>
                                <td><?= htmlspecialchars($tanggal); ?></td>
                                <td><?= htmlspecialchars($plg); ?></td>
                                <td><?= htmlspecialchars($kasir); ?></td>
                                <td>Rp <?= number_format($total, 0, ',', '.'); ?></td>
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