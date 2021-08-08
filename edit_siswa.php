<?php include "header.php"; ?>
<link rel="stylesheet" href="css/bootstrap.min.css">

<?php
$sqlEdit = mysqli_query($konek, "SELECT * FROM siswa WHERE idsiswa='$_GET[id]'");
$e=mysqli_fetch_array($sqlEdit);
?>

<div class="container" style="margin-top:20px">
<h3>Edit Data Siswa | SPP ONLINE</h3>

<hr>

<form method="post" action="">
	<input type="hidden" name='idsiswa' value="<?php echo $e['idsiswa']; ?>" />
	<table>
		<div class="form-group row">
		<label class="col-sm-2 col-form-label">NIS</label>
			<div class="col-sm-10">
				<input type="text" name="nis" class="form-control" size="4" value="<?php echo $e['nis']; ?>" readonly required>
			</div>
		</div>
		<div class="form-group row">
		<label class="col-sm-2 col-form-label">NAMA SISWA</label>
			<div class="col-sm-10">
				<input type="text" name="namasiswa" class="form-control" value="<?php echo $e['namasiswa']; ?>" maxlength="40" required>
			</div>
		</div>
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">KELAS</label>
				<div class="col-sm-10">
					<select name="kelas" class="form-control" required>
						<option value="">-=Pilih Kelas=-</option>
						<?php
							$sqlKelas = mysqli_query($konek, "SELECT * FROM kelas order by kelas ASC");
							while($k=mysqli_fetch_array($sqlKelas)){

							if($k['kelas'] == $e['kelas']){
								$selected = "selected";
							}else{
								$selected ="";
							}

						?>
							<option value="<?php echo $k['kelas']; ?>" <?php echo $selected; ?>><?php echo $k['kelas']; ?></option>
						<?php
					}
					?>
					</select>
				</div>
			</div>
		<!-- <tr>	
			<td>Kelas</td>
			<td>
				<select name="kelas">
					<?php
					$sqlKelas = mysqli_query($konek, "SELECT * FROM kelas order by kelas ASC");
					while($k=mysqli_fetch_array($sqlKelas)){

						if($k['kelas'] == $e['kelas']){
							$selected = "selected";
						}else{
							$selected ="";
						}

						?>
						<option value="<?php echo $k['kelas']; ?>" <?php echo $selected; ?>><?php echo $k['kelas']; ?></option>
						<?php
					}
					?>
				</select>
			</td>
		</tr> -->
		<div class="form-group row">
		<label class="col-sm-2 col-form-label">TAHUN AJARAN</label>
			<div class="col-sm-10">
				<input type="text" name="tahunajaran" class="form-control" value="<?php echo $e['tahunajaran']; ?>">
			</div>
		</div>

		<div class="form-group row">
		<label class="col-sm-2 col-form-label">Biaya SPP</label>
			<div class="col-sm-10">
				<input type="text" name="biaya" class="form-control" value="<?php echo $e['biaya']; ?>" readonly>
			</div>
		</div>
		<div class="form-group row">
		<label class="col-sm-2 col-form-label">Jatuh Tempo</label>
			<div class="col-sm-10">
				<input type="text" name="jatuhtempo" class="form-control" value="2019-12-30" readonly>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" value="Update" class="btn btn-primary" />
					<a href="index.php" class="btn btn-warning">Kembali</a>
				</div>
		</div>
	</table>
</form>

<!-- proses edit data -->
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

	//variabel untuk menampung inputan dari form
	$id 	= $_POST['idsiswa'];
	$nis 	= $_POST['nis'];
	$nama 	= $_POST['namasiswa'];
	$kelas 	= $_POST['kelas'];
	$tahun 	= $_POST['tahunajaran'];
	$biaya 	= $_POST['biaya'];

	if($nis=='' || $nama =='' || $kelas==''){
		echo "Form Belum lengkap....";
	}else{
		$update = mysqli_query($konek, "UPDATE siswa SET nis='$nis',
											namasiswa='$nama',
											kelas='$kelas',
											tahunajaran='$tahun',
											biaya='$biaya'
										WHERE idsiswa='$id'");

		if(!$update){
			echo "Update data gagal...";

		}else{
			echo '<script>window.location.href = "index_admin.php";</script>';
		}
	}
}
?>
