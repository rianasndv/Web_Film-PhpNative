<?php
include 'koneksiee.php';

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    $filmId = $_GET['id'];
    $result = $koneksi->query("DELETE FROM tb_film WHERE id = $filmId");

    if ($result === TRUE) {
        echo "<script>window.location.href='film.php'</script>";
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