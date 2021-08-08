<?php include "header.php"; ?>
<link rel="stylesheet" href="css/bootstrap.min.css">

<div class="container" style="margin-top:20px">
<h3>Tambah Data Siswa | SPP ONLINE</h3>
<hr>

<form method="post" action="">
	<table>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">NIS</label>
				<div class="col-sm-10">
					<input type="text" name="nis" class="form-control" maxlength="10">
				</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nama Siswa</label>
				<div class="col-sm-10">
					<input type="text" name="namasiswa" class="form-control" maxlength="40">
				</div>
		</div>
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kelas</label>
				<div class="col-sm-10">
					<select name="kelas" class="form-control" required>
					<option value="" selected>-=Pilih Kelas=-</option>
					<?php
					$sqlKelas = mysqli_query($konek, "select * from kelas order by kelas ASC");
					while($k=mysqli_fetch_array($sqlKelas)){
						?>
						<option value="<?php echo $k['kelas']; ?>"><?php echo $k['kelas']; ?></option>
						<?php
					}
					?>
				</select>
				</div>
		</div>
		</tr>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Tahun Ajaran</label>
				<div class="col-sm-10">
					<input type="text" name="tahunajaran" class="form-control" value="2018/2019">
				</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Biaya SPP</label>
				<div class="col-sm-10">
					<input type="text" name="biaya" class="form-control" value="300000">
				</div>
		</div>
		<div class="form-group row">
			<label class="col-sm -2 col-form-label">Jatuh Tempo Pertama</label>
				<div class="col-sm-10">
					<input type="text" name="jatuhtempo" class="form-control" value="2019-12-29" >
				</div>
		</div>
		<tr>
			<td></td>
			<td><input type="submit" value="Simpan" class="btn btn-primary" /></td>
		</tr>
	</table>
</form>

<!-- simpan data -->
<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//variabel untuk menampung inputan dari form
		$nis 	= $_POST['nis'];
		$nama 	= $_POST['namasiswa'];
		$kelas 	= $_POST['kelas'];
		$tahun 	= $_POST['tahunajaran'];
		$biaya 	= $_POST['biaya'];
		$awaltempo = $_POST['jatuhtempo'];

		// Membuat Array untuk menampung bulan bahasa indonesia
		$bulanIndo = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		);


		//proses simpan
		if($nis=='' || $nama=='' || $kelas==''){
			echo "Form belum lengkap...";
		}else{
			$simpan = mysqli_query($konek, "insert into siswa(nis,namasiswa,kelas,tahunajaran,biaya)
					values('$nis','$nama','$kelas','$tahun','$biaya')");
			if(!$simpan){
				echo "Penyimpanan data gagal..";
			}else{
				//ambil data id siswa terakhir
				$ds=mysqli_fetch_array(mysqli_query($konek, "SELECT idsiswa FROM siswa ORDER BY idsiswa DESC LIMIT 1"));
				$idsiswa = $ds['idsiswa'];

				//membuat tagihan (12 bulan dimulai dari Juli 2017 dan menyimpan tagihan di tabel spp
				for($i=0; $i<12; $i++){
					//membuat tanggal jatuh tempo nya setiap tanggal 10
					$jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));

					$bulan = $bulanIndo[date('m', strtotime($jatuhtempo))]." ".date('Y',strtotime($jatuhtempo));

					mysqli_query($konek, "INSERT INTO spp(idsiswa,jatuhtempo,bulan,jumlah)
								values('$idsiswa','$jatuhtempo','$bulan','$biaya')");
				}

				echo '<script>window.location.href = "index_admin.php";</script>';
			}
		}

	}
?>
