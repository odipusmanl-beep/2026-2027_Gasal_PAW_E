<?php
include 'cek_session.php';
include 'koneksi.php';

// Filter tanggal jika dipilih oleh user
$tgl_mulai   = isset($_GET['tgl_mulai']) ? $_GET['tgl_mulai'] : '';
$tgl_selesai = isset($_GET['tgl_selesai']) ? $_GET['tgl_selesai'] : '';

$where = "";
if ($tgl_mulai != '' && $tgl_selesai != '') {
    $where = "WHERE DATE(transaksi.tanggal_transaksi) BETWEEN '$tgl_mulai' AND '$tgl_selesai'";
}

$sql = "SELECT transaksi.no_faktur, transaksi.tanggal_transaksi,
               barang.kode_barang, barang.nama_barang, barang.harga_beli,
               detail_transaksi.qty, detail_transaksi.harga_satuan, detail_transaksi.subtotal
        FROM detail_transaksi
        JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi
        JOIN barang ON detail_transaksi.id_barang = barang.id_barang
        $where
        ORDER BY transaksi.tanggal_transaksi DESC";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan - Sistem Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Menyembunyikan tombol filter & navbar saat dicetak (Print) */
        @media print {
            .no-print, nav { display: none !important; }
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Laporan Penjualan</h5>
                <button onclick="window.print()" class="btn btn-light btn-sm no-print">Cetak Laporan</button>
            </div>
            <div class="card-body">
                <!-- Form Filter Tanggal -->
                <form method="GET" class="row g-3 mb-4 no-print">
                    <div class="col-md-4">
                        <label class="form-label">Dari Tanggal</label>
                        <input type="date" name="tgl_mulai" class="form-control" value="<?= htmlspecialchars($tgl_mulai); ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Sampai Tanggal</label>
                        <input type="date" name="tgl_selesai" class="form-control" value="<?= htmlspecialchars($tgl_selesai); ?>">
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary me-2">Filter</button>
                        <a href="laporan.php" class="btn btn-secondary">Reset</a>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>No. Faktur</th>
                                <th>Tanggal</th>
                                <th>Kode</th>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                                <th>Harga Satuan</th>
                                <th>Subtotal</th>
                                <th>Laba</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $total_omzet = 0;
                            $total_laba  = 0;

                            while ($data = mysqli_fetch_array($query)) {
                                $laba = $data['subtotal'] - ($data['harga_beli'] * $data['qty']);
                                $total_omzet += $data['subtotal'];
                                $total_laba  += $laba;
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($data['no_faktur']); ?></td>
                                <td><?= $data['tanggal_transaksi']; ?></td>
                                <td><?= htmlspecialchars($data['kode_barang']); ?></td>
                                <td><?= htmlspecialchars($data['nama_barang']); ?></td>
                                <td><?= $data['qty']; ?></td>
                                <td>Rp <?= number_format($data['harga_satuan'], 0, ',', '.'); ?></td>
                                <td>Rp <?= number_format($data['subtotal'], 0, ',', '.'); ?></td>
                                <td>Rp <?= number_format($laba, 0, ',', '.'); ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot class="table-secondary fw-bold">
                            <tr>
                                <td colspan="7" class="text-end">TOTAL KESELURUHAN</td>
                                <td>Rp <?= number_format($total_omzet, 0, ',', '.'); ?></td>
                                <td>Rp <?= number_format($total_laba, 0, ',', '.'); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>