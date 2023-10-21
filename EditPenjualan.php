<?php
	require_once('Connection.php');
	require_once('Penjualan.php');
	$obj = new CrudPenjualan;

	if(!$obj->detailData($_GET['IdPenjualan'])) die("Error : Id Penjualan tidak ada");
	if($_SERVER['REQUEST_METHOD']=='POST'):
		$JumlahPenjualan = $_POST['JumlahPenjualan'];
		$HargaJual = $_POST['HargaJual'];
		$IdPengguna = $_POST['IdPengguna'];
		$IdBarang = $_POST['IdBarang'];
		$idPelanggan = $_POST['idPelanggan'];
		if($obj->updateData($JumlahPenjualan, $HargaJual, $IdPengguna, $IdBarang, $idPelanggan, $obj->IdPenjualan)):
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
									<label>Jumlah Penjualan :</label>
									<input type="text" class="form-control" name="JumlahPenjualan" value="<?php echo $obj->JumlahPenjualan; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Harga Jual :</label>
									<input type="text" class="form-control" name="HargaJual" value="<?php echo $obj->HargaJual; ?>"/>
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
									<label>Id Pelanggan :</label>
									<input type="text" class="form-control" name="idPelanggan" value="<?php echo $obj->idPelanggan; ?>"/>
								</div>
							</div>
							<div class="col-md-4">
								<button type="submit" class="mt-4 btn btn-md btn-primary"> Simpan</button>
								<a href="MenuPenjualan.php" class="mt-4 btn btn-md btn-primary">Kembali</a>
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