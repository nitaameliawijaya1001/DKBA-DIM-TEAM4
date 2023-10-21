<?php
	require_once('Connection.php');
	require_once('Supplier.php');
	$obj = new CrudSupplier;

	if(!$obj->detailData($_GET['idSupplier'])) die("Error : idSupplier tidak ada");
	if($_SERVER['REQUEST_METHOD']=='POST'):
		$namaSupplier = $_POST['namaSupplier'];
		$alamat = $_POST['alamat'];
		$noHP = $_POST['noHP'];
		if($obj->updateData($namaSupplier, $alamat, $noHP, $obj->idSupplier)):
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
									<label>Nama Supplier :</label>
									<input type="text" class="form-control" name="namaSupplier" value="<?php echo $obj->namaSupplier; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Alamat :</label>
									<input type="text" class="form-control" name="alamat" value="<?php echo $obj->alamat; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>noHP :</label>
									<input type="text" class="form-control" name="noHP" value="<?php echo $obj->noHP; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<button type="submit" class="mt-4 btn btn-md btn-primary"> Simpan</button>
								<a href="MenuSupplier.php" class="mt-4 btn btn-md btn-primary">Kembali</a>
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