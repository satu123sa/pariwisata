<?php
include_once '../../koneksi.php';

// result(query beritas)
$result_berita = mysqli_query(
    $conn,
    "SELECT * FROM tb_berita
        INNER JOIN tb_user
        ON tb_berita.penulis = tb_user.username"
)
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita</title>
    <!-- CSS -->
    <?php
    include_once '../../template/styles.php'
    ?>
</head>

<body style="background-color: gray;">
    <main style="margin-top: 80px;">

        <!-- Navbar -->
        <?php
        include_once '../../template/navbar_admin.php'
        ?>

        <!-- Content -->
        <!-- tombol -->
        <div class="container-fluid">
            <center>
                <a href="tambah_berita.php" class="btn btn-primary d-block my-2">Tambah Berita </a>
            </center>
        </div>
        <div class="container-fluid">
            <table class="table text-light">
                <thead class="bg-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Judul Berita</th>
                        <th>Isi Berita</th>
                        <th>Penulis</th>
                        <th>Published</th>
                        <th>Updated</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $angka = 1; ?>
                    <?php while ($berita = mysqli_fetch_assoc($result_berita)) : ?>
                        <tr class="text-center text_light">
                            <th><?= $angka++; ?>.</th>
                            <td><?= $berita['judul_berita']; ?></td>
                            <td><?= $berita['isi_berita']; ?></td>
                            <td><?= $berita['username']; ?></td>
                            <td><?= $berita['published']; ?></td>
                            <td><?= $berita['updated']; ?></td>
                            <td>
                                <a href="edit_berita.php?id=<?= $berita['id_berita']; ?>" class="btn btn-warning text-light">Edit</a>
                                <a href="hapus_berita.php?id=<?= $berita['id_berita']; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
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