<?php
include_once '../../koneksi.php';

// cek tombol tambah di tekan
if (isset($_POST['tambah'])) {
    $nama_kategori = $_POST['nama_kategori'];

    $result_kategori = mysqli_query($conn, "INSERT INTO tb_kategori(nama_kategori) VALUES ('$nama_kategori')");

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {
        echo "
            <script>
                alert('Data berhasil di tambahkan');
                window.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal di tambahkan');
                window.location.href = 'tambah_kategori.php';
            </script>
        ";
    }
}
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <!-- CSS -->
    <?php
    include_once '../../template/styles.php'
    ?>
</head>

<body style="background-color: gray;">
    <main style="margin-top: 90px;">

        <!-- Navbar -->
        <?php
        include_once '../../template/navbar_admin.php'
        ?>

        <!-- Content -->
        <div class="container">
            <form action="" method="post" class="my-4">
                <!-- nama wisata -->
                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori">
                </div>
                <center>
                    <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                </center>
            </form>
        </div>
        <!-- Content -->

        <!-- Footer -->
        <?php
        include_once '../../template/footer.php'
        ?>
    </main>
    <!-- JS -->
    <?php
    include_once '../../template/scripts.php'
    ?>
</body>

</html>