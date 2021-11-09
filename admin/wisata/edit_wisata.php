<?php
include_once '../../koneksi.php';

// mengambil id melalui url
$id_wisata = $_GET['id'];

// query data untuk memasukkan ke input
$query = "SELECT * FROM tb_wisata WHERE id_wisata = '$id_wisata'";

$result = mysqli_query($conn, $query);

$wisata = mysqli_fetch_assoc($result);

// cek tombol tambah di tekan
if (isset($_POST['ubah'])) {
    $nama_wisata = $_POST['nama_wisata'];
    $lokasi_wisata = $_POST['lokasi_wisata'];
    $gambar_wisata = $_POST['gambar_wisata'];
    $id_daerah = $_POST['id_daerah'];
    $keterangan_wisata = $_POST['keterangan_wisata'];
    $id_kategori = $_POST['id_kategori'];
    $penulis = $_POST['penulis'];

    $query = "UPDATE tb_wisata
                SET
            id_wisata = '$id_wisata',
            nama_wisata = '$nama_wisata',
            lokasi_wisata = '$lokasi_wisata',
            gambar_wisata = '$gambar_wisata',
            id_daerah = '$id_daerah',
            keterangan_wisata = '$keterangan_wisata',
            id_kategori = '$id_kategori',
            penulis = '$penulis'
                WHERE
            id_wisata = '$id_wisata'
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
                window.location.href = 'edit_wisata.php';
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
            <form action="" method="post" class="my-4">
                <!-- nama wisata -->
                <div class="mb-3">
                    <label for="nama_wisata" class="form-label">Nama Wisata</label>
                    <input type="text" class="form-control" id="nama_wisata" name="nama_wisata" value="<?= $wisata['nama_wisata']; ?>">
                </div>
                <!-- lokasi wisata -->
                <div class="form-floating mb-3">
                    <label for="lokasi_wisata">Lokasi Wisata</label>
                    <textarea class="form-control" placeholder="" id="lokasi_wisata" style="height: 100px" name="lokasi_wisata"><?= $wisata['lokasi_wisata']; ?></textarea>
                </div>
                <!-- ket wisata -->
                <div class="form-floating mb-3">
                    <label for="keterangan_wisata">Keterangaan Wisata</label>
                    <textarea class="form-control" placeholder="" id="keterangan_wisata" style="height: 100px" name="keterangan_wisata"><?= $wisata['keterangan_wisata']; ?></textarea>
                </div>
                <!-- daerah wisata -->
                <div class="mb-3">
                    <label class="form-label">Mapel</label>
                    <select class="form-control" aria-label="Default select example" name="id_daerah">
                        <?php
                        $result_daerah = mysqli_query($conn, "SELECT * FROM tb_daerah");
                        while ($daerah = mysqli_fetch_assoc($result_daerah)) : ?>
                            <option value="<?= $daerah['id_daerah']; ?>" <?php if ($daerah['id_daerah'] == $wisata['id_daerah']) {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>><?= $daerah['nama_daerah_wisata']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <!-- penulis wisata -->
                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <select class="form-control" aria-label="Default select example" name="penulis">
                        <?php
                        $result_penulis = mysqli_query($conn, "SELECT * FROM tb_user");
                        while ($penulis = mysqli_fetch_assoc($result_penulis)) : ?>
                            <option value="<?= $penulis['username']; ?>" <?php if ($penulis['username'] == $wisata['penulis']) {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>><?= $penulis['username']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <!-- kategori wisata -->
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-control" aria-label="Default select example" name="id_kategori">
                        <?php
                        $result_kategori = mysqli_query($conn, "SELECT * FROM tb_kategori");
                        while ($kategori = mysqli_fetch_assoc($result_kategori)) : ?>
                            <option value="<?= $kategori['id_kategori']; ?>" <?php if ($kategori['id_kategori'] == $wisata['id_kategori']) {
                                                                                    echo 'selected';
                                                                                } else {
                                                                                    echo '';
                                                                                } ?>><?= $kategori['nama_kategori']; ?></option>
                        <?php endwhile; ?>
                    </select>
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