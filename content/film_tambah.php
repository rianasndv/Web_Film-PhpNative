<?php require_once ('template/header.php'); ?>
<?php require_once ('koneksiee.php'); ?>

<?php

$semuagenre = $koneksi->query("SELECT * FROM tb_genre");
if($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $judul = $_POST['judul'];
    $genre = $_POST['genre'];
    $durasi = $_POST['durasi'];
    $jam_tayang = $_POST['jam_tayang'];
    $stok_tiket = $_POST['stok_tiket'];
    $harga_tiket = $_POST['harga_tiket'];
    $sutradara = $_POST['sutradara'];
    $cover = $_POST['cover'];

    $hasil = $koneksi->query("INSERT INTO tb_film (judul, id_genre, durasi, jam_tayang, stok_tiket, harga_tiket, sutradara, cover) VALUES 
            ('$judul', '$genre', '$durasi', '$jam_tayang', '$stok_tiket', '$harga_tiket', '$sutradara', '$cover')");


    if ($hasil === TRUE) {
        echo "<script>window.location.href='film.php'</script>";
        exit;
    } else {
        echo 'Error';
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
    <form action="" method="POST">
        <div class="row mt-5 mb-5">
            <div class="col-6">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul">
            </div>
            <div class="col-6">
                <label for="genre">Genre</label>
                    <select class="form-control" id="genre" name="genre">
                        <option value="">PILIH..</option>
                            <?php foreach ($semuagenre as $genre) : ?>
                                <option value="<?= $genre["id"] ?>"><?= $genre["genre"] ?></option>
                            <?php endforeach; ?>
                    </select>
            </div>
            <div class="col-6">
                <label for="durasi">Durasi</label>
                <input type="text" class="form-control" id="durasi" name="durasi">
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
                <input type="text" class="form-control" id="sutradara" name="sutradara">
            </div>
            <div class="col-6">
                <label for="cover">Cover</label>
                <input type="file" class="form-control" id="cover" name="cover">
            </div>
            <div class="col-12 mt-3">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<?php require_once ('template/footer.php'); ?>