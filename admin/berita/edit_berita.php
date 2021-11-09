<?php
include_once '../../koneksi.php';

// mengambil id melalui url
$id_berita = $_GET['id'];

// query data untuk memasukkan ke input
$query = "SELECT * FROM tb_berita WHERE id_berita = '$id_berita'";

$result = mysqli_query($conn, $query);

$berita = mysqli_fetch_assoc($result);

// cek tombol tambah di tekan
if (isset($_POST['ubah'])) {
    $judul_berita = $_POST['judul_berita'];
    $isi_berita = $_POST['isi_berita'];
    $published = $_POST['published'];
    $updated = $_POST['updated'];
    $penulis = $_POST['penulis'];

    $query = "UPDATE tb_berita
                SET
            id_berita = '$id_berita',
            judul_berita = '$judul_berita',
            isi_berita = '$isi_berita',
            published = '$published',
            updated = '$updated',
            penulis = '$penulis'
                WHERE
            id_berita = '$id_berita'
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
                window.location.href = 'edit_berita.php';
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
    <title>Tambah Berita</title>
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
                    <label for="judul_berita" class="form-label">Judul Berita</label>
                    <input type="text" class="form-control" id="judul_berita" name="judul_berita" value="<?= $berita['judul_berita']; ?>">
                </div>
                <!-- ket wisata -->
                <div class="mb-3">
                    <label for="isi_berita" class="mb-2">Isi Berita</label>
                    <textarea class="form-control" placeholder="" id="isi_berita" style="height: 100px" name="isi_berita"><?= $berita['isi_berita']; ?></textarea>
                </div>
                <!-- penulis wisata -->
                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <select class="form-select" aria-label="Default select example" name="penulis">
                        <?php
                        $result_penulis = mysqli_query($conn, "SELECT * FROM tb_user");
                        while ($penulis = mysqli_fetch_assoc($result_penulis)) : ?>
                            <option value="<?= $penulis['username']; ?>" <?php if ($penulis['username'] == $berita['penulis']) {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>><?= $penulis['username']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <!-- publis -->
                <div class="mb-3">
                    <label for="published" class="form-label">Publis</label>
                    <input type="date" class="form-control" id="published" name="published" value="<?= $berita['published']; ?>">
                </div>
                <!-- publis -->
                <div class="mb-3">
                    <label for="updated" class="form-label">Update</label>
                    <input type="date" class="form-control" id="updated" name="updated" value="<?= $berita['updated']; ?>">
                </div>

                <center>
                    <button type="submit" class="btn btn-primary" name="ubah">Tambah</button>
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