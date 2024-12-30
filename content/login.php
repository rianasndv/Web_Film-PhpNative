<?php
session_start();

require_once('koneksiee.php');

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM tb_user WHERE username = ?";
    $statement = $koneksi->prepare($query);
    $statement->bind_param("s", $username);
    $statement->execute();
    $result = $statement->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if ($user['level'] == "admin") {
            if ($password == $user['password']) {
                $_SESSION['tb_user'] = $username;
                header("Location: index.php");
                exit();
            } else {
                $error = "Username atau Password yang anda masukkan Salah!";
            }
        } elseif ($user['level'] == "user") {
            if ($password == $user['password']) {
                $_SESSION['tb_user'] = $username;
                header("Location: pelanggan_film.php");
                exit();
            } else {
                $error = "Username atau Password yang anda masukkan Salah!";
            }
        } else {
            $error = "Tingkat akses tidak valid!";
        }
    } else {
        $error = "Username atau Password yang anda masukkan Salah!";
    }

    $statement->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            background-image: url('../assets/images/bgp.jpg');
            background-size: cover;
            color: white; /* Teks berwarna putih agar terlihat di atas background */
        }

        .container {
            max-width: 400px;
            margin: auto;
            margin-top: 100px;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1 align="center">Welcome To The Page Film_RR</h1>
    <div class="container">
        <form action="" method="post">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
