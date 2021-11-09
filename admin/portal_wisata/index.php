<?php
include_once '../../koneksi.php';

// result(query portal wisata)
$result_portal_wisata = mysqli_query(
    $conn,
    "SELECT * FROM tb_portal_wisata
        INNER JOIN tb_wisata
        ON tb_portal_wisata.id_wisata = tb_wisata.id_wisata"
)
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Wisata</title>
    <!-- CSS -->
    <?php
    include_once '../../template/styles.php'
    ?>
</head>

<body style="background-color: gray;">
    <main style="margin-top: 70px;">

        <!-- Navbar -->
        <?php
        include_once '../../template/navbar_admin.php'
        ?>

        <!-- Content -->
        <!-- tombol -->
        <div class="container">
            <center>
                <a href="tambah_portal_wisata.php" class="btn btn-primary my-2">Tambah Portal Wisata </a>
            </center>
        </div>
        <div class="row">
            <table class="table text-light container">
                <thead class="bg-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Wisata</th>
                        <th>Ket Wisata</th>
                        <!-- <th>Gbr Wisata</th> -->
                        <th>Published</th>
                        <th>Updated</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $angka = 1; ?>
                    <?php while ($portal_wisata = mysqli_fetch_assoc($result_portal_wisata)) : ?>
                        <tr class="text-center text_light">
                            <th><?= $angka++; ?>.</th>
                            <td><?= $portal_wisata['nama_wisata']; ?></td>
                            <td><?= $portal_wisata['ket_wisata']; ?></td>
                            <td><?= $portal_wisata['published']; ?></td>
                            <td><?= $portal_wisata['updated']; ?></td>
                            <td>
                                <a href="edit_portal_wisata.php?id=<?= $portal_wisata['id_portal']; ?>" class="btn btn-warning text-light">Edit</a>
                                <a href="hapus_portal_wisata.php?id=<?= $portal_wisata['id_portal']; ?>" class="btn btn-danger">Hapus</a>
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