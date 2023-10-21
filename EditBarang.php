<?php
	require_once('Connection.php');
	require_once('Barang.php');
	$obj = new CrudBarang;

	if(!$obj->detailData($_GET['IdBarang'])) die("Error : IdBarang tidak ada");
	if($_SERVER['REQUEST_METHOD']=='POST'):
		$NamaBarang = $_POST['NamaBarang'];
		$Keterangan = $_POST['Keterangan'];
		$Satuan = $_POST['Satuan'];
		$IdPengguna = $_POST['IdPengguna'];
		if($obj->updateData($NamaBarang, $Keterangan, $Satuan, $IdPengguna, $obj->IdBarang)):
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
									<label>Nama Barang :</label>
									<input type="text" class="form-control" name="NamaBarang" value="<?php echo $obj->NamaBarang; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Keterangan :</label>
									<input type="text" class="form-control" name="Keterangan" value="<?php echo $obj->Keterangan; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Satuan :</label>
									<input type="text" class="form-control" name="Satuan" value="<?php echo $obj->Satuan; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>IdPengguna :</label>
									<input type="text" class="form-control" name="IdPengguna" value="<?php echo $obj->IdPengguna; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<button type="submit" class="mt-4 btn btn-md btn-primary"> Simpan</button>
								<a href="MenuBarang.php" class="mt-4 btn btn-md btn-primary">Kembali</a>
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