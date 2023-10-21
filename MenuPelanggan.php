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
                        <legend>CRUD PELANGGAN</legend>
                        <div class="card-body">
                            <div class="row">
                                <p>
                                    <label>Nama Pelanggan :</label>
                                    <input type="text" class="form-control" name="namaPelanggan"/>
                                </p>
                                <p>
                                    <label>Alamat :</label>
                                    <input type="text" class="form-control" name="alamatPelanggan"/>
                                </p>
                                <p>
                                    <label>Nomor HP :</label>
                                    <input type="text" class="form-control" name="noHP"/>
                                </p>
                                <p>
                                    <label>Jenis Kelamin :</label>
                                    <input type="text" class="form-control" name="jenisKelaminCode"/>
                                </p>
                                <p>
                                    <label>Tanggal Lahir :</label>
                                    <input type="text" class="form-control" name="tanggalLahir"/>
                                </p>
                                <p>
                                   <button type="submit" class="mt-4 btn btn-md btn-primary"> Simpan</button>
                                </p>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <h3>Tabel Pelanggan</h3>
                <div class="row m-auto">
                    <table border="1">
                        <tr>
                            <th>No</th>
                            <th>Id Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Nomor HP</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
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
                            <td><?php echo $row['idPelanggan']; ?></td>
                            <td><?php echo $row['namaPelanggan']; ?></td>
                            <td><?php echo $row['noHP']; ?></td>
                            <td><?php echo $row['jenisKelaminCode']; ?></td>
                            <td><?php echo $row['tanggalLahir']; ?></td>
                            <td><?php echo "<a class='btn btn-sm btn-primary' href='EditPelanggan.php?idPelanggan=".$row['idPelanggan']."'>edit</a>"; ?></td>
                            <td><?php echo "<a class='btn btn-sm btn-primary' href='DeletePelanggan.php?idPelanggan=".$row['idPelanggan']."'>delete</a>"; ?></td>
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