<?php
	require_once('Connection.php');
	require_once('Pelanggan.php');
	$obj = new CrudPelanggan;

	if(!$obj->detailData($_GET['idPelanggan'])) die("Error : Id Pelanggan tidak ada");
	if($_SERVER['REQUEST_METHOD']=='POST'):
		$namaPelanggan = $_POST['namaPelanggan'];
		$alamatPelanggan = $_POST['alamatPelanggan'];
		$noHP = $_POST['noHP'];
		$jenisKelaminCode = $_POST['jenisKelaminCode'];
		$tanggalLahir = $_POST['tanggalLahir'];
		if($obj->updateData($namaPelanggan, $alamatPelanggan, $noHP, $jenisKelaminCode, $tanggalLahir, $obj->idPelanggan)):
			echo '<div class="alert alert-success">Data berhasil disimpan!!</div>';
		else:
			echo '<div class="alert alert-danger">Data berhasil disimpan----</div>';
		endif;
	endif;

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Tutorial PHP : CRUD OOP PHP</title>

		<link href="../assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

	</head>
	<body>
		<div class="container">
			<div class="card shadow mb-4 mt-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Tugas Kelompok - Introduction Data and Information Management</h6>
				</div>
				<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Nama Pelanggan :</label>
									<input type="text" class="form-control" name="namaPelanggan" value="<?php echo $obj->namaPelanggan; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Alamat :</label>
									<input type="text" class="form-control" name="alamatPelanggan" value="<?php echo $obj->alamatPelanggan; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Nomor HP :</label>
									<input type="text" class="form-control" name="noHP" value="<?php echo $obj->noHP; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Jenis Kelamin :</label>
									<input type="text" class="form-control" name="jenisKelaminCode" value="<?php echo $obj->jenisKelaminCode; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Tanggal Lahir :</label>
									<input type="text" class="form-control" name="tanggalLahir" value="<?php echo $obj->tanggalLahir; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<button type="submit" class="mt-4 btn btn-md btn-primary"> Simpan</button>
								<a href="MenuPelanggan.php" class="mt-4 btn btn-md btn-primary">Kembali</a>
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