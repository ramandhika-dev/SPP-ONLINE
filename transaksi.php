<?php include "header.php" ?>
<link rel="stylesheet" href="css/bootstrap.min.css">

<div class="container" style="margin-top:20px">
<h3>Transaksi Pembayaran SPP ONLINE</h3>
<hr>
<form method="get" action="">
	<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" name="nis" placeholder="Masukkan NIS Siswa" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
    </form>
</form>

<?php
if(isset($_GET['nis']) && $_GET['nis']!=''){
	$sqlSiswa = mysqli_query($konek, "SELECT * FROM siswa WHERE nis='$_GET[nis]'");
	$ds=mysqli_fetch_array($sqlSiswa);
	$nis = $ds['nis'];
?>

<div class="container" style="margin-top:20px">
<h3>Biodata Siswa</h3>
<hr>
<table>
	<tr>
		<td>NIS</td>
		<td>:</td>
		<td><b><?php echo $ds['nis']; ?></b></td>
	</tr>
	<tr>
		<td>Nama Siswa</td>
		<td>:</td>
		<td><b><?php echo $ds['namasiswa']; ?></b></td>
	</tr>
	<tr>
		<td>Kelas</td>
		<td>:</td>
		<td><b><?php echo $ds['kelas']; ?></b></td>
	</tr>
	<tr>
		<td>Tahun Ajaran</td>
		<td>:</td>
		<td><b><?php echo $ds['tahunajaran']; ?></b></td>
	</tr>
</table>

<div class="container" style="margin-top:30px">
<h3>Tagihan SPP Siswa</h3>
<hr>
<table class="table table-striped table-dark">
	<tr>
		<th>No</th>
		<th>Bulan</th>
		<th>Jatuh Tempo</th>
		<th>No. Bayar</th>
		<th>Tgl. Bayar</th>
		<th>Jumlah</th>
		<th>Keterangan</th>
		<th>Bayar</th>
	</tr>

	<?php
	$sql = mysqli_query($konek, "SELECT * FROM spp WHERE idsiswa='$ds[idsiswa]' ORDER BY jatuhtempo ASC");
	$no=1;
	while($d=mysqli_fetch_array($sql)){
		echo "<tr>
			<td>$no</td>
			<td>$d[bulan]</td>
			<td>$d[jatuhtempo]</td>
			<td>$d[nobayar]</td>
			<td>$d[tglbayar]</td>
			<td>$d[jumlah]</td>
			<td>$d[ket]</td>
			<td align='center'>";
				if($d['nobayar']==''){
					echo "<a href='proses_transaksi.php?nis=$nis&act=bayar&id=$d[idspp]'>Bayar</a>";
				}else{
					echo "-";
				}
			echo "</td>
		</tr>";
		$no++;
	}
	?>
</table>

<?php
}
?>
		<div class="table-responsive">
          <table class="table table-striped table-dark">
            <tr>
							<td><a href="index.php"><img src="img/rp.png" alt="footer-logo" width=250px height=100px class="rounded float-left"></a></td>
							<td><a href="index.php"><img src="img/present.png" alt="footer-logo" width=250px height=100px class="rounded mx-auto d-block"></a></td>
			  			<td><a href="index.php"><img src="img/spponline.png" alt="footer-logo" width=250px height=100px class="rounded float-right"></a></td>
            </tr>
          </table>
       </div>
<p>Pembayaran SPP dilakukan dengan cara mencari tagihan siswa dengan NIS melalui form di atas, kemudian proses pembayaran</p>
