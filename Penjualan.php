<?php
    require_once('Connection.php');
    class Penjualan {
        private $IdPenjualan;
        private $JumlahPenjualan;
        private $HargaJual;
        private $IdPengguna;
        private $IdBarang;
        private $IdPelanggan;

        // public function __construct($idPenjualan, $NamaPenjualan, $HargaJual, $IdPengguna, $IdBarang, $IdPelanggan){
        //     $this->idPenjualan = $idPenjualan;
        //     $this->namaPenjualan = $NamaPenjualan;
        //     $this->hargaJual = $HargaJual;
        //     $this->idPengguna = $IdPengguna;
        //     $this->idBarang = $IdBarang;
        //     $this->idPelanggan = $IdPelanggan;
        // }

        function getIdPenjualan(){ return $this->IdPenjualan; }
        function getJumlahPenjualan(){ return $this->JumlahPenjualan; }
        function getHargaJual(){ return $this->HargaJual; }
        function getIdPengguna(){ return $this->IdPengguna; }
        function getIdBarang(){ return $this->IdBarang; }
        function getIdPelanggan(){ return $this->IdPelanggan; }
        function setIdPenjualan($IdPenjualan){ $this->IdPenjualan = $IdPenjualan; }
        function setJumlahPenjualan($JumlahPenjualan){ $this->JumlahPenjualan = $JumlahPenjualan; }
        function setHargaJual($HargaJual){ $this->HargaJual = $HargaJual; }
        function setIdPengguna($IdPengguna){ $this->IdPengguna = $IdPengguna; }
        function setIdBarang($IdBarang){ $this->IdBarang = $IdBarang; }
        function setIdPelanggan($IdPelanggan){ $this->IdPelanggan = $IdPelanggan; }   
    }

    class CrudPenjualan extends Penjualan{
        function showData(){
            $sql ="SELECT * FROM Penjualan";
            $stmt=$this->koneksi->prepare($sql);
            $stmt->execute();
            return $stmt;
        }

        function insertData($pJumlahPenjualan, $pHargaJual, $pIdPengguna, $pIdBarang, $pIdPelanggan){
            try {
                $data = new Penjualan;
                $data->setJumlahPenjualan($pJumlahPenjualan,);
                $data->setHargaJual($pHargaJual,);
                $data->setIdPengguna($pIdPengguna,);
                $data->setIdBarang($pIdBarang,);
                $data->setIdPelanggan($pIdPelanggan,);

                $JumlahPenjualan = $data->getJumlahPenjualan();
                $HargaJual = $data->getHargaJual();
                $IdPengguna = $data->getIdPengguna();
                $IdBarang = $data->getIdBarang();
                $IdPelanggan = $data->getIdPelanggan();

                $sql="INSERT INTO Penjualan(JumlahPenjualan,HargaJual,IdPengguna,IdBarang,IdPelanggan) VALUES (:JumlahPenjualan, :HargaJual, :IdPengguna, :IdBarang, :IdPelanggan)";
                $stmt=$this->koneksi->prepare($sql);
                $stmt->bindParam(':JumlahPenjualan', $JumlahPenjualan);
                $stmt->bindParam(':HargaJual', $HargaJual);
                $stmt->bindParam(':IdPengguna', $IdPengguna);
                $stmt->bindParam(':IdBarang', $IdBarang);
                $stmt->bindParam(':IdPelanggan', $IdPelanggan);                
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
                $stmt->bindParam(1, $this->IdPenjualan);
                $stmt->bindParam(2, $this->JumlahPenjualan);
                $stmt->bindParam(3, $this->HargaJual);
                $stmt->bindParam(4, $this->IdPengguna);
                $stmt->bindParam(5, $this->IdBarang);
                $stmt->bindParam(6, $this->IdPelanggan);
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

        function updateData($pJumlahPenjualan, $pHargaJual, $pIdPengguna, $pIdBarang, $pIdPelanggan, $pIdPenjualan){
            try {
                $sql="UPDATE Penjualan SET JumlahPenjualan=:JumlahPenjualan,HargaJual=:HargaJual,IdPengguna=:IdPengguna,IdBarang=:IdBarang,IdPelanggan=:IdPelanggan WHERE IdPenjualan=:IdPenjualan";
                $stmt=$this->koneksi->prepare($sql);
                
                $data = new Penjualan;
                $data->setIdPenjualan($pIdPenjualan,);
                $data->setJumlahPenjualan($pJumlahPenjualan,);
                $data->setHargaJual($pHargaJual,);
                $data->setIdPengguna($pIdPengguna,);
                $data->setIdBarang($pIdBarang,);
                $data->setIdPelanggan($pIdPelanggan,);                

                $IdPenjualan = $data->getIdPenjualan();
                $JumlahPenjualan = $data->getJumlahPenjualan();
                $HargaJual = $data->getHargaJual();
                $IdPengguna = $data->getIdPengguna();
                $IdBarang = $data->getIdBarang();
                $IdPelanggan = $data->getIdPelanggan();

                $stmt->bindParam(':IdPenjualan', $IdPenjualan);
                $stmt->bindParam(':JumlahPenjualan', $JumlahPenjualan);
                $stmt->bindParam(':HargaJual', $HargaJual);
                $stmt->bindParam(':IdPengguna', $IdPengguna);
                $stmt->bindParam(':IdBarang', $IdBarang);
                $stmt->bindParam(':IdPelanggan', $IdPelanggan);
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