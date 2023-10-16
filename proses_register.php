<?php
include 'koneksi.php';
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$name = $_POST['name'];
	$role = $_POST['role'];

	$cek_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
	$cek_login = mysqli_num_rows($cek_user);

	if ($cek_login > 0) {
		$_SESSION['flash_message'] = "Username telah terdaftar";
		header("Location: register.php");
	    	exit();
	} else {
		if ($password != $cpassword){
			$_SESSION['flash_message'] = "Konfirmasi password tidak sesuai";
		    header("Location: register.php");
			    exit();
		} else {
			mysqli_query($conn, "INSERT INTO user VALUES('','$username', '$password', '$name', '$role')");
			$_SESSION['flash_message'] = 'Berhasil Registrasi';
			header("Location: index.php");
		}
	}
}

?>