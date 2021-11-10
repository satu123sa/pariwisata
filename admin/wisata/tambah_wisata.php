<?php
include_once '../../koneksi.php';

// cek tombol tambah di tekan
if (isset($_POST['tambah'])) {
    $nama_wisata = $_POST['nama_wisata'];
    $lokasi_wisata = $_POST['lokasi_wisata'];
    // $gambar_wisata = $_POST['gambar_wisata'];
    $nama_daerah_wisata = $_POST['id_daerah'];
    $keterangan_wisata = $_POST['keterangan_wisata'];
    $nama_kategori = $_POST['id_kategori'];
    $penulis = $_POST['penulis'];

    $image = $_FILES['gambar_wisata']['name'];
    $file_tmp = $_FILES['gambar_wisata']['tmp_name'];

    move_uploaded_file($file_tmp, '../../media/' . $image);

    $result_wisata = mysqli_query($conn, "INSERT INTO tb_wisata(nama_wisata,lokasi_wisata,gambar_wisata,id_daerah,keterangan_wisata,id_kategori,penulis) VALUES ('$nama_wisata', '$lokasi_wisata', '$image', '$nama_daerah_wisata', '$keterangan_wisata','$nama_kategori','$penulis')");

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
                window.location.href = 'tambah_wisata.php';
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
    <title>Document</title>
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
                <!-- nama wisata -->
                <div class="mb-3">
                    <label for="nama_wisata" class="form-label">Nama Wisata</label>
                    <input type="text" class="form-control" id="nama_wisata" name="nama_wisata">
                </div>
                <!-- lokasi wisata -->
                <div class="mb-3">
                    <label for="lokasi_wisata" class="form-label">Lokasi Wisata</label>
                    <textarea class="form-control" placeholder="" id="lokasi_wisata" style="height: 100px" name="lokasi_wisata"></textarea>
                </div>
                <!-- nama wisata -->
                <div class="mb-3">
                    <label for="gambar_wisata" class="form-label">Gambar Wisata</label>
                    <input type="file" class="form-control" id="gambar_wisata" name="gambar_wisata">
                </div>
                <!-- ket wisata -->
                <div class="mb-3">
                    <label for="keterangan_wisata" class="form-label">Keterangaan Wisata</label>
                    <textarea class="form-control" placeholder="" id="keterangan_wisata" style="height: 100px" name="keterangan_wisata"></textarea>
                </div>
                <!-- daerah wisata -->
                <div class="mb-3">
                    <label class="form-label">Daerah</label>
                    <select class="form-select" aria-label="Default select example" name="id_daerah">
                        <option selected>Pilih Daerah..</option>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM tb_daerah");
                        while ($daerah = mysqli_fetch_assoc($result)) : ?>
                            <option value="<?= $daerah['id_daerah']; ?>"><?= $daerah['nama_daerah_wisata']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <!-- penulis wisata -->
                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <select class="form-select" aria-label="Default select example" name="penulis">
                        <option selected>Penulis..</option>
                        <?php
                        $result_penulis = mysqli_query($conn, "SELECT * FROM tb_user");
                        while ($penulis = mysqli_fetch_assoc($result_penulis)) : ?>
                            <option value="<?= $penulis['username']; ?>"><?= $penulis['username']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <!-- kategori wisata -->
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-select" aria-label="Default select example" name="id_kategori">
                        <option selected>kategori..</option>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM tb_kategori");
                        while ($daerah = mysqli_fetch_assoc($result)) : ?>
                            <option value="<?= $daerah['id_kategori']; ?>"><?= $daerah['nama_kategori']; ?></option>
                        <?php endwhile; ?>
                    </select>
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