<?php
require_once('template/header_pelanggan.php');
require_once('koneksiee.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    $film_id = isset($_GET['id']) ? $_GET['id'] : '';
    $query = "SELECT * FROM tb_film WHERE id = '$film_id'";
    $result = $koneksi->query($query);

    if ($result) {
        // Periksa apakah query berhasil dieksekusi
        if ($result->num_rows > 0) {
            $film = $result->fetch_assoc();
        } else {
            echo 'Film not found.';
            exit;
        }
    } else {
        // Tampilkan pesan kesalahan query
        echo 'Error executing query: ' . $koneksi->error;
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $film_id = $_POST['film_id'];
    $quantity = $_POST['quantity'];

    $query = "SELECT * FROM tb_film WHERE id = '$film_id'";
    
    $result = $koneksi->query($query);

    if ($result) {
        if ($result->num_rows > 0) {
            $film = $result->fetch_assoc();

            if ($film['stok_tiket'] >= $quantity) {
                $newStock = $film['stok_tiket'] - $quantity;
                $updateQuery = "UPDATE tb_film SET stok_tiket = '$newStock' WHERE id = '$film_id'";
                $koneksi->query($updateQuery);

                echo "<script>window.location.href='transaksi_pelanggan.php'</script>";
                exit;
            } else {
                echo 'Not enough stock available.';
            }
        } else {
            echo 'Film not found.';
            exit;
        }
    } else {
        // Tampilkan pesan kesalahan query
        echo 'Error executing query: ' . $koneksi->error;
        exit;
    }
}
?>

<div class="row card">
    <div class="col-lg-12">
        <h2><?= $film['judul'] ?></h2>
        <img src="../assets/images/<?= $film['cover'] ?>" width="200" alt="<?= $film['judul'] ?>">
        <p>Genre: <?= $film['id_genre'] ?></p>
        <p>Durasi: <?= $film['durasi'] ?></p>
        <p>Jam Tayang: <?= $film['jam_tayang'] ?></p>
        <p>Sutradara: <?= $film['sutradara'] ?></p>
        <p>Harga Tiket: <?= $film['harga_tiket'] ?></p>
        <p>Stok Tiket: <?= $film['stok_tiket'] ?></p>
    </div>
</div>

<div class="row card">
    <div class="col-lg-12">
        <form action="" method="POST">
            <input type="hidden" name="film_id" value="<?= $film_id ?>">
            <div class="form-group">
                <label for="quantity">Jumlah:</label>
                <input type="number" name="quantity" class="form-control" min="1" max="<?= $film['stok_tiket'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Beli</button>
        </form>
    </div>
</div>

<?php require_once('template/footer.php'); ?>
