<?php
    class Pembelian {
        private $IdPembelian;
        private $JumlahPembelian;
        private $HargaBeli;
        private $IdPengguna;
        private $IdBarang;
        private $IdSupplier;

        // public function __construct($idPembelian, $NamaPembelian, $HargaBeli, $IdPengguna, $IdBarang, $IdSupplier){
        //     $this->idPembelian = $idPembelian;
        //     $this->namaPembelian = $NamaPembelian;
        //     $this->hargaBeli = $HargaBeli;
        //     $this->idPengguna = $IdPengguna;
        //     $this->idBarang = $IdBarang;
        //     $this->idSupplier = $IdSupplier;
        // }

        function getIdPembelian(){ return $this->IdPembelian; }
        function getJumlahPembelian(){ return $this->JumlahPembelian; }
        function getHargaBeli(){ return $this->HargaBeli; }
        function getIdPengguna(){ return $this->IdPengguna; }
        function getIdBarang(){ return $this->IdBarang; }
        function getIdSupplier(){ return $this->IdSupplier; }
        function setIdPembelian($IdPembelian){ $this->IdPembelian = $IdPembelian; }
        function setJumlahPembelian($JumlahPembelian){ $this->JumlahPembelian = $JumlahPembelian; }
        function setHargaBeli($HargaBeli){ $this->HargaBeli = $HargaBeli; }
        function setIdPengguna($IdPengguna){ $this->IdPengguna = $IdPengguna; }
        function setIdBarang($IdBarang){ $this->IdBarang = $IdBarang; }
        function setIdSupplier($IdSupplier){ $this->IdSupplier = $IdSupplier; }
    }

    class CrudPembelian extends Pembelian{
        function showData(){
            $sql ="SELECT * FROM Pemblian";
            $stmt=$this->koneksi->prepare($sql);
            $stmt->execute();
            return $stmt;
        }

        function insertData($pJumlahPembelian, $pHargaBeli, $pIdPengguna, $pIdBarang, $pIdSupplier){
            try {
                $data = new Pembelian;
                $data->setJumlahPembelian($pJumlahPembelian,);
                $data->setHargaBeli($pHargaBeli,);
                $data->setIdPengguna($pIdPengguna,);
                $data->setIdBarang($pIdBarang,);
                $data->setIdSupplier($pIdSupplier,);

                $JumlahPembelian = $data->getJumlahPembelian();
                $HargaBeli = $data->getHargaBeli();
                $IdPengguna = $data->getIdPengguna();
                $IdBarang = $data->getIdBarang();
                $IdSupplier = $data->getIdSupplier();

                $sql="INSERT INTO Pembelian(JumlahPembelian,HargaBeli,IdPengguna,IdBarang,IdSupplier) VALUES (:JumlahPembelian, :HargaBeli, :IdPengguna, :IdBarang, :IdSupplier)";
                $stmt=$this->koneksi->prepare($sql);
                $stmt->bindParam(':JumlahPembelian', $JumlahPembelian);
                $stmt->bindParam(':HargaBeli', $HargaBeli);
                $stmt->bindParam(':IdPengguna', $IdPengguna);
                $stmt->bindParam(':IdBarang', $IdBarang);
                $stmt->bindParam(':IdSupplier', $IdSupplier);                
                $stmt->execute();
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        function detailData($pIdPembelian){
            # GET DATA
            try{
                $sql ="SELECT IdPembelian, JumlahPembelian, HargaBeli, IdPengguna, IdBarang, idSupplier FROM pembelian WHERE IdPembelian=:IdPembelian";
                $stmt=$this->koneksi->prepare($sql);

                $data = new Pembelian;
                $data->setIdPembelian($pIdPembelian);

                $IdBarang = $data->getIdBarang();

                $stmt->bindParam(":IdBarang",$IdBarang);
                $stmt->execute();
                $stmt->bindParam(1, $this->IdPembelian);
                $stmt->bindParam(2, $this->JumlahPembelian);
                $stmt->bindParam(3, $this->HargaBeli);
                $stmt->bindParam(4, $this->IdPengguna);
                $stmt->bindParam(5, $this->IdBarang);
                $stmt->bindParam(6, $this->IdSupplier);
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

        function updateData($pJumlahPembelian, $pHargaBeli, $pIdPengguna, $pIdBarang, $pIdSupplier, $pIdPembelian){
            try {
                
                $sql="UPDATE Pembelian SET JumlahPembelian=:JumlahPembelian,HargaBeli=:HargaBeli,IdPengguna=:IdPengguna,IdBarang=:IdBarang,IdSupplier=:'IdSupplier WHERE IdPembelian=:IdPembelian";
                $stmt=$this->koneksi->prepare($sql);
                
                $data = new Pembelian;
                $data->setIdPembelian($pIdPembelian,);
                $data->setJumlahPembelian($pJumlahPembelian);
                $data->setHargaBeli($pHargaBeli,);
                $data->setIdPengguna($pIdPengguna,);
                $data->setIdBarang($pIdBarang,);
                $data->setIdSupplier($pIdSupplier,);

                $IdPembelian = $data->getIdPembelian();
                $JumlahPembelian = $data->getJumlahPembelian();
                $HargaBeli = $data->getHargaBeli();
                $IdPengguna = $data->getIdPengguna();
                $IdBarang = $data->getIdBarang();
                $IdSupplier = $data->getIdSupplier();

                $stmt->bindParam(':IdPembelian', $IdPembelian);
                $stmt->bindParam(':JumlahPembelian', $JumlahPembelian);
                $stmt->bindParam(':HargaBeli', $HargaBeli);
                $stmt->bindParam(':IdPengguna', $IdPengguna);
                $stmt->bindParam(':IdBarang', $IdBarang);
                $stmt->bindParam(':IdSupplier', $IdSupplier);
                $stmt->execute();
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        function delete ($pId){
            try{
                $sql="DELETE FROM Pembeli WHERE IdPembelian=:IdPembelian";
                $stmt=$this->koneksi->prepare($sql);
                
                $data = new Pembelian;
                $data->setIdPembelian($pId);

                $IdBarang = $data->getIdPembelian();
                
                $stmt->execute(array("IdPembelian"=>$pId));
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
?>