<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete_id'])) {
    include 'db.php';
    $id = $_POST['delete_id'];
    $stmt = $conn->prepare("DELETE FROM user WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
    exit;
}
