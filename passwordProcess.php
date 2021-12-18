<?php
	$con=mysqli_connect("localhost","root","","projekRegex");
	
	$id = $_POST['id'];
	$passwordLama=$_POST['password'];
	$passwordBaru=$_POST['passwordBaru'];
	
	$query=mysqli_query($con,"UPDATE akun SET password='$passwordBaru' where id='$id' AND password REGEXP '$passwordLama'");
	
	if($row=mysqli_affected_rows($con)>0)
	{
		echo "<script>alert('Password berhasil diubah')
		location.replace('ubahPassword.php')</script>";
	}
	else
	{
		echo "<script>alert('Password gagal diubah, silahkan cek lagi')
		location.replace('ubahPassword.php')</script>";
	}
?>