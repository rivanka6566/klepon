<?php
session_start();
include 'db/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $u = $_POST['username'];
    $p = $_POST['password'];

    $res = mysqli_query($conn, "SELECT * FROM users WHERE username='$u' AND password='$p'");
    $data = mysqli_fetch_assoc($res);

    if ($data) {
        $_SESSION['username'] = $u;
        $_SESSION['role'] = $data['role'];
        header("Location: menu.php");
    } else {
        echo "<script>alert('Login salah!'); window.location='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>BPS KOTA BOGOR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #ffb347 0%, #ffcc33 50%, #ff7e5f 100%);
            background-attachment: fixed;
        }
        .card {
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(255, 152, 0, 0.15);
            background: linear-gradient(135deg, #fffbe6 60%, #ffe0b2 100%);
        }
        h3 {
            color: #ff9800;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .btn-primary {
            background: linear-gradient(90deg, #ff9800 0%, #ffb347 100%);
            border: none;
            color: #fff;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #ffb347 0%, #ff9800 100%);
            color: #fff;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
<div class="card p-4 shadow" style="width: 22rem;">
    <h3 class="text-center mb-4">Login</h3>
    <form method="POST">
        <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
        <button class="btn btn-primary w-100">Login</button>
    </form>
</div>
</body>
</html>