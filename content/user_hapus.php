<?php
include 'koneksiee.php';

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    $userId = $_GET['id'];
    $result = $koneksi->query("DELETE FROM tb_user WHERE id = $userId");

    if ($result === TRUE) {
        echo "<script>window.location.href='user.php'</script>";
        exit;
    } else {
        echo "Error deleting User!";
        exit;
    }
} else {
    echo "Invalid request!";
    exit;
}
?>