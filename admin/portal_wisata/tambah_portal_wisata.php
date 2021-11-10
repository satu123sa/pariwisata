<?php
include_once '../../koneksi.php';

// cek tombol tambah di tekan
if (isset($_POST['tambah'])) {
    $id_wisata = $_POST['id_wisata'];
    $ket_wisata = $_POST['ket_wisata'];
    // $gambar = $_POST['gambar'];
    $published = $_POST['published'];
    $updated = $_POST['updated'];

    $image = $_FILES['gambar']['name'];
    $file_tmp = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($file_tmp, '../../media/' . $image);

    $result_wisata = mysqli_query($conn, "INSERT INTO tb_portal_wisata(id_wisata,published,ket_wisata,gambar,updated) VALUES ('$id_wisata', '$published', '$ket_wisata','$image','$updated')");

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
                window.location.href = 'tambah_portal_wisata.php';
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
    <title>Tambah Portal Wisata</title>
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
            <form action="" method="post" class="my-4" enctype="multipart/form-data">
                <!-- id wisata -->
                <div class="mb-3">
                    <label class="form-label">Wisata</label>
                    <select class="form-select" aria-label="Default select example" name="id_wisata">
                        <option selected>Pilih Wisata..</option>
                        <?php
                        $result_wisata = mysqli_query($conn, "SELECT * FROM tb_wisata");
                        while ($wisata = mysqli_fetch_assoc($result_wisata)) : ?>
                            <option value="<?= $wisata['id_wisata']; ?>"><?= $wisata['nama_wisata']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <!-- nama wisata -->
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                </div>
                <!-- ket wisata -->
                <div class="mb-3">
                    <label for="ket_wisata" class="form-label">Keterangaan Wisata</label>
                    <textarea class="form-control" placeholder="" id="ket_wisata" style="height: 100px" name="ket_wisata"></textarea>
                </div>
                <!-- publis -->
                <div class="mb-3">
                    <label for="published" class="form-label">Publis</label>
                    <input type="date" class="form-control" id="published" name="published">
                </div>
                <!-- update -->
                <div class="mb-3">
                    <label for="updated" class="form-label">Update</label>
                    <input type="date" class="form-control" id="updated" name="updated">
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