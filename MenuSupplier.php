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
                                    <label>Nama Supplier :</label>
                                    <input type="text" class="form-control" name="namaSupplier"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Alamat :</label>
                                    <input type="text" class="form-control" name="alamat"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>noHP :</label>
                                    <input type="text" class="form-control" name="noHP"/>
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
                            <th>Id Supplier</th>
                            <th>Nama Supplier</th>
                            <th>Alamat</th>
                            <th>Nomor HP</th>
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
                            <td><?php echo $row['idSupplier']; ?></td>
                            <td><?php echo $row['namaSupplier']; ?></td>
                            <td><?php echo $row['alamat']; ?></td>
                            <td><?php echo $row['noHP']; ?></td>
                            <td>
                                <?php echo "<a class='btn btn-sm btn-primary' href='EditSupplier.php?idSupplier=".$row['idSupplier']."'>edit</a>"; ?>
                                <?php echo "<a class='btn btn-sm btn-primary' href='DeleteSupplier.php?idSupplier=".$row['idSupplier']."'>delete</a>"; ?>
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