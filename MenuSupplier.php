<?php 
    require_once('Connection.php');
    require_once('Supplier.php');

    $obj = new CrudSupplier;

    if($_SERVER['REQUEST_METHOD']=='POST'):
        $namaSupplier = $_POST['namaSupplier'];
        $alamat = $_POST['alamat'];
        $noHP = $_POST['noHP'];
        if($obj->insertData($namaSupplier, $alamat, $noHP)):
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
                                    <label>Nama Supplier :</label>
                                    <input type="text" class="form-control" name="namaSupplier"/>
                                </p>
                                <p>
                                    <label>Alamat :</label>
                                    <input type="text" class="form-control" name="alamat"/>
                                </p>
                                <p>
                                    <label>noHP :</label>
                                    <input type="text" class="form-control" name="noHP"/>
                                </p>
                                <p>
                                    <button type="submit" class="mt-4 btn btn-md btn-primary"> Simpan</button>
                                </p>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <h3>Tabel Supplier</h3>
                <div class="row m-auto">
                    <table border="1">
                        <tr>
                            <th>No</th>
                            <th>Id Supplier</th>
                            <th>Nama Supplier</th>
                            <th>Alamat</th>
                            <th>Nomor HP</th>
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
                            <td><?php echo $row['idSupplier']; ?></td>
                            <td><?php echo $row['namaSupplier']; ?></td>
                            <td><?php echo $row['alamat']; ?></td>
                            <td><?php echo $row['noHP']; ?></td>
                            <td><?php echo "<a class='btn btn-sm btn-primary' href='EditSupplier.php?idSupplier=".$row['idSupplier']."'>edit</a>"; ?></td>
                            <td><?php echo "<a class='btn btn-sm btn-primary' href='DeleteSupplier.php?idSupplier=".$row['idSupplier']."'>delete</a>"; ?></td>
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