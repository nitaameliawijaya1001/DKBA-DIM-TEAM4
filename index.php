<!-- <?php
    // require_once('ControllerHakAkses.php');

    // $controller_pegawai = new ControllerHakAkses();
    // $controller_pegawai->index();

    
?> -->

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
                <div class="row m-auto">
                    <table class="table table-bordered">
                        <tr>
                            <td><?php echo "<a class='btn btn-sm btn-primary' href='MenuHakAkses.php' >Hak Akses</a>"; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo "<a class='btn btn-sm btn-primary' href='MenuBarang.php' >Barang</a>"; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo "<a class='btn btn-sm btn-primary' href='MenuPelanggan.php' >Pelanggan</a>"; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo "<a class='btn btn-sm btn-primary' href='MenuPembelian.php' >Pembelian</a>"; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo "<a class='btn btn-sm btn-primary' href='MenuPengguna.php' >Pengguna</a>"; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo "<a class='btn btn-sm btn-primary' href='MenuPenjualan.php' >Penjualan</a>"; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    <script src="../assets/jquery/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>