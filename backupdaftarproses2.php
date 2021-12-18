<?php
	$con=mysqli_connect("localhost","root","","projekRegex");
	session_start();

	if(isset($_POST['daftar']))
	{
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$username = mysqli_real_escape_string($con,$_POST['username']);
		$nama = mysqli_real_escape_string($con,$_POST['nama']);
		$password = mysqli_real_escape_string($con,$_POST['password']);
		
		$query_username=mysqli_query($con,"SELECT username FROM akun");
		$query_email=mysqli_query($con,"SELECT email FROM akun");
		//$query_username_email=mysqli_query($con,"SELECT username, email FROM akun");
		 
		//$usernameAda = false;
		$patternUsername='/'.$username.'/';
		$patternEmail='/'.$email.'/';
		
		function cekUsername($query_username,$patternUsername){
			$i = 0;
			while($row=mysqli_fetch_array($query_username)){
				//echo ($row[0]);
				echo print_r($row); print'<br>';
				if(preg_match($patternUsername,$row[$i])){
					return true;
				}
				$i++;
			};
		}
		
		function cekEmail($query_email,$patternEmail){
			$i = 0;
			while($row=mysqli_fetch_array($query_email)){
				//echo ($row[0]);
				echo print_r($row); print'<br>';
				if(preg_match($patternEmail,$row[$i])){
					return true;
				}
				$i++;
			};
		}
		
		if(cekEmail($query_email,$patternEmail)){
			print('<script>alert("Akun dengan username '.$username.' telah dibuat!");</script>');
		}
		else if(preg_match($patternEmail,$row[$j])){
			print('<script>alert("Email sudah digunakan!");</script>');
		}
		else{
			if(mysqli_query($con,"INSERT INTO akun(email, username, nama, password) VALUES('$email','$username','$nama','$password')"))
			{
				print('<script>alert("Berhasil mendaftar!");</script>');			
			}
			else{
				print('<script>alert("Gagal registrasi...");</script>');
			}
		}
	} //else{echo('hmm');}
?>