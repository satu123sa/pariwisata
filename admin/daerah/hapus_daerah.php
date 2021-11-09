<?php
include_once '../../koneksi.php';

// tangkap id melalui url
$id_daerah = $_GET['id'];

$query = "DELETE FROM tb_daerah WHERE id_daerah = '$id_daerah'";

mysqli_query($conn, $query);

$cek = mysqli_affected_rows($conn);

if ($cek > 0) {
    echo "
            <script>
                alert('Data berhasil di dihapus');
                window.location.href = 'index.php';
            </script>
        ";
} else {
    echo "
            <script>
                alert('Data gagal di dihapus');
                window.location.href = 'index.php';
            </script>
        ";
}
