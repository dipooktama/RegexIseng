<?php
	$con=mysqli_connect("localhost","root","","projekRegex");
	$db = new mysqli("localhost", "root", "", "projekRegex");
	?>
<?php
	session_start();
	
	if(isset($_POST['login']))
	{
		$username = mysqli_real_escape_string($con,$_POST['username']);
		$password = mysqli_real_escape_string($con,$_POST['password']);
		$query_login = mysqli_query($con,"SELECT * FROM akun WHERE username='$username'");
		$hasil_query = mysqli_fetch_array($query_login);
		
		if($hasil_query['password']==$password){
			$_SESSION['id']=$hasil_query['id'];
			header('Location: ubahPassword.php');
		}
		else{
			print('<script>alert("Password salah atau tidak terdaftar!");</script>');
		}
	}
?>
<!DOCTYPE html>
	<head>
		<title>Projek Regex</title>
		<link rel="stylesheet" href="customstyle.css">
		<link rel="stylesheet" href="w3.css">
	</head>
	<body class="w3-container">
		<main class="w3-container w3-card-2 w3-round-large w3-animate-opacity">
				<h1>Login</h1>
			<form class="w3-form" method="POST">
				<label for="username">Masukkan Username</label>
				<input type="text" placeholder="UsernameAnda_2001" name="username" id="username" required><br>
				<label for="password">Masukkan Password</label>
				<input type="password" placeholder="PasswordAnda9876" name="password" id="password" required><br>
				<button type="submit" name="login" id="login" class="w3-button w3-round w3-teal">Login</button>
				<br>
				<p>Belum punya akun? Silahkan <a href="index.php"><em>Daftar disini<em></a></p>
			</form>
		</main>
		
		<script>
			
		</script>
	</body>
</html>