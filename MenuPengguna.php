<?php 
    require_once('Connection.php');
    require_once('Pengguna.php');

    $obj = new CrudPengguna;

    if($_SERVER['REQUEST_METHOD']=='POST'):
		$NamaPengguna = $_POST['NamaPengguna'];
		$Password = $_POST['Password'];
		$NamaDepan = $_POST['NamaDepan'];
		$NamaBelakang = $_POST['NamaBelakang'];
		$NoHp = $_POST['NoHp'];
        $Alamat = $_POST['Alamat'];
        $IdAkses = $_POST['IdAkses'];
        if($obj->insertData($NamaPengguna, $Password, $NamaDepan, $NamaBelakang, $NoHp, $Alamat, $IdAkses)):
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
                                    <label>Nama Pengguna :</label>
                                    <input type="text" class="form-control" name="NamaPengguna"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Password :</label>
                                    <input type="text" class="form-control" name="Password"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama Depan :</label>
                                    <input type="text" class="form-control" name="NamaDepan"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama Belakang :</label>
                                    <input type="text" class="form-control" name="NamaBelakang"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nomor HP :</label>
                                    <input type="text" class="form-control" name="NoHp"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Alamat :</label>
                                    <input type="text" class="form-control" name="Alamat"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Id Akses :</label>
                                    <input type="text" class="form-control" name="IdAkses"/>
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
                            <th>Id Pengguna</th>
                            <th>Nama Pengguna</th>
                            <th>Password</th>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Nomor HP</th>
                            <th>Alamat</th>
                            <th>Id Akses</th>
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
                            <td><?php echo $row['IdPengguna']; ?></td>
                            <td><?php echo $row['NamaPengguna']; ?></td>
                            <td><?php echo $row['Password']; ?></td>
                            <td><?php echo $row['NamaDepan']; ?></td>
                            <td><?php echo $row['NamaBelakang']; ?></td>
                            <td><?php echo $row['NoHp']; ?></td>
                            <td><?php echo $row['Alamat']; ?></td>
                            <td><?php echo $row['IdAkses']; ?></td>
                            <td>
                                <?php echo "<a class='btn btn-sm btn-primary' href='EditPengguna.php?IdPengguna=".$row['IdPengguna']."'>edit</a>"; ?>
                                <?php echo "<a class='btn btn-sm btn-primary' href='DeletePengguna.php?IdPengguna=".$row['IdPengguna']."'>delete</a>"; ?>
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