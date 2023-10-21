<?php
    require_once('Connection.php');
    class Pembelian extends Connection{
        private $IdPembelian;
        private $JumlahPembelian;
        private $HargaBeli;
        private $IdPengguna;
        private $IdBarang;
        private $idSupplier;

        // public function __construct($idPembelian, $NamaPembelian, $HargaBeli, $IdPengguna, $IdBarang, $idSupplier){
        //     $this->idPembelian = $idPembelian;
        //     $this->namaPembelian = $NamaPembelian;
        //     $this->hargaBeli = $HargaBeli;
        //     $this->idPengguna = $IdPengguna;
        //     $this->idBarang = $IdBarang;
        //     $this->idSupplier = $idSupplier;
        // }

        function getIdPembelian(){ return $this->IdPembelian; }
        function getJumlahPembelian(){ return $this->JumlahPembelian; }
        function getHargaBeli(){ return $this->HargaBeli; }
        function getIdPengguna(){ return $this->IdPengguna; }
        function getIdBarang(){ return $this->IdBarang; }
        function getidSupplier(){ return $this->idSupplier; }
        function setIdPembelian($IdPembelian){ $this->IdPembelian = $IdPembelian; }
        function setJumlahPembelian($JumlahPembelian){ $this->JumlahPembelian = $JumlahPembelian; }
        function setHargaBeli($HargaBeli){ $this->HargaBeli = $HargaBeli; }
        function setIdPengguna($IdPengguna){ $this->IdPengguna = $IdPengguna; }
        function setIdBarang($IdBarang){ $this->IdBarang = $IdBarang; }
        function setidSupplier($idSupplier){ $this->idSupplier = $idSupplier; }
    }

    class CrudPembelian extends Pembelian{
        function showData(){
            $sql ="SELECT * FROM Pembelian";
            $stmt=$this->koneksi->prepare($sql);
            $stmt->execute();
            return $stmt;
        }

        function insertData($pJumlahPembelian, $pHargaBeli, $pIdPengguna, $pIdBarang, $pidSupplier){
            try {
                $data = new Pembelian;
                $data->setJumlahPembelian($pJumlahPembelian,);
                $data->setHargaBeli($pHargaBeli,);
                $data->setIdPengguna($pIdPengguna,);
                $data->setIdBarang($pIdBarang,);
                $data->setidSupplier($pidSupplier,);

                $JumlahPembelian = $data->getJumlahPembelian();
                $HargaBeli = $data->getHargaBeli();
                $IdPengguna = $data->getIdPengguna();
                $IdBarang = $data->getIdBarang();
                $idSupplier = $data->getidSupplier();

                $sql="INSERT INTO Pembelian(JumlahPembelian,HargaBeli,IdPengguna,IdBarang,idSupplier) VALUES (:JumlahPembelian, :HargaBeli, :IdPengguna, :IdBarang, :idSupplier)";
                $stmt=$this->koneksi->prepare($sql);
                $stmt->bindParam(':JumlahPembelian', $JumlahPembelian);
                $stmt->bindParam(':HargaBeli', $HargaBeli);
                $stmt->bindParam(':IdPengguna', $IdPengguna);
                $stmt->bindParam(':IdBarang', $IdBarang);
                $stmt->bindParam(':idSupplier', $idSupplier);                
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
                $sql ="SELECT IdPembelian, JumlahPembelian, HargaBeli, IdPengguna, IdBarang, idSupplier FROM Pembelian WHERE IdPembelian=:IdPembelian";
                $stmt=$this->koneksi->prepare($sql);

                $data = new Pembelian;
                $data->setIdPembelian($pId);

                $IdPembelian = $data->getIdPembelian();

                $stmt->bindParam(":IdPembelian",$IdPembelian);
                $stmt->execute();
                $stmt->bindColumn(1, $this->IdPembelian);
                $stmt->bindColumn(2, $this->JumlahPembelian);
                $stmt->bindColumn(3, $this->HargaBeli);
                $stmt->bindColumn(4, $this->IdPengguna);
                $stmt->bindColumn(5, $this->IdBarang);
                $stmt->bindColumn(6, $this->idSupplier);
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

        function updateData($pJumlahPembelian, $pHargaBeli, $pIdPengguna, $pIdBarang, $pidSupplier, $pIdPembelian){
            try {
                
                $sql="UPDATE Pembelian SET JumlahPembelian=:JumlahPembelian,HargaBeli=:HargaBeli,IdPengguna=:IdPengguna,IdBarang=:IdBarang,idSupplier=:idSupplier WHERE IdPembelian=:IdPembelian";
                $stmt=$this->koneksi->prepare($sql);
                
                $data = new Pembelian;
                $data->setIdPembelian($pIdPembelian,);
                $data->setJumlahPembelian($pJumlahPembelian);
                $data->setHargaBeli($pHargaBeli,);
                $data->setIdPengguna($pIdPengguna,);
                $data->setIdBarang($pIdBarang,);
                $data->setidSupplier($pidSupplier,);

                $IdPembelian = $data->getIdPembelian();
                $JumlahPembelian = $data->getJumlahPembelian();
                $HargaBeli = $data->getHargaBeli();
                $IdPengguna = $data->getIdPengguna();
                $IdBarang = $data->getIdBarang();
                $idSupplier = $data->getidSupplier();

                $stmt->bindParam(':IdPembelian', $IdPembelian);
                $stmt->bindParam(':JumlahPembelian', $JumlahPembelian);
                $stmt->bindParam(':HargaBeli', $HargaBeli);
                $stmt->bindParam(':IdPengguna', $IdPengguna);
                $stmt->bindParam(':IdBarang', $IdBarang);
                $stmt->bindParam(':idSupplier', $idSupplier);
                $stmt->execute();
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        function delete ($pId){
            try{
                $sql="DELETE FROM Pembelian WHERE IdPembelian=:IdPembelian";
                $stmt=$this->koneksi->prepare($sql);
                
                $data = new Pembelian;
                $data->setIdPembelian($pId);

                $IdPembelian = $data->getIdPembelian();
                
                $stmt->execute(array("IdPembelian"=>$IdPembelian));
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
?>