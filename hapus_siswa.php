<?php
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
	$hapus = mysqli_query($konek, "DELETE FROM siswa WHERE idsiswa='$_GET[id]'");
	
	if($hapus){
		header('location:index_admin.php');
	}else{
		echo "Hapus data gagal...,
			<a href='index_admin.php'><<< Kembali</a>";
	}
}else{
	echo "Anda tidak memiliki akses ke halaman ini!!!";
}
?>