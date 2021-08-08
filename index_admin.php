<?php include "header.php"; ?>
  	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<div class="container" style="margin-top:20px">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
		<h2>Daftar Siswa</h2>
	<hr>
	
	<table class="table table-striped table-hover table-sm table-bordered">
	<thead class="thead-dark">
	<tr>
		<th>NO.</th>
		<th>NIS</th>
		<th>Nama Siswa</th>
		<th>Kelas</th>
		<th>Tahun Ajaran</th>
		<th>Biaya</th>
		<th>Aksi</th>
	</tr>
	</thead>

	<?php 
	$sql = mysqli_query($konek,"SELECT * FROM siswa order by kelas asc");
	$no=1;
	while($d=mysqli_fetch_array($sql)){
		echo "<tr>
			<td>$no</td>
			<td>$d[nis]</td>
			<td>$d[namasiswa]</td>
			<td>$d[kelas]</td>
			<td>$d[tahunajaran]</td>
			<td>$d[biaya]</td>
			<td>
				<a href='edit_siswa.php?id=$d[idsiswa]'>Edit</a> /
				<a href='hapus_siswa.php?id=$d[idsiswa]'>Hapus</a>
			</td>
		</tr>";
		$no++;
	}
	?>
</table>
		<div class="table-responsive">
    	  	<table class="table table-striped table-dark">
     		   	<tr>
					<td><a href="index_admin.php"><img src="img/rp.png" alt="footer-logo" width=250px height=100px class="rounded float-left"></a></td>
					<td><a href="index_admin.php"><img src="img/present.png" alt="footer-logo" width=250px height=100px class="rounded mx-auto d-block"></a></td>
					<td><a href="index_admin.php"><img src="img/spponline.png" alt="footer-logo" width=250px height=100px class="rounded float-right"></a></td>
            	</tr>
          	</table>
       </div>
 	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

