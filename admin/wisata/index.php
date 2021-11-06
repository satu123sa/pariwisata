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

<body>
    <main style="margin-top: 90px;">

        <!-- Navbar -->
        <?php
        include_once '../../template/navbar_admin.php'
        ?>

        <!-- Content -->
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="container">
                    <table class="table text-light">
                        <thead class="bg-dark">
                            <tr class="text-center text-light">
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
                    </table>
                </div>
            </div>
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