<?php require_once ('template/header.php'); ?>
<?php require_once ('koneksiee.php'); ?>

<?php
$koneksi = new mysqli($hostname, $username, $password, $database);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_user WHERE id = '$id'";
    $result = $koneksi->query($sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $password = $row['password'];
        $level = $row['level'];
        $foto = $row['foto'];
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $foto = $_POST['foto'];
    $id = $_GET['id'];

    $hasil = $koneksi->query("UPDATE tb_user SET
    username = '$username',
    password = '$password',
    level = '$level',
    foto = '$foto'
    WHERE id = '$id'
    ");

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
                    <input type="text" class="form-control" id="username" name="username" value="<?= $username; ?>">
                </div>
                <div class="col-6">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password" value="<?= $password; ?>">
                </div>
                <div class="col-6">
                    <label for="level">Level</label>
                    <input type="text" class="form-control" id="level" name="level" value="<?= $level; ?>">
                </div>
                <div class="col-6">
                    <label for="foto">Foto</label>
                    <input type="foto" class="form-control" id="foto" name="foto" accept=".jpg, .jpeg, .png" onchange="previewImage(event)" value="<?= $foto; ?>">
                </div>
                <div class="col-6 mt-4">
                                        <?php
                                        if ($row['foto'] !== null && $row['foto'] !== '') {
                                            $gambarURL = '../assets/images/' . $row['foto'];
                                            echo '<img src="' . $gambarURL . '" alt="Foto" style="max-width: 100px;">';
                                        }
                                        ?>
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