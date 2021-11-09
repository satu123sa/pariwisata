<?php
include_once '../../koneksi.php';

// mengambil id melalui url
$id_portal = $_GET['id'];

// query data untuk memasukkan ke input
$query = "SELECT * FROM tb_portal_wisata WHERE id_portal = '$id_portal'";

$result = mysqli_query($conn, $query);

$portal = mysqli_fetch_assoc($result);

// cek tombol tambah di tekan
if (isset($_POST['ubah'])) {
    $id_wisata = $_POST['id_wisata'];
    $ket_wisata = $_POST['ket_wisata'];
    $gambar = $_POST['gambar'];
    $published = $_POST['published'];
    $updated = $_POST['updated'];

    $query = "UPDATE tb_portal_wisata
                SET
            id_portal = '$id_portal',
            id_wisata = '$id_wisata',
            ket_wisata = '$ket_wisata',
            gambar = '$gambar',
            published = '$published',
            updated = '$updated'
                WHERE
            id_portal = '$id_portal'
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
                window.location.href = 'edit_portal_wisata.php';
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
            <form action="" method="post" class="my-4">
                <!-- id wisata -->
                <div class="mb-3">
                    <label class="form-label">Wisata</label>
                    <select class="form-select" aria-label="Default select example" name="id_wisata">
                        <?php
                        $result_wisata = mysqli_query($conn, "SELECT * FROM tb_wisata");
                        while ($wisata = mysqli_fetch_assoc($result_wisata)) : ?>
                            <option value="<?= $wisata['id_wisata']; ?>" <?php if ($wisata['id_wisata'] == $portal['id_wisata']) {
                                                                                echo 'selected';
                                                                            } else {
                                                                                echo '';
                                                                            } ?>><?= $wisata['nama_wisata']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <!-- nama wisata -->
                <div class="mb-3">
                    <label for="gambar" class="form-label">Nama Wisata</label>
                    <input type="text" class="form-control" id="gambar" name="gambar" value="<?= $portal['gambar']; ?>">
                </div>
                <!-- ket wisata -->
                <div class="mb-3">
                    <label for="ket_wisata" class="mb-2">Keterangaan Wisata</label>
                    <textarea class="form-control" placeholder="" id="ket_wisata" style="height: 100px" name="ket_wisata"><?= $portal['ket_wisata']; ?></textarea>
                </div>
                <!-- publis -->
                <div class="mb-3">
                    <label for="published" class="form-label">Publis</label>
                    <input type="date" class="form-control" id="published" name="published" value="<?= $portal['published']; ?>">
                </div>
                <!-- update -->
                <div class="mb-3">
                    <label for="updated" class="form-label">Update</label>
                    <input type="date" class="form-control" id="updated" name="updated" value="<?= $portal['published']; ?>">
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