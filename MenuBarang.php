<?php 
    require_once('Connection.php');
    require_once('Barang.php');

    $obj = new CrudBarang;

    if($_SERVER['REQUEST_METHOD']=='POST'):
        $NamaBarang = $_POST['NamaBarang'];
        $Keterangan = $_POST['Keterangan'];
        $Satuan = $_POST['Satuan'];
        $IdPengguna = $_POST['IdPengguna'];
        if($obj->insertData($NamaBarang, $Keterangan, $Satuan, $IdPengguna)):
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
                        <legend>CRUD BARANG</legend>
                        <div class="card-body">
                            <div class="row">
                                <p>
                                    <label>Nama Barang :</label>
                                    <input type="text" class="form-control" name="NamaBarang"/>
                                </p>
                                <p>
                                    <label>Keterangan :</label>
                                    <input type="text" class="form-control" name="Keterangan"/>
                                </p>
                                <p>
                                    <label>Satuan :</label>
                                    <input type="text" class="form-control" name="Satuan"/>
                                </p>
                                <p>
                                    <label>IdPengguna :</label>
                                    <input type="text" class="form-control" name="IdPengguna"/>
                                </p>
                                <p>
                                    <button type="submit"> Simpan</button>
                                </p>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <h3>Tabel Barang</h3>
                <div class="row m-auto">
                    <table border="1">
                        <tr>
                            <th>No</th>
                            <th>Id Barang</th>
                            <th>Nama Barang</th>
                            <th>Keterangan</th>
                            <th>Satuan</th>
                            <th>IdPengguna</th>
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
                            <td><?php echo $row['IdBarang']; ?></td>
                            <td><?php echo $row['NamaBarang']; ?></td>
                            <td><?php echo $row['Keterangan']; ?></td>
                            <td><?php echo $row['Satuan']; ?></td>
                            <td><?php echo $row['IdPengguna']; ?></td>
                            <td><?php echo "<a class='btn btn-sm btn-primary' href='EditBarang.php?IdBarang=".$row['IdBarang']."'>edit</a>"; ?></td>
                            <td><?php echo "<a class='btn btn-sm btn-primary' href='DeleteBarang.php?IdBarang=".$row['IdBarang']."'>delete</a>"; ?></td>
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