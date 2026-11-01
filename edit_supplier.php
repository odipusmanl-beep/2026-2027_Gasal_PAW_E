<?php
include 'koneksi.php';

$id = $_GET['id'];
$query_data = "SELECT * FROM supplier WHERE id = '$id'";
$result_data = mysqli_query($koneksi, $query_data);
$data = mysqli_fetch_assoc($result_data);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $query_update = "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'";
    $update = mysqli_query($koneksi, $query_update);

    if ($update) {
        header("Location: supplier.php");
        exit();
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Master Supplier</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        h2 { color: #5bc0de; font-weight: normal; margin-bottom: 30px; }
        .form-group { display: flex; align-items: center; margin-bottom: 15px; }
        .form-group label { width: 100px; text-align: right; margin-right: 20px; font-weight: bold; }
        .form-group input[type="text"] { width: 350px; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        .btn-container { margin-left: 120px; margin-top: 20px; }
        .btn-update { background-color: #5cb85c; color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer; }
        .btn-batal { background-color: #d9534f; color: white; border: none; padding: 8px 16px; border-radius: 4px; text-decoration: none; display: inline-block; }
    </style>
</head>
<body>
    <h2>Edit Data Master Supplier</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>
        </div>
        <div class="form-group">
            <label>Telp</label>
            <input type="text" name="telp" value="<?= htmlspecialchars($data['telp']); ?>" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" value="<?= htmlspecialchars($data['alamat']); ?>" required>
        </div>
        <div class="btn-container">
            <button type="submit" name="update" class="btn-update">Update</button>
            <a href="supplier.php" class="btn-batal">Batal</a>
        </div>
    </form>
</body>
</html>