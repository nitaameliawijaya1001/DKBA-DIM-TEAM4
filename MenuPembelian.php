<?php 
    require_once('Connection.php');
    require_once('Pembelian.php');

    $obj = new CrudPembelian;

    if($_SERVER['REQUEST_METHOD']=='POST'):
		$JumlahPembelian = $_POST['JumlahPembelian'];
		$HargaBeli = $_POST['HargaBeli'];
		$IdPengguna = $_POST['IdPengguna'];
		$IdBarang = $_POST['IdBarang'];
		$idSupplier = $_POST['idSupplier'];
        if($obj->insertData($JumlahPembelian, $HargaBeli, $IdPengguna, $IdBarang, $idSupplier)):
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
                        <h3 class="m-0 font-weight-bold text-primary">Tugas Kelompok - Introduction Data and Information Management</h3>
                    </div>
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-primary"><?php echo "<a class='btn btn-sm btn-primary' href='index.php'>Home</a>"; ?></h3>
                    </div>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jumlah Pembelian :</label>
                                    <input type="text" class="form-control" name="JumlahPembelian"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Harga Beli :</label>
                                    <input type="text" class="form-control" name="HargaBeli"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Id Pengguna :</label>
                                    <input type="text" class="form-control" name="IdPengguna"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Id Barang :</label>
                                    <input type="text" class="form-control" name="IdBarang"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Id Supplier :</label>
                                    <input type="text" class="form-control" name="idSupplier"/>
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
                            <th>Id Pembelian</th>
                            <th>Jumlah Pembelian</th>
                            <th>Harga Beli</th>
                            <th>Id Pengguna</th>
                            <th>Id Barang</th>
                            <th>Id Supplier</th>
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
                            <td><?php echo $row['IdPembelian']; ?></td>
                            <td><?php echo $row['JumlahPembelian']; ?></td>
                            <td><?php echo $row['HargaBeli']; ?></td>
                            <td><?php echo $row['IdPengguna']; ?></td>
                            <td><?php echo $row['IdBarang']; ?></td>
                            <td><?php echo $row['idSupplier']; ?></td>
                            <td>
                                <?php echo "<a class='btn btn-sm btn-primary' href='EditPembelian.php?IdPembelian=".$row['IdPembelian']."'>edit</a>"; ?>
                                <?php echo "<a class='btn btn-sm btn-primary' href='DeletePembelian.php?IdPembelian=".$row['IdPembelian']."'>delete</a>"; ?>
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