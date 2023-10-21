<?php
	require_once('Connection.php');
	require_once('Pengguna.php');
	$obj = new CrudPengguna;

	if(!$obj->detailData($_GET['IdPengguna'])) die("Error : Id Pengguna tidak ada");
	if($_SERVER['REQUEST_METHOD']=='POST'):
		$NamaPengguna = $_POST['NamaPengguna'];
		$Password = $_POST['Password'];
		$NamaDepan = $_POST['NamaDepan'];
		$NamaBelakang = $_POST['NamaBelakang'];
		$NoHp = $_POST['NoHp'];
		$Alamat = $_POST['Alamat'];
		$IdAkses = $_POST['IdAkses'];
		if($obj->updateData($NamaPengguna, $Password, $NamaDepan, $NamaBelakang, $NoHp, $Alamat, $IdAkses, $obj->IdPengguna)):
			echo '<div class="alert alert-success">Data berhasil disimpan!!</div>';
		else:
			echo '<div class="alert alert-danger">Data berhasil disimpan----</div>';
		endif;
	endif;

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Tugas Kelompok - Introduction Data and Information Management - TEAM 4</title>

		<link href="../assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

	</head>
	<body>
		<div class="container">
			<div class="card shadow mb-4 mt-4">
				<div class="card-header py-3">
					<h3 class="m-0 font-weight-bold text-primary">Tugas Kelompok - Introduction Data and Information Management</h3>
				</div>
				<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Nama Pengguna :</label>
									<input type="text" class="form-control" name="NamaPengguna" value="<?php echo $obj->NamaPengguna; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Password :</label>
									<input type="text" class="form-control" name="Password" value="<?php echo $obj->Password; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Nama Depan :</label>
									<input type="text" class="form-control" name="NamaDepan" value="<?php echo $obj->NamaDepan; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Nama Belakang :</label>
									<input type="text" class="form-control" name="NamaBelakang" value="<?php echo $obj->NamaBelakang; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Nomor HP :</label>
									<input type="text" class="form-control" name="NoHp" value="<?php echo $obj->NoHp; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Alamat :</label>
									<input type="text" class="form-control" name="Alamat" value="<?php echo $obj->Alamat; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Id Akses :</label>
									<input type="text" class="form-control" name="IdAkses" value="<?php echo $obj->IdAkses; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<button type="submit" class="mt-4 btn btn-md btn-primary"> Simpan</button>
								<a href="MenuPengguna.php" class="mt-4 btn btn-md btn-primary">Kembali</a>
							</div>
						</div>
					</div>
				</form>
		
			</div>
		</div>

	<script src="../assets/jquery/jquery.min.js"></script>
	<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
	</body>
</html>