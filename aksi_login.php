<?php 
// menghubungkan dengan koneksi
include 'config.php';
session_start();
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);
// var_dump($username);
// var_dump($password);
// $akses = $_POST['akses'];



	$login = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$username' AND password='$password'");
	$cek = mysqli_num_rows($login);
    // var_dump($cek);die;
	if($cek > 0){
        $data = mysqli_fetch_assoc($login);
        if($data['role'] == "admin"){
	
		$_SESSION['id'] = $data['id'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['username'] = $data['username'];
		$_SESSION['status'] = "admin_login";

		header("location:admin.php");
        }else if($data['role']=="tatami1" && $data['tatami']=="tatami1"){

		$_SESSION['id'] = $data['id'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['username'] = $data['username'];
		$_SESSION['tatami'] = $data['tatami'];
		$_SESSION['status'] = "tatami1_login";

		header("location:tatami1.php");
        }else if($data['role']=="tatami2" && $data['tatami']=="tatami2"){

            $_SESSION['id'] = $data['id'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['tatami'] = $data['tatami'];
            $_SESSION['status'] = "tatami2_login";
    
            header("location:tatami2.php");
            }
                
	}else{
		header("location:login.php?alert=gagal");
	}
