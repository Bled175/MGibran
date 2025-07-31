<?php
if (isset($_POST['update_btn'])) {
    include 'db.php';

    $id = $_POST['id'];
    $tipe = $_POST['tipe'];
    $nama = $_POST['Nama'];
    $alamat = $_POST['Alamat'];
    $telepon = $_POST['Telepon'];

    $stmt = $conn->prepare("UPDATE user SET TIPE = ?, NAMA = ?, TELEPON = ?, ALAMAT = ? WHERE ID = ?");
    $stmt->bind_param("ssssi", $tipe, $nama, $telepon, $alamat, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit;
}
?>
