<?php require_once 'template/header.php' ?>
<?php require_once 'koneksiee.php' ?>

<!-- QUERY DATABASE -->
<?php
$hasil = $koneksi->query("SELECT * FROM tb_genre");
?>

<div class="row mb-3">
    <div class="col-lg-12 text-center">
        <a href="genre_tambah.php" class="btn btn-primary">Tambah Data</a>
    </div>
</div>

<div class="row card">
    <div class="col-xl-12">
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Genre</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($hasil as $row) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row['genre'] ?></td>
                            <td>
                                <a href="genre_ubah.php?id=<?= $row['id']?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="genre_hapus.php?id=<?= $row['id']?>" class="btn btn-danger btn-sm" 
                                onclick="return confirm('Yakin nieee mau dihapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once 'template/footer.php' ?>