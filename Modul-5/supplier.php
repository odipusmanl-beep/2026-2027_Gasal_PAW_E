<?php
include 'koneksi.php';

$query = "SELECT * FROM supplier";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Master Supplier</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        h2 { color: #5bc0de; font-weight: normal; margin: 0; }
        .header { display: flex; justify-content: space-between; align-items: center; width: 80%; margin-bottom: 20px; }
        .btn-tambah { background-color: #5cb85c; color: white; padding: 8px 14px; text-decoration: none; border-radius: 4px; font-size: 14px; }
        table { width: 80%; border-collapse: collapse; text-align: left; }
        th { background-color: #d9edf7; border: 1px solid #ddd; padding: 10px; font-weight: bold; }
        td { border: 1px solid #ddd; padding: 10px; }
        .btn-edit { background-color: #f0ad4e; color: white; padding: 5px 12px; border-radius: 3px; text-decoration: none; font-size: 13px; display: inline-block; }
        .btn-hapus { background-color: #d9534f; color: white; padding: 5px 12px; border-radius: 3px; text-decoration: none; font-size: 13px; display: inline-block; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Data Master Supplier</h2>
        <a href="tambah_supplier.php" class="btn-tambah">Tambah Data</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Telp</th>
                <th>Alamat</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) :
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['nama']); ?></td>
                <td><?= htmlspecialchars($row['telp']); ?></td>
                <td><?= htmlspecialchars($row['alamat']); ?></td>
                <td>
                    <a href="edit_supplier.php?id=<?= $row['id']; ?>" class="btn-edit">Edit</a>
                    <a href="hapus_supplier.php?id=<?= $row['id']; ?>" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>