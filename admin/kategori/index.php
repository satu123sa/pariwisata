<?php
include_once '../../koneksi.php';

// result(query wisata)
$result_kategori = mysqli_query(
    $conn,
    "SELECT * FROM tb_kategori"
)
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
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
                <a href="tambah_kategori.php" class="btn btn-primary my-2">Tambah Kategori </a>
            </center>
        </div>
        <div class="row">
            <table class="table text-light container">
                <thead class="bg-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $angka = 1; ?>
                    <?php while ($kategori = mysqli_fetch_assoc($result_kategori)) : ?>
                        <tr class="text-center text_light">
                            <th><?= $angka++; ?>.</th>
                            <td><?= $kategori['nama_kategori']; ?></td>
                            <td>
                                <a href="edit_kategori.php?id=<?= $kategori['id_kategori']; ?>" class="btn btn-warning text-light">Edit</a>
                                <a href="hapus_kategori.php?id=<?= $kategori['id_kategori']; ?>" class="btn btn-danger">Hapus</a>
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