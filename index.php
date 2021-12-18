<?php
	$email ="";
	$emailGanti = "ga";
	//$email ="something@something.com";
	/*
	$patternEmail = "/@[a-z0-9]+\.(com|org|net)$/";
	$arrayEmailBaru = array();
	$arrayEmailPengganti = array("gmail","protonmail","outlook");
	for($i=0;$i<3;$i++){
		$arrayEmailBaru[] = preg_replace($patternEmail,"@".$arrayEmailPengganti[$i].".com",$email);
	}
	print_r($arrayEmailBaru);
	*/
	include "daftarProses.php";
?>
<!DOCTYPE html>
	<head>
		<title>Projek Regex</title>
		<link rel="stylesheet" href="customstyle.css">
		<link rel="stylesheet" href="w3.css">
	</head>
	<body class="w3-container">
		<main class="w3-container w3-card-2 w3-round-large w3-animate-opacity">
			<h1 class="" >Daftar</h1>
			<form method="POST">
				<label for="email">Masukkan Email</label>
				<input type="text" placeholder="emailanda@apasaja.com" name="email" id="email" value="<?php echo ($email) ?>" required>
				<span id="emailCheck"></span><br>
				<?php
					if($emailGanti=="ya"){
						$patternEmail = "/@[a-z0-9]+\.(com|org|net)$/";
						$arrayEmailBaru = array();
						$arrayEmailPengganti = array("gmail","protonmail","outlook");
						print "<span>Saran Email Pengganti : </span><br>";
						print "<ol>";
						for($i=0;$i<3;$i++){
							$arrayEmailBaru[] = preg_replace($patternEmail,"@".$arrayEmailPengganti[$i].".com",$email);
							print '<li>'.$arrayEmailBaru[$i].'</li>';
						}
						print "</ol>";
					}
				?>
				<label for="username">Buat Username</label>
				<input type="text" placeholder="UsernameAnda_2001" name="username" id="username" required><br>
				<label for="nama">Masukkan Nama Lengkap</label>
				<input type="text" placeholder="Nama lengkap anda" name="nama" id="nama" required>
				<span id="namaCheck"></span><br>
				<label for="password">Buat Password</label>
				<input type="password" placeholder="PasswordAnda9876" name="password" id="password" required>
				<br>
				<button type="submit" name="daftar" id="daftar" class="w3-button w3-round w3-teal" disabled>Daftar</button>
				<br>
				<p>Sudah punya akun? Silahkan <a href="login.php">Login disini</a></p>
			</form>
		</main>
		<script>
			let varEmail = false;
			let varNama = false;
			let submitnya = document.getElementById("daftar");
			function cekInput(varEmail,varNama){
				if(varEmail&&varNama===true){
					console.log('oke');
					submitnya.disabled=false;
				}
				else{
					console.log('hmm');
					submitnya.disabled=true;
				};
			};
			
			let emailnya = document.getElementById("email");
			let emailCheck = document.getElementById("emailCheck");
			const regexEmail = new RegExp('^[a-z0-9_\.]+@[a-z0-9]+\.(com|org|net)$');
			emailnya.addEventListener("input",function(event){
				if(regexEmail.test(emailnya.value)){
					emailCheck.style.color="#000";
					emailCheck.innerHTML="bener";
					varEmail=true;
				}
				else{
					emailCheck.style.color="#F00";
					emailCheck.innerHTML="format email salah";
					varEmail=false;
				};
				cekInput(varNama,varEmail);
			});
			
			let namanya = document.getElementById("nama");
			let namaCheck = document.getElementById("namaCheck");
			const regexNama = new RegExp('^[a-zA-Z ]+$');
			namanya.addEventListener("input",function(event){
				if(regexNama.test(namanya.value)){
					namaCheck.style.color="#000";
					namaCheck.innerHTML="bener";
					varNama=true;
				}
				else{
					namaCheck.style.color="#F00";
					namaCheck.innerHTML="format nama salah";
					varNama=false;
				};
				cekInput(varNama,varEmail);
			});
		</script>
	</body>
</html>