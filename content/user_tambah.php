<?php require_once ('template/header.php'); ?>
<?php require_once ('koneksiee.php'); ?>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $foto = $_POST['foto'];

    $hasil = $koneksi->query("INSERT INTO tb_user (username, password, level, foto) VALUES
    ('$username', '$password', '$level', '$foto')");

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
        <a href="user.php" class="btn btn-dark">Kembali</a>
    </div>
</div>

<div class="row card">
    <div class="col-lg-12">
        <form action="" method="POST">
            <div class="row mt-5 mb-5">
                <div class="col-6">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="col-6">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password">
                </div>
                <div class="col-6">
                    <label for="level">Level</label>
                    <input type="text" class="form-control" id="level" name="level">
                </div>
                <div class="col-6">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>
            </div>
                <div class="col-12 mt-3">
                <button class="btn btn-primary">Simpan</button>
            </div>
            </div>
        </form>
    </div>
</div>

<?php require_once ('template/footer.php'); ?>