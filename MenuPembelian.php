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
    </head>
    <body>
        <div class="container">
            <div class="card shadow mb-4 mt-4">
                <div class="card-header py-3">
                    <h2>Tugas Kelompok - Introduction Data and Information Management</h2>
                </div>
                <div>
                    <h4><?php echo "<a class='btn btn-sm btn-primary' href='index.php'>Home</a>"; ?></h4>
                </div>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <fieldset>
                        <legend>CRUD HAK AKSES</legend>
                        <div class="card-body">
                            <div class="row">
                                <p>
                                    <label>Jumlah Pembelian :</label>
                                    <input type="text" class="form-control" name="JumlahPembelian"/>
                                </p>
                                <p>
                                    <label>Harga Beli :</label>
                                    <input type="text" class="form-control" name="HargaBeli"/>
                                </p>
                                <p>
                                    <label>Id Pengguna :</label>
                                    <input type="text" class="form-control" name="IdPengguna"/>
                                </p>
                                <p>
                                    <label>Id Barang :</label>
                                    <input type="text" class="form-control" name="IdBarang"/>
                                </p>
                                <p>
                                    <label>Id Supplier :</label>
                                    <input type="text" class="form-control" name="idSupplier"/>
                                </p>
                                <p>
                                    <button type="submit" class="mt-4 btn btn-md btn-primary"> Simpan</button>
                                </p>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <h3>Tabel Pembelian</h3>
                <div class="row m-auto">
                    <table border="1">
                        <tr>
                            <th>No</th>
                            <th>Id Pembelian</th>
                            <th>Jumlah Pembelian</th>
                            <th>Harga Beli</th>
                            <th>Id Pengguna</th>
                            <th>Id Barang</th>
                            <th>Id Supplier</th>
                            <th colspan="3">Aksi</th>
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
                            <td><?php echo "<a class='btn btn-sm btn-primary' href='EditPembelian.php?IdPembelian=".$row['IdPembelian']."'>edit</a>"; ?></td>
                            <td><?php echo "<a class='btn btn-sm btn-primary' href='DeletePembelian.php?IdPembelian=".$row['IdPembelian']."'>delete</a>"; ?></td>
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