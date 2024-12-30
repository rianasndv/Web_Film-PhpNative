<?php require_once 'template/header_pelanggan.php'; ?>
<?php require_once 'koneksiee.php'; ?>

<!-- QUERY DATABASE -->
<?php
$hasil = $koneksi->query("SELECT * FROM tb_film");
?>

<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="mt-3">
                <h3>Selamat datang di Rate Buy Film! destinasi online terbaik untuk pecinta film sejati! Kami hadir dengan koleksi film terlengkap dari berbagai genre, siap memenuhi hasrat hiburan Anda. Rate Buy Film tidak hanya sekedar toko online, tapi juga komunitas yang menghubungkan para penggemar film untuk saling berbagi rekomendasi dan pengalaman.</h3>
            </div>

            <div class="mt-3">
                <h4>Explorasi Berbagai Genre Film</h4>
                <p>Situs web multigenre menyediakan pengalaman eksplorasi yang tak terbatas bagi para penggemar film. Dengan kategori yang mencakup Drama, Komedi, Aksi, Thriller, dan masih banyak lagi, penonton dapat dengan mudah menemukan film sesuai dengan selera mereka.</p>
            </div>

            <div class="mt-3">
                <h4>Cover Menarik yang Mengundang Penonton</h4>
                <p>Setiap film dipresentasikan dengan cover menarik, memberikan gambaran visual tentang atmosfer dan esensi dari karya tersebut. Pengguna dapat menjelajahi pilihan film dengan melihat cover yang menggoda dan memilih film yang paling sesuai dengan minat mereka.</p>
            </div>
        </div>
    </div>
</div>

<?php require_once 'template/footer.php'; ?>
