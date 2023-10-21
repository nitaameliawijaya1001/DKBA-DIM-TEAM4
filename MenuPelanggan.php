<?php 
    require_once('Connection.php');
    require_once('Pelanggan.php');

    $obj = new CrudPelanggan;

    if($_SERVER['REQUEST_METHOD']=='POST'):
		$namaPelanggan = $_POST['namaPelanggan'];
		$alamatPelanggan = $_POST['alamatPelanggan'];
		$noHP = $_POST['noHP'];
		$jenisKelaminCode = $_POST['jenisKelaminCode'];
		$tanggalLahir = $_POST['tanggalLahir'];
        if($obj->insertData($namaPelanggan, $alamatPelanggan, $noHP, $jenisKelaminCode, $tanggalLahir)):
            echo '<div class="alert alert-success">Data berhasil disimpan</div>';
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
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama Pelanggan :</label>
                                    <input type="text" class="form-control" name="namaPelanggan"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Alamat :</label>
                                    <input type="text" class="form-control" name="alamatPelanggan"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nomor HP :</label>
                                    <input type="text" class="form-control" name="noHP"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jenis Kelamin :</label>
                                    <input type="text" class="form-control" name="jenisKelaminCode"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tanggal Lahir :</label>
                                    <input type="text" class="form-control" name="tanggalLahir"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="mt-4 btn btn-md btn-primary"> Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row m-auto">
                    <table class="table table-bordered">
                        <tr>
                            <th>NO</th>
                            <th>Id Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Nomor HP</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>AKSI</th>
                        </tr>
                        <?php 
                        $no=1;
                            $data=$obj->showData();
                            if($data->rowCount()>0){
                                while($row=$data->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['idPelanggan']; ?></td>
                            <td><?php echo $row['namaPelanggan']; ?></td>
                            <td><?php echo $row['noHP']; ?></td>
                            <td><?php echo $row['jenisKelaminCode']; ?></td>
                            <td><?php echo $row['tanggalLahir']; ?></td>
                            <td>
                                <?php echo "<a class='btn btn-sm btn-primary' href='EditPelanggan.php?idPelanggan=".$row['idPelanggan']."'>edit</a>"; ?>
                                <?php echo "<a class='btn btn-sm btn-primary' href='DeletePelanggan.php?idPelanggan=".$row['idPelanggan']."'>delete</a>"; ?>
                            </td>
                        </tr>
                        <?php $no+=1; } $data->closeCursor();
                            }else{
                                echo '
                                    <tr>
                                        <td> Not found</td>
                                    </tr>
                                ';
                            }
                            ?>
                    </table>
                </div>
            </div>
        </div>

    <script src="../assets/jquery/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>