<?php
include_once '../../koneksi.php';

// mengambil id melalui url
$id_daerah = $_GET['id'];

// query data untuk memasukkan ke input
$query = "SELECT * FROM tb_daerah WHERE id_daerah = '$id_daerah'";

$result = mysqli_query($conn, $query);

$daerah = mysqli_fetch_assoc($result);

// cek tombol tambah di tekan
if (isset($_POST['ubah'])) {
    $nama_daerah = $_POST['nama_daerah_wisata'];

    $query = "UPDATE tb_daerah
                SET
            id_daerah = '$id_daerah',
            nama_daerah_wisata = '$nama_daerah'
                WHERE
            id_daerah = '$id_daerah'
        ";

    $result = mysqli_query($conn, $query);

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {
        echo "
            <script>
                alert('Data berhasil di ubah');
                window.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal di ubah');
                window.location.href = 'edit_daerah.php';
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
    <title>Edit daerah</title>
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
                <!-- nama daerah -->
                <div class="mb-3">
                    <label for="nama_daerah" class="form-label">Nama daerah</label>
                    <input type="text" class="form-control" id="nama_daerah" name="nama_daerah_wisata" value="<?= $daerah['nama_daerah_wisata']; ?>">
                </div>

                <center>
                    <button type="submit" class="btn btn-primary" name="ubah">Perbaharui</button>
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