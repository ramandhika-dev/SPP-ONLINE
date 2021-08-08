<!DOCTYPE html>
<link rel="stylesheet" href="css/bootstrap.min.css">
<html>
<head>
	<title>SPP ONLINE | Login Aplikasi Pembayaran </title>
	<link rel="shortcut icon" type="image/ico" href="favicon.ico"/>
</head>
<body>
<div class="container" style="margin-top:150px">
<h3>Silahkan Login Menggunakan Username dan Password Anda</h3>
<hr/>
<form method="post" action="">
<form >
  <div class="form-group kotak_login">
  <div class="col-auto">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan username">
  </div>
  <div class="form-group">
  <div class="col-auto">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <br>
  		<div class="col align-self-center">
     		<input type="submit" value="Login" class="btn btn-primary" />
    	</div>
</form>
</form>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	//variabel untuk menyimpan kiriman dari form
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	if($user=='' || $pass==''){
		echo "Form belum lengkap!!";
	}else{
		include "koneksi.php";
		$sqlLogin = mysqli_query($konek, "SELECT * FROM admin 
						WHERE username='$user' AND password='$pass'");
		$jml = mysqli_num_rows($sqlLogin);
		$d=mysqli_fetch_array($sqlLogin);
		if($jml > 0){
			session_start();
			$_SESSION['login']	= true;
			$_SESSION['id']		= $d['idadmin'];
			$_SESSION['username']=$d['username'];
			
			header('location:./index_admin.php');
		}else{
			echo "Username dan Password anda Salah!!!";
		}
	}
}
?>
</body>
</html>