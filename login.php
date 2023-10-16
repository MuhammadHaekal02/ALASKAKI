<?php 
include "koneksi.php";
session_start(); 

if (isset($_POST['username']) && isset($_POST['password'])) {

	function validate($data){
    	$data = trim($data);
	  	$data = stripslashes($data);
	  	$data = htmlspecialchars($data);
	   	return $data;
	}

	$username = validate($_POST['username']);
	$password = validate($_POST['password']);

	if (empty($username)) {
		$_SESSION['flash_message'] = "Username is required";
		header("Location: index.php");
	    exit();
	}else if(empty($password)){
		$_SESSION['flash_message'] = "Password is required";
    header("Location: index.php");
	    exit();
	}else{

    $password = md5($password);

		$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['password'] === $password) {
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
              $_SESSION['username'] = $row['username'];
            	header("Location: index.html");
		        exit();
            }else{
							$_SESSION['flash_message'] = "Incorect Username or password";
							header("Location: index.php");
					        exit();
						}
		}else{
			$_SESSION['flash_message'] = "Incorect Username or password";
			header("Location: index.php");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
		exit();
}