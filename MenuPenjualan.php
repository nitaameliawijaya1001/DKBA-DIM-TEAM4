<?php 
    require_once('Connection.php');
    require_once('Penjualan.php');

    $obj = new CrudPenjualan;

    if($_SERVER['REQUEST_METHOD']=='POST'):
		$JumlahPenjualan = $_POST['JumlahPenjualan'];
		$HargaJual = $_POST['HargaJual'];
		$IdPengguna = $_POST['IdPengguna'];
		$IdBarang = $_POST['IdBarang'];
		$idPelanggan = $_POST['idPelanggan'];
        if($obj->insertData($JumlahPenjualan, $HargaJual, $IdPengguna, $IdBarang, $idPelanggan)):
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
                        <legend>CRUD PENGGUNA</legend>
                        <div class="card-body">
                            <div class="row">
                                <p>
                                    <label>Jumlah Penjualan :</label>
                                    <input type="text" class="form-control" name="JumlahPenjualan"/>
                                </p>
                                <p>
                                    <label>Harga Jual :</label>
                                    <input type="text" class="form-control" name="HargaJual"/>
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
                                    <label>Id Pelanggan :</label>
                                    <input type="text" class="form-control" name="idPelanggan"/>
                                </p>
                                <p>
                                    <button type="submit" class="mt-4 btn btn-md btn-primary"> Simpan</button>
                                </p>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <h3>Tabel Penjualan</h3>
                <div class="row m-auto">
                    <table border="1">
                        <tr>
                            <th>No</th>
                            <th>Id Penjualan</th>
                            <th>Jumlah Penjualan</th>
                            <th>Harga Jual</th>
                            <th>Id Pengguna</th>
                            <th>Id Barang</th>
                            <th>Id Pelanggan</th>
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
                            <td><?php echo $row['IdPenjualan']; ?></td>
                            <td><?php echo $row['JumlahPenjualan']; ?></td>
                            <td><?php echo $row['HargaJual']; ?></td>
                            <td><?php echo $row['IdPengguna']; ?></td>
                            <td><?php echo $row['IdBarang']; ?></td>
                            <td><?php echo $row['idPelanggan']; ?></td>
                            <td><?php echo "<a class='btn btn-sm btn-primary' href='EditPenjualan.php?IdPenjualan=".$row['IdPenjualan']."'>edit</a>"; ?></td>
                            <td><?php echo "<a class='btn btn-sm btn-primary' href='DeletePenjualan.php?IdPenjualan=".$row['IdPenjualan']."'>delete</a>"; ?></td>
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

    </body>
</html>