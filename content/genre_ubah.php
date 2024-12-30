<?php require_once ('template/header.php'); ?>
<?php require_once ('koneksiee.php'); ?>

<?php
$koneksi = new mysqli($hostname, $username, $password, $database);

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_genre WHERE id = '$id'";
    $result = $koneksi->query($sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $genre = $row['genre'];
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $genre = $_POST['genre'];

    $hasil = $koneksi->query("UPDATE tb_genre SET
    genre = '$genre' WHERE id = '$id'");

    if ($hasil === TRUE) {
        echo "<script>window.location.href='user.php'</script>";
        exit;
    } else {
        echo 'Error';
    }
}
?>

<div class="row">
    <div class="col-lg-12 text-right">
        <a href="genre.php" class="btn btn-dark">Kembali</a>
    </div>
</div>

<div class="row-card">
    <div class="col-lg-12">
        <form action="" method="POST">
            <div class="col-6">
                <label for="genre">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre">
            </div>
            <div class="col-12 mt-3">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?php require_once ('template/footer.php'); ?>