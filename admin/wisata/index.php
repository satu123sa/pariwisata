<?php
include_once '../../koneksi.php';

// result(query wisata)
$result_wisata = mysqli_query(
    $conn,
    "SELECT * FROM tb_wisata
        INNER JOIN tb_user
        ON tb_wisata.penulis = tb_user.username
        INNER JOIN tb_daerah
        ON tb_wisata.daerah_wisata = tb_daerah.id_daerah
        INNER JOIN tb_kategori
        ON tb_wisata.kategori = tb_kategori.id_kategori"
)
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
        <div class="row">
            <table class="table text-light container">
                <thead class="bg-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Wisata</th>
                        <th>Lokasi Wisata</th>
                        <th>Gbr Wisata</th>
                        <th>Daerah Wisata</th>
                        <th>Ket Wisata</th>
                        <th>Kat Wisata</th>
                        <th>Penulis</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $angka = 1; ?>
                    <?php while ($wisata = mysqli_fetch_assoc($result_wisata)) : ?>
                        <tr class="text-center text_light">
                            <th><?= $angka++; ?>.</th>
                            <td><?= $wisata['nama_wisata']; ?></td>
                            <td><?= $wisata['lokasi_wisata']; ?></td>
                            <td></td>
                            <td><?= $wisata['nama_daerah_wisata']; ?></td>
                            <td><?= $wisata['keterangan_wisata']; ?></td>
                            <td><?= $wisata['nama_kategori']; ?></td>
                            <td><?= $wisata['penulis']; ?></td>
                            <td>
                                <a href="edit_wisata.php?id=<?= $wisata['id_wisata']; ?>" class="btn btn-warning text-light">Edit</a>
                                <a href="hapus_wisata.php?id=<?= $wisata['id_wisata']; ?>" class="btn btn-danger">Hapus</a>
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