<?php
include 'koneksiee.php';

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    $genreId = $_GET['id'];
    $result = $koneksi->query("DELETE FROM tb_genre WHERE id = $genreId");

    if ($result === TRUE) {
        echo "<script>window.location.href='genre.php'</script>";
        exit;
    } else {
        echo "Error deleting film!";
        exit;
    }
} else {
    echo "Invalid request!";
    exit;
}
?>