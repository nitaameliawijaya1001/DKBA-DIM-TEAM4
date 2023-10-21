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
                                    <label>Nama Pengguna :</label>
                                    <input type="text" class="form-control" name="NamaPengguna"/>
                                </p>
                                <p>
                                    <label>Password :</label>
                                    <input type="text" class="form-control" name="Password"/>
                                </p>
                                <p>
                                    <label>Nama Depan :</label>
                                    <input type="text" class="form-control" name="NamaDepan"/>
                                </p>
                                <p>
                                    <label>Nama Belakang :</label>
                                    <input type="text" class="form-control" name="NamaBelakang"/>
                                </p>
                                <p>
                                    <label>Nomor HP :</label>
                                    <input type="text" class="form-control" name="NoHp"/>
                                </p>
                                <p>
                                    <label>Alamat :</label>
                                    <input type="text" class="form-control" name="Alamat"/>
                                </p>
                                <p>
                                    <label>Id Akses :</label>
                                    <input type="text" class="form-control" name="IdAkses"/>
                                </p>
                                <p>
                                    <button type="submit" class="mt-4 btn btn-md btn-primary"> Simpan</button>
                                </p>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <h3>Tabel Pengguna</h3>
                <div class="row m-auto">
                    <table border="1">
                        <tr>
                            <th>No</th>
                            <th>Id Pengguna</th>
                            <th>Nama Pengguna</th>
                            <th>Password</th>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Nomor HP</th>
                            <th>Alamat</th>
                            <th>Id Akses</th>
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
                            <td><?php echo $row['IdPengguna']; ?></td>
                            <td><?php echo $row['NamaPengguna']; ?></td>
                            <td><?php echo $row['Password']; ?></td>
                            <td><?php echo $row['NamaDepan']; ?></td>
                            <td><?php echo $row['NamaBelakang']; ?></td>
                            <td><?php echo $row['NoHp']; ?></td>
                            <td><?php echo $row['Alamat']; ?></td>
                            <td><?php echo $row['IdAkses']; ?></td>
                            <td><?php echo "<a class='btn btn-sm btn-primary' href='EditPengguna.php?IdPengguna=".$row['IdPengguna']."'>edit</a>"; ?></td>
                            <td><?php echo "<a class='btn btn-sm btn-primary' href='DeletePengguna.php?IdPengguna=".$row['IdPengguna']."'>delete</a>"; ?></td>
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