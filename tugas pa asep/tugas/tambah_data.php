<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include 'db.php';

    $tipe    = $_POST['tipe'];
    $nama    = $_POST['Nama'];
    $alamat  = $_POST['Alamat'];
    $telepon = $_POST['Telepon'];

    $stmt = $conn->prepare("INSERT INTO user (TIPE, NAMA, TELEPON, ALAMAT) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $tipe, $nama, $telepon, $alamat);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
    exit;
} 
