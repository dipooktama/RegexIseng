<?php
	$con=mysqli_connect("localhost","root","","projekRegex");
	session_start();
/*
$tes0="SELECT * from akun";
$res=mysqli_query($con,$tes0);
while($row = mysqli_fetch_array($res)) {
    //echo $row['email']; // Print a single column data
    print_r($row);       // Print the entire row data
}
$query_username=mysqli_query($con,"SELECT username FROM akun"); echo ('<br>');
//$i = 0; $misaluname="lalala"; $patternuname='/'.$misaluname.'/';
while($row=mysqli_fetch_array($query_username)){
			echo ($row[0]);
			if(preg_match($patternuname,$row[$i])){
				echo "\noke";
			};
			$i++;
		};
		*/
	if(isset($_POST['daftar']))
	{
		
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$username = mysqli_real_escape_string($con,$_POST['username']);
		$nama = mysqli_real_escape_string($con,$_POST['nama']);
		$password = mysqli_real_escape_string($con,$_POST['password']);
		
		// Cek username di database
		//$cek_username=mysqli_num_rows(mysqli_query($con,"SELECT username FROM akun WHERE username='$_POST[username]'"));
		//$cek_username=mysqli_num_rows(mysqli_query($con,"SELECT username FROM akun WHERE username='$username'"));
		//while($row=mysqli_fetch_array($query_username)){
		//	echo print_r($row);
		//};
		$query_username=mysqli_query($con,"SELECT username FROM akun");
		$i = 0; $patternuname='/'.$username.'/';
		while($row=mysqli_fetch_array($query_username)){
			//echo ($row[0]);
			if(preg_match($patternuname,$row[$i])){
				print('<script>alert("Akun dengan username '.$username.' telah dibuat!");</script>');
			}
			else{
				echo('hmm');
			};
			$i++;
		};
		// Kalau username sudah ada yang pakai
		//$cek_email=mysqli_num_rows(mysqli_query($con,"SELECT email FROM akun WHERE email='$_POST[email]'"));
		/*
		$cek_email=mysqli_num_rows(mysqli_query($con,"SELECT email FROM akun WHERE email='$email'"));
		if ($cek_username > 0){
			?>
					<script>alert('Akun dengan username tersebut telah dibuat!');</script>
					<?php
		}
		else{
			if($cek_email > 0){
				?>
					<script>alert('Email sudah digunakan!');</script>
				<?php
				//kasih regex rekomen email
			}
			else{
				if(mysqli_query($con,"INSERT INTO akun(email, username, nama, password) VALUES('$email','$username','$nama','$password')"))
				{
				?>
						<script>alert('Berhasil mendaftar!');</script>
						<?php
				}
				else
				{
				?>
						<script>alert('Gagal registrasi...');</script>
						<?php
				}
			}
			
		}
		*/
	} //else{echo('hmm');}
?>