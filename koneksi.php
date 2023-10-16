<?php
	$conn = mysqli_connect("localhost", "root", "", "shoes");

	if (!$conn) {
		die("Koneksi Gagal : " . mysqli_connect_error());
	}
?>