<?php
	$con=mysqli_connect("localhost","root","","projekRegex");
	session_start();

	if(isset($_POST['daftar']))
	{
		
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$username = mysqli_real_escape_string($con,$_POST['username']);
		$nama = mysqli_real_escape_string($con,$_POST['nama']);
		$password = mysqli_real_escape_string($con,$_POST['password']);
		
		$cek_username=mysqli_num_rows(mysqli_query($con,"SELECT username FROM akun WHERE username REGEXP '$username'"));
		$cek_email=mysqli_num_rows(mysqli_query($con,"SELECT email FROM akun WHERE email REGEXP '$email'"));
		
		if ($cek_username > 0){
			print('<script>alert("Username '.$username.' telah digunakan, silahkan pilih username lain.");</script>');
		}
		else{
			if($cek_email > 0){
				print('<script>alert("Email '.$email.' sudah digunakan, silahkan pilih email lain.");</script>');
				$emailGanti = "ya";
				//kasih regex rekomen email
			}
			else{
				if(mysqli_query($con,"INSERT INTO akun(email, username, nama, password) VALUES('$email','$username','$nama','$password')"))
				{
					print('<script>alert("Berhasil mendaftar!");</script>');
					header('Location: ubahPassword.php');
				}
				else
				{
					print('<script>alert("Gagal registrasi...");</script>');
				}
			}
			
		}
	}
?>