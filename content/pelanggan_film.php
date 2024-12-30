<?php require_once('template/header_pelanggan.php'); ?>
<?php require_once('koneksiee.php'); ?>

<!-- QUERY DATABASE -->
<?php
$hasil = $koneksi->query("SELECT tb_film.id, tb_film.judul, tb_genre.genre, tb_film.durasi, 
tb_film.jam_tayang, tb_film.stok_tiket, tb_film.harga_tiket, tb_film.sutradara, tb_film.cover 
FROM tb_film JOIN tb_genre ON tb_film.id_genre = tb_genre.id");
?>

<!-- AWAL KONTEN -->

<form action="" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari berdasarkan genre" name="cari_genre">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
        </div>
    </div>
</form>

<div class="row card">
    <div class="col-xl-12">
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Cover</th>
                        <th>Judul</th>
                        <th>Genre</th>
                        <th>Durasi</th>
                        <th>Jam Tayang</th>
                        <th>Stok Tiket</th>
                        <th>Harga Tiket</th>
                        <th>Sutradara</th>
                        <th>Pembelian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['cari_genre'])) {
                        $cari = $_GET['cari_genre'];
                        $hasil = $koneksi->query("SELECT tb_film.id, tb_film.judul, tb_genre.genre, tb_film.durasi, 
                            tb_film.jam_tayang, tb_film.stok_tiket, tb_film.harga_tiket, tb_film.sutradara, tb_film.cover 
                            FROM tb_film JOIN tb_genre ON tb_film.id_genre = tb_genre.id
                            WHERE tb_genre.genre LIKE '%$cari%'");
                    } else {
                        $hasil = $koneksi->query("SELECT tb_film.id, tb_film.judul, tb_genre.genre, tb_film.durasi, 
                            tb_film.jam_tayang, tb_film.stok_tiket, tb_film.harga_tiket, tb_film.sutradara, tb_film.cover 
                            FROM tb_film JOIN tb_genre ON tb_film.id_genre = tb_genre.id");
                    }
                    ?>
                    <?php $i = 1; foreach ($hasil as $row) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td>
                                <img src="../assets/images/<?= $row['cover'] ?>" style="width: 100px;" class="img-thumbnail">
                            </td>
                            <td><?= $row['judul'] ?></td>
                            <td><?= $row['genre'] ?></td>
                            <td><?= $row['durasi'] ?></td>
                            <td><?= $row['jam_tayang'] ?></td>
                            <td><?= $row['stok_tiket'] ?></td>
                            <td><?= $row['harga_tiket'] ?></td>
                            <td><?= $row['sutradara'] ?></td>
                            <td>
                                <a href="buy_film.php?id=<?= $row['id']?>" class="btn btn-primary btn-sm <?= $row['stok_tiket'] == 0 ? 'disabled' : '' ?>">
                                    <?= $row['stok_tiket'] == 0 ? 'Stok Habis' : 'Buy' ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- AKHIR KONTEN -->

<?php require_once 'template/footer.php'; ?>
