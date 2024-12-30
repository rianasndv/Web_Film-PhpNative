<?php require_once 'template/header.php'; ?>
<?php require_once 'koneksiee.php'; ?>

<!-- QUERY DATABASE -->
<?php
$hasil = $koneksi->query("SELECT * FROM tb_film");
?>

<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="mt-3">
                <h3>WELCOME ADMIN!</h3>
            </div>

<?php require_once 'template/footer.php'; ?>
