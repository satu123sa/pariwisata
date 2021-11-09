<?php

session_start();

include_once '../../koneksi.php';

// query
$result = mysqli_query($conn, "SELECT * FROM tb_user");

// cek tombol tambah di tekan
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "SELECT * FROM tb_user WHERE username = '$username' and password = '$password'";

    $result = mysqli_query($conn, $query);

    $rolee = mysqli_fetch_assoc($result);

    $role = $rolee['role'];

    $cek = mysqli_affected_rows($conn);

    if ($cek == 1) {
        $_SESSION['usrname'] = $username;
        $_SESSION['role'] = $role;
        if ($role == 'admin') {
            header("location:index.php");
        } else if ($role == 'user') {
            header("location:user/home.php");
        }
    } else {
        echo "
            <script>
                alert('Gagal');
                window.location.href = 'login.php';
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
    <title>Login</title>
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
        <!-- Login Admin -->
        <div class="container">
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary" name="login" value="login">Login</button>
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