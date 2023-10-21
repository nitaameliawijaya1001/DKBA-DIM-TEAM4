<?php 
    require_once('Connection.php');
    require_once('HakAkses.php');

    $obj = new CrudHakAkses;

    if($_SERVER['REQUEST_METHOD']=='POST'):
        $NamaAkses = $_POST['NamaAkses'];
        $Keterangan = $_POST['Keterangan'];
        if($obj->insertData($NamaAkses, $Keterangan)):
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
                                <label>Nama Akses :</label>
                                <input type="text" class="form-control" name="NamaAkses"/>
                            </p>
                            <p>
                                <label>Keterangan :</label>
                                <input type="text" class="form-control" name="Keterangan"/>
                            </p>
                            <p>
                                <button type="submit" class="mt-4 btn btn-md btn-primary"> Simpan</button>
                            </p>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <h3>Tabel Hak Akses</h3>
                <div class="row m-auto">
                    <table border="1">
                        <tr>
                            <th>No</th>
                            <th>Id Akses</th>
                            <th>Nama Akses</th>
                            <th>Keterangan</th>
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
                            <td><?php echo $row['IdAkses']; ?></td>
                            <td><?php echo $row['NamaAkses']; ?></td>
                            <td><?php echo $row['Keterangan']; ?></td>
                            <td><?php echo "<a class='btn btn-sm btn-primary' href='EditHakAkses.php?IdAkses=".$row['IdAkses']."'>edit</a>"; ?></td>
                            <td><?php echo "<a class='btn btn-sm btn-primary' href='DeleteHakAkses.php?IdAkses=".$row['IdAkses']."'>delete</a>"; ?></td>
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