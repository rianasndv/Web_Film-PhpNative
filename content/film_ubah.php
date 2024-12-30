<?php require_once('template/header.php'); ?>
<?php require_once('koneksiee.php'); ?>

<?php
$koneksi = new mysqli($hostname, $username, $password, $database);
$semuagenre = $koneksi->query("SELECT * FROM tb_genre");

// jika ada metode pengiriman data get
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // maka diambil ID nya
    $id = $_GET['id'];

    // lakukan query ambil semua data film yang id nya 
    // dikirim dari button yang di klik
    $sql = "SELECT * FROM tb_film WHERE id = '$id'";

    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $judul = $row['judul'];
        $genre = $row['id_genre'];
        $durasi = $row['durasi'];
        $jam_tayang = $row['jam_tayang'];
        $stok_tiket = $row['stok_tiket'];
        $harga_tiket = $row['harga_tiket'];
        $sutradara = $row['sutradara'];
        $cover = $row['cover'];
    } else {
        die("Film dengan ID $id tidak ditemukan");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $genre = $_POST['genre'];
    $durasi = $_POST['durasi'];
    $jam_tayang = $_POST['jam_tayang'];
    $stok_tiket = $_POST['stok_tiket'];
    $harga_tiket = $_POST['harga_tiket'];
    $sutradara = $_POST['sutradara'];
    $id = $_GET['id'];

    // Fetch cover from the database
    $result = $koneksi->query("SELECT cover FROM tb_film WHERE id = '$id'");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cover = $row['cover'];
    }

    // Handle file upload
    if ($_FILES['cover']['name']) {
        $filename = $_FILES['cover']['name'];
        $temp_name = $_FILES['cover']['tmp_name'];
        $folder = '../assets/images/';
        $path = $folder . $filename;
        move_uploaded_file($temp_name, $path);
        $cover = $filename;
    }

    // Update the database query
    $hasil = $koneksi->query("UPDATE tb_film SET 
        judul = '$judul', 
        id_genre = '$genre', 
        durasi = '$durasi',
        jam_tayang = '$jam_tayang',
        stok_tiket = '$stok_tiket',
        harga_tiket = '$harga_tiket',
        sutradara = '$sutradara',
        cover = '$cover'
        WHERE id = '$id'
    ");

    if ($hasil === TRUE) {
        echo "<script>window.location.href='film.php'</script>";
        exit;
    } else {
        die("Error: " . $koneksi->error);
    }
}
?>

<div class="row">
    <div class="col-lg-12 text-right">
        <a href="film.php" class="btn btn-dark">Kembali</a>
    </div>
</div>

<div class="row card">
    <div class="col-lg-12">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row mt-5 mb-5">
                <div class="col-6">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $judul; ?> ">
                </div>
                <div class="col-6">
                    <label for="genre">Genre</label>
                    <select class="form-control" id="genre" name="genre">
                        <?php foreach ($semuagenre as $pilihgenre) : ?>
                            <option value="<?= $pilihgenre["id"] ?>" <?= ($pilihgenre["id"] == $genre) ? 'selected' : '' ?>>
                                <?= $pilihgenre["genre"] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-6">
                    <label for="durasi">Durasi</label>
                    <input type="text" class="form-control" id="durasi" name="durasi" value="<?= $durasi; ?>">
                </div>
                <div class="col-6">
                <label for="jam_tayang">Jam Tayang</label>
                <input type="text" class="form-control" id="jam_tayang" name="jam_tayang">
                </div>
                <div class="col-6">
                    <label for="stok">Stok Tiket</label>
                    <input type="text" class="form-control" id="stok_tiket" name="stok_tiket">
                </div>
                <div class="col-6">
                    <label for="harga_tiket">Harga Tiket</label>
                    <input type="text" class="form-control" id="harga_tiket" name="harga_tiket">
                </div>
                <div class="col-6">
                    <label for="sutradara">Sutradara</label>
                    <input type="text" class="form-control" id="sutradara" name="sutradara" value="<?= $sutradara; ?>">
                </div>
                <div class="col-6">
                    <label for="cover">Cover</label>
                    <input type="file" class="form-control" id="cover" name="cover">
                </div>
                <div class="col-6 mt-4">
                    <?php
                    if ($cover) : ?>
                        <img src="../assets/images/<?= $cover; ?>" width="100">
                    <?php else : ?>
                        <span>Tidak ada gambar lama</span>
                    <?php endif; ?>
                </div>
                <div class="col-12 mt-3">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require_once('template/footer.php'); ?>
