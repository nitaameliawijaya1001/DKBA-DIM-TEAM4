
<?php
	require_once('Connection.php');
	require_once('HakAkses.php');
	$obj = new CrudHakAkses;

	if(!$obj->detailData($_GET['IdAkses'])) die("Error : id akses tidak ada");
	if($_SERVER['REQUEST_METHOD']=='POST'):

		if($obj->delete($obj->IdAkses)):
			echo '<div class="alert alert-success">Data berhasil dihapus</div>';
		else:

			echo '<div class="alert alert-danger">Data berhasil disimpan</div>';
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
				<h6 class="m-0 font-weight-bold text-primary">Tugas Kelompok - Introduction Data and Information Management</h6>
			</div>
			<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
				<div class="card-body">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Nama Akses :</label>
								<label><?php echo $obj->NamaAkses; ?></label>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Keterangan :</label>
								<label><?php echo $obj->Keterangan; ?></label>
							</div>
						</div>
						<div class="col-md-4">
							<button type="submit" class="mt-4 btn btn-md btn-primary">Delete</button>
							<a href="MenuHakAkses.php" class="mt-4 btn btn-md btn-primary">Kembali</a>
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