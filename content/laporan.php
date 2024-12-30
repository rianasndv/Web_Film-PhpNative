<?php
require_once('template/header.php');
require_once('koneksiee.php');

// Jalankan query langsung tanpa menggunakan $koneksi->query
$hasil = $koneksi->query("SELECT * FROM tb_transaksi");

?>

<div class="row card">
    <div class="col-lg-12">
        <h2>Laporan Pembelian Tiket</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Cover Film</th>
                    <th>Judul Film</th>
                    <th>Jumlah Tiket Terjual</th>
                    <th>Tanggal Pembelian</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; foreach ($hasil as $row) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['id_user']; ?></td>
                    <td>
                        <img src="../assets/images/<?= $row['cover'] ?>" style="width: 100px;" class="img-thumbnail">
                    </td>
                    <td><?= $row['id_film']; ?></td>
                    <td><?= $row['jumlah_tiket']; ?></td>
                    <td><?= $row['tgl_pembelian']; ?></td>
                    <td><?= $row['total_harga']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once('template/footer.php'); ?>
