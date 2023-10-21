<?php
	require_once('Connection.php');
	require_once('Pembelian.php');
	$obj = new CrudPembelian;

	if(!$obj->detailData($_GET['IdPembelian'])) die("Error : Id Pembelian tidak ada");
	if($_SERVER['REQUEST_METHOD']=='POST'):
		$JumlahPembelian = $_POST['JumlahPembelian'];
		$HargaBeli = $_POST['HargaBeli'];
		$IdPengguna = $_POST['IdPengguna'];
		$IdBarang = $_POST['IdBarang'];
		$idSupplier = $_POST['idSupplier'];
		if($obj->updateData($JumlahPembelian, $HargaBeli, $IdPengguna, $IdBarang, $idSupplier, $obj->IdPembelian)):
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
									<label>Jumlah Pembelian :</label>
									<input type="text" class="form-control" name="JumlahPembelian" value="<?php echo $obj->JumlahPembelian; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Harga Beli :</label>
									<input type="text" class="form-control" name="HargaBeli" value="<?php echo $obj->HargaBeli; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Id Pengguna :</label>
									<input type="text" class="form-control" name="IdPengguna" value="<?php echo $obj->IdPengguna; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Id Barang :</label>
									<input type="text" class="form-control" name="IdBarang" value="<?php echo $obj->IdBarang; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Id Supplier :</label>
									<input type="text" class="form-control" name="idSupplier" value="<?php echo $obj->idSupplier; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<button type="submit" class="mt-4 btn btn-md btn-primary"> Simpan</button>
								<a href="MenuPembelian.php" class="mt-4 btn btn-md btn-primary">Kembali</a>
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