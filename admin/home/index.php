<?php

include_once '../../template/sesion_admin.php';

include_once '../../koneksi.php';

// result(query wisata)
$result = mysqli_query(
    $conn,
    "SELECT * FROM tb_wisata
        INNER JOIN tb_user
        ON tb_wisata.penulis = tb_user.username
        INNER JOIN tb_daerah
        ON tb_wisata.id_daerah = tb_daerah.id_daerah
        INNER JOIN tb_kategori
        ON tb_wisata.id_kategori = tb_kategori.id_kategori"
);

// result(query portal wisata)
$result_portal = mysqli_query(
    $conn,
    "SELECT * FROM tb_portal_wisata
        INNER JOIN tb_wisata
        ON tb_portal_wisata.id_wisata = tb_wisata.id_wisata"
);

// result(query wisata)
$result_kategori = mysqli_query(
    $conn,
    "SELECT * FROM tb_kategori"
);

// result(query wisata)
$result_daerah = mysqli_query(
    $conn,
    "SELECT * FROM tb_daerah"
);

// result(query beritas)
$result_berita = mysqli_query(
    $conn,
    "SELECT * FROM tb_berita
        INNER JOIN tb_user
        ON tb_berita.penulis = tb_user.username"
);

?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        <div class="container-fluid">
            <!-- wisata -->
            <div class="row">
                <center>
                    <a href="../wisata/" class="nav-link">
                        <h1 class="text-light">Tabel Wisata</h1>
                    </a>
                </center>
                <table class="table text-light">
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
                        <?php while ($wisata = mysqli_fetch_assoc($result)) : ?>
                            <tr class="text-center text_light">
                                <th><?= $angka++; ?>.</th>
                                <td><?= $wisata['nama_wisata']; ?></td>
                                <td><?= $wisata['lokasi_wisata']; ?></td>
                                <td><img style="width: 150px;" src="../../media/<?= $wisata['gambar_wisata']; ?>" alt=""></td>
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
                    <thead class="bg-dark">
                        <tr class="text-center">
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- wisata -->
            <!-- Portal Wisata -->
            <div class="row">
                <center>
                    <a href="../portal_wisata/" class="nav-link">
                        <h1 class="text-light">Tabel Portal Wisata</h1>
                    </a>
                </center>
                <table class="table text-light">
                    <thead class="bg-dark">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Wisata</th>
                            <th>Gbr Wisata</th>
                            <th>Ket Wisata</th>
                            <th>Published</th>
                            <th>Updated</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $angka = 1; ?>
                        <?php while ($portal = mysqli_fetch_assoc($result_portal)) : ?>
                            <tr class="text-center text_light">
                                <th><?= $angka++; ?>.</th>
                                <td><?= $portal['nama_wisata']; ?></td>
                                <td><img style="width: 150px;" src="../../media/<?= $portal['gambar']; ?>" alt=""></td>
                                <td><?= $portal['ket_wisata']; ?></td>
                                <td><?= $portal['published']; ?></td>
                                <td><?= $portal['updated']; ?></td>
                                <td>
                                    <a href="edit_portal_wisata.php?id=<?= $portal['id_portal']; ?>" class="btn btn-warning text-light">Edit</a>
                                    <a href="hapus_portal_wisata.php?id=<?= $portal['id_portal']; ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <thead class="bg-dark">
                        <tr class="text-center">
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- Portal Wisata -->
            <!-- Berita Wisata -->
            <div class="row">
                <center>
                    <a href="../berita/" class="nav-link">
                        <h1 class="text-light">Tabel Berita</h1>
                    </a>
                </center>
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
                    <thead class="bg-dark">
                        <tr class="text-center">
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- Berita Wisata -->
            <!-- Kategori Wisata -->
            <div class="row">
                <center>
                    <a href="../kategori/" class="nav-link">
                        <h1 class="text-light">Tabel Kategori</h1>
                    </a>
                </center>
                <table class="table text-light">
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
                    <thead class="bg-dark">
                        <tr class="text-center">
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- Kategori Wisata -->
            <!-- Daerah Wisata -->
            <div class="row">
                <center>
                    <a href="../daerah/" class="nav-link">
                        <h1 class="text-light">Tabel Daerah</h1>
                    </a>
                </center>
                <table class="table text-light">
                    <thead class="bg-dark">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Daerah</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $angka = 1; ?>
                        <?php while ($daerah = mysqli_fetch_assoc($result_daerah)) : ?>
                            <tr class="text-center text_light">
                                <th><?= $angka++; ?>.</th>
                                <td><?= $daerah['nama_daerah_wisata']; ?></td>
                                <td>
                                    <a href="edit_daerah.php?id=<?= $daerah['id_daerah']; ?>" class="btn btn-warning text-light">Edit</a>
                                    <a href="hapus_daerah.php?id=<?= $daerah['id_daerah']; ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <thead class="bg-dark">
                        <tr class="text-center">
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- Daerah Wisata -->
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