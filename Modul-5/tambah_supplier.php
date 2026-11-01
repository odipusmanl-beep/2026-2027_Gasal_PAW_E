<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
    $simpan = mysqli_query($koneksi, $query);

    if ($simpan) {
        header("Location: supplier.php");
        exit();
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Master Supplier Baru</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        h2 { color: #5bc0de; font-weight: normal; margin-bottom: 30px; }
        .form-group { display: flex; align-items: center; margin-bottom: 15px; }
        .form-group label { width: 100px; text-align: right; margin-right: 20px; font-weight: bold; }
        .form-group input[type="text"] { width: 350px; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        .btn-container { margin-left: 120px; margin-top: 20px; }
        .btn-simpan { background-color: #5cb85c; color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer; }
        .btn-batal { background-color: #d9534f; color: white; border: none; padding: 8px 16px; border-radius: 4px; text-decoration: none; display: inline-block; }
    </style>
</head>
<body>
    <h2>Tambah Data Master Supplier Baru</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Nama" required>
        </div>
        <div class="form-group">
            <label>Telp</label>
            <input type="text" name="telp" placeholder="telp" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" placeholder="alamat" required>
        </div>
        <div class="btn-container">
            <button type="submit" name="simpan" class="btn-simpan">Simpan</button>
            <a href="supplier.php" class="btn-batal">Batal</a>
        </div>
    </form>
</body>
</html>