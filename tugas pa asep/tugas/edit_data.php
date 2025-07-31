<?php
if (!isset($_POST['edit_id'])) {
    echo "ID tidak ditemukan!";
    exit;
}
include 'db.php';
$id = $_POST['edit_id'];
$result = $conn->query("SELECT * FROM user WHERE ID = '$id'");
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <img src="placeholder.png" alt="Admin">
            <h2>Admin</h2>
            <button>Kelola User</button>
            <button>Kelola Laporan</button>
            <button>Logout</button>
        </div>
        <div class="main">

            <body>
                <h1>Edit Data User</h1>
                <div class="form-kotak">
                    <form method="post" action="update_data.php">

                        <input type="hidden" name="id" value="<?= $data['ID'] ?>">

                        <label for="tipe">Tipe</label>
                        <input type="text" name="tipe" value="<?= $data['TIPE'] ?>" required>

                        <label for="Nama">Nama</label>
                        <input type="text" name="Nama" value="<?= $data['NAMA'] ?>" required>

                        <label for="Alamat">jumlah</label>
                        <input type="text" name="Alamat" value="<?= $data['ALAMAT'] ?>" required>

                        <label for="Telepon">Telepon</label>
                        <input type="text" name="Telepon" value="<?= $data['TELEPON'] ?>" required>

                        <button type="submit" name="update_btn">Simpan Perubahan</button>
                        
                        <a href="index.php">
                            <button type="button">Kembali</button>
                        </a>
                </div>
                </form>
            </body>
        </div>

</html>