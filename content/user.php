<?php require_once 'template/header.php' ?>
<?php require_once 'koneksiee.php' ?>

<?php
$hasil = $koneksi->query("SELECT * FROM tb_user");
?>

<div class="row mb-3">
    <div class="col-xl-12 text-right">
        <a href="user_tambah.php" class="btn btn-primary">Tambah Data</a>
    </div>
</div>

<div class="row card">
    <div class="col-xl-12">
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Level</th>
                        <th>Foto</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($hasil as $row) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['password'] ?></td>
                            <td><?= $row['level'] ?></td>
                            <td>
                                <img class="img-thumbnail" src="../assets/images/<?= $row['foto'] ?>" style="width: 80px; height: 80px;">
                            </td>
                            <td>
                                <a href="user_ubah.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="user_hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin nieee mau dihapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once 'template/footer.php' ?>