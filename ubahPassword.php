<?php
	//include "daftarProses.php";
	$con=mysqli_connect("localhost","root","","projekRegex");
	$db = new mysqli("localhost", "root", "", "projekRegex");
	
	session_start();
	//.var_dump($_SESSION);
	$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
	if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
	  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
	}

	//$id = $_GET['id'];
	$id = $_SESSION['id'];
	
	if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
	  $_SESSION['user'] = NULL;
	  unset($_SESSION['user']);
	  
	  $logoutGoTo = "login.php";
	  if ($logoutGoTo) {
		header("Location: $logoutGoTo");
		exit;
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
			<h1>Hallo</h1>
			<form action="passwordProcess.php" method="POST" class="">
				<input type="text" hidden value="<?php echo $id ?>" name="id">
				<label for="password">Masukkan Password Lama</label>
				<input type="password" placeholder="PasswordAnda9876" name="password" id="password" required><br>
				<label for="passwordBaru">Masukkan Password Baru</label>
				<input type="password" placeholder="12323dasda" name="passwordBaru" id="passwordBaru" required><br>
				<a href="#" id="passGen" class="w3-button w3-round w3-hover-teal buttonPassGen">Buat random password :</a>
				<span id="generatedPassword"></span>
				<br>
				<button class="w3-button w3-round w3-teal" type="submit" name="ubah" id="ubah">Ubah</button>
			</form>
			<a class="w3-button w3-round w3-border w3-border-teal buttonLogout" href="<?php echo $logoutAction ?>">Logout</a>
		</main>
		
		<script>
			let tombolGeneratePass = document.getElementById("passGen");
			let hasilPassnya = document.getElementById("generatedPassword");
			let tempatPassword = document.getElementById("password");
			let inputanPassBaru = document.getElementById("passwordBaru");
			let panjangPassword = 8;
			const regexPass = new RegExp('^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$');
			const hurufAngka = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
			tombolGeneratePass.addEventListener("click",function(event){
				let passHasil = "";
				while(regexPass.test(passHasil)==false){
					passHasil="";
					let waktu = new Date();
					let detik = waktu.getSeconds();
					if(detik%2){
						panjangPassword = 8;
					} else if(detik%3){
						panjangPassword = 9;
					} else if(detik%5){
						panjangPassword = 10;
					} else if(detik%7){
						panjangPassword = 11;
					} else {
						panjangPassword = 12;
					};
					for(let i=0; i<panjangPassword; i++){
						passHasil += hurufAngka.charAt(Math.floor(Math.random()*hurufAngka.length));
					};
				}
				hasilPassnya.innerHTML=passHasil;
				inputanPassBaru.placeholder=passHasil;
		
			});
		</script>
	</body>
</html>