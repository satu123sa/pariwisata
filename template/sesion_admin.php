<?php 
session_start();

if ($_SESSION['role'] != "admin") {
echo "
<script>
    alert('Anda bukan admin! Silahkan login sebagai admin');
    window.location.href = '../../login.php';
</script>
";
}
