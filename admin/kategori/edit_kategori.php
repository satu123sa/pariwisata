<?php
include_once '../../koneksi.php';

// mengambil id melalui url
$id_kategori = $_GET['id'];

// query data untuk memasukkan ke input
$query = "SELECT * FROM tb_kategori WHERE id_kategori = '$id_kategori'";

$result = mysqli_query($conn, $query);

$kategori = mysqli_fetch_assoc($result);

// cek tombol tambah di tekan
if (isset($_POST['ubah'])) {
    $nama_kategori = $_POST['nama_kategori'];

    $query = "UPDATE tb_kategori
                SET
            id_kategori = '$id_kategori',
            nama_kategori = '$nama_kategori'
                WHERE
            id_kategori = '$id_kategori'
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
                window.location.href = 'edit_kategori.php';
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
    <title>Edit Kategori</title>
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
                <!-- nama kategori -->
                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $kategori['nama_kategori']; ?>">
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