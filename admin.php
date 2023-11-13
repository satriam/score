<?php
session_start();

// Cek apakah pengguna sudah login
if (isset($_SESSION['id'])) {
  if($_SESSION['status']==="tatami1_login"){
        header("location:tatami1.php");
        exit();
    }else if($_SESSION['status']==="tatami2_login"){
        header("location:tatami2.php");
        exit();
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>P BALAP</p>
    <a href="logout.php">Logout</a>
</body>
</html>