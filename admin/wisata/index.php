<?php
include_once '../../koneksi.php';

// result(query wisata)
$result_wisata = mysqli_query(
    $conn,
    "SELECT * FROM tb_wisata
        INNER JOIN penulis
        ON tb_wisata.penulis = tb_user.username
        INNER JOIN tb_kelas
        ON tb_wisata.daerah_wisata = tb_daerah.id_daerah"
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
    <link rel="stylesheet" href="../../vendor/css/bootstrap.min.css">
</head>

<body>
    <!-- Navbar -->
    <?php
    include_once '../../template/navbar.php'
    ?>
    <!-- Content -->
    <div class="container">
        <div class="row">
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
    <!-- Content -->
    <!-- Footer -->
    <?php
    include_once '../../template/footer.php'
    ?>
    <!-- JS -->
    <script src="../../vendor/js/bootstrap.min.js"></script>
</body>

</html>