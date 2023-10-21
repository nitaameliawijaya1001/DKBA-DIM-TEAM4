<?php
    require_once('Connection.php');
    class Penjualan extends Connection{
        private $IdPenjualan;
        private $JumlahPenjualan;
        private $HargaJual;
        private $IdPengguna;
        private $IdBarang;
        private $idPelanggan;

        // public function __construct($idPenjualan, $NamaPenjualan, $HargaJual, $IdPengguna, $IdBarang, $idPelanggan){
        //     $this->idPenjualan = $idPenjualan;
        //     $this->namaPenjualan = $NamaPenjualan;
        //     $this->hargaJual = $HargaJual;
        //     $this->idPengguna = $IdPengguna;
        //     $this->idBarang = $IdBarang;
        //     $this->idPelanggan = $idPelanggan;
        // }

        function getIdPenjualan(){ return $this->IdPenjualan; }
        function getJumlahPenjualan(){ return $this->JumlahPenjualan; }
        function getHargaJual(){ return $this->HargaJual; }
        function getIdPengguna(){ return $this->IdPengguna; }
        function getIdBarang(){ return $this->IdBarang; }
        function getidPelanggan(){ return $this->idPelanggan; }
        function setIdPenjualan($IdPenjualan){ $this->IdPenjualan = $IdPenjualan; }
        function setJumlahPenjualan($JumlahPenjualan){ $this->JumlahPenjualan = $JumlahPenjualan; }
        function setHargaJual($HargaJual){ $this->HargaJual = $HargaJual; }
        function setIdPengguna($IdPengguna){ $this->IdPengguna = $IdPengguna; }
        function setIdBarang($IdBarang){ $this->IdBarang = $IdBarang; }
        function setidPelanggan($idPelanggan){ $this->idPelanggan = $idPelanggan; }   
    }

    class CrudPenjualan extends Penjualan{
        function showData(){
            $sql ="SELECT * FROM Penjualan";
            $stmt=$this->koneksi->prepare($sql);
            $stmt->execute();
            return $stmt;
        }

        function insertData($pJumlahPenjualan, $pHargaJual, $pIdPengguna, $pIdBarang, $pidPelanggan){
            try {
                $data = new Penjualan;
                $data->setJumlahPenjualan($pJumlahPenjualan,);
                $data->setHargaJual($pHargaJual,);
                $data->setIdPengguna($pIdPengguna,);
                $data->setIdBarang($pIdBarang,);
                $data->setidPelanggan($pidPelanggan);

                $JumlahPenjualan = $data->getJumlahPenjualan();
                $HargaJual = $data->getHargaJual();
                $IdPengguna = $data->getIdPengguna();
                $IdBarang = $data->getIdBarang();
                $idPelanggan = $data->getidPelanggan();

                $sql="INSERT INTO Penjualan(JumlahPenjualan,HargaJual,IdPengguna,IdBarang,idPelanggan) VALUES (:JumlahPenjualan, :HargaJual, :IdPengguna, :IdBarang, :idPelanggan)";
                $stmt=$this->koneksi->prepare($sql);
                $stmt->bindParam(':JumlahPenjualan', $JumlahPenjualan);
                $stmt->bindParam(':HargaJual', $HargaJual);
                $stmt->bindParam(':IdPengguna', $IdPengguna);
                $stmt->bindParam(':IdBarang', $IdBarang);
                $stmt->bindParam(':idPelanggan', $idPelanggan);                
                $stmt->execute();
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        function detailData($pId){
            # GET DATA
            try{
                $sql ="SELECT IdPenjualan, JumlahPenjualan, HargaJual, IdPengguna, IdBarang, idPelanggan FROM Penjualan WHERE IdPenjualan=:IdPenjualan";
                $stmt=$this->koneksi->prepare($sql);

                $data = new Penjualan;
                $data->setIdPenjualan($pId);

                $IdPenjualan = $data->getIdPenjualan();

                $stmt->bindParam(":IdPenjualan",$IdPenjualan);
                $stmt->execute();
                $stmt->bindColumn(1, $this->IdPenjualan);
                $stmt->bindColumn(2, $this->JumlahPenjualan);
                $stmt->bindColumn(3, $this->HargaJual);
                $stmt->bindColumn(4, $this->IdPengguna);
                $stmt->bindColumn(5, $this->IdBarang);
                $stmt->bindColumn(6, $this->idPelanggan);
                $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount()==1):
                    return true;
                else:
                    return false;
                endif;
            } catch(PDOException $e) {
                echo $e->getMessage(); 
            }
        }

        function updateData($pJumlahPenjualan, $pHargaJual, $pIdPengguna, $pIdBarang, $pidPelanggan, $pIdPenjualan){
            try {
                $sql="UPDATE Penjualan SET JumlahPenjualan=:JumlahPenjualan,HargaJual=:HargaJual,IdPengguna=:IdPengguna,IdBarang=:IdBarang,idPelanggan=:idPelanggan WHERE IdPenjualan=:IdPenjualan";
                $stmt=$this->koneksi->prepare($sql);
                
                $data = new Penjualan;
                $data->setIdPenjualan($pIdPenjualan,);
                $data->setJumlahPenjualan($pJumlahPenjualan,);
                $data->setHargaJual($pHargaJual,);
                $data->setIdPengguna($pIdPengguna,);
                $data->setIdBarang($pIdBarang,);
                $data->setidPelanggan($pidPelanggan,);                

                $IdPenjualan = $data->getIdPenjualan();
                $JumlahPenjualan = $data->getJumlahPenjualan();
                $HargaJual = $data->getHargaJual();
                $IdPengguna = $data->getIdPengguna();
                $IdBarang = $data->getIdBarang();
                $idPelanggan = $data->getidPelanggan();

                $stmt->bindParam(':IdPenjualan', $IdPenjualan);
                $stmt->bindParam(':JumlahPenjualan', $JumlahPenjualan);
                $stmt->bindParam(':HargaJual', $HargaJual);
                $stmt->bindParam(':IdPengguna', $IdPengguna);
                $stmt->bindParam(':IdBarang', $IdBarang);
                $stmt->bindParam(':idPelanggan', $idPelanggan);
                $stmt->execute();
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        function delete ($pId){
            try{
                $sql="DELETE FROM Penjualan WHERE IdPenjualan=:IdPenjualan";
                $stmt=$this->koneksi->prepare($sql);
                
                $data = new Penjualan;
                $data->setIdPenjualan($pId);

                $IdPenjualan = $data->getIdPenjualan();
                
                $stmt->execute(array("IdPenjualan"=>$IdPenjualan));
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
?>