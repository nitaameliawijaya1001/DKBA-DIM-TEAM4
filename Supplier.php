<?php 
    require_once('Connection.php');
    class Supplier extends Connection {
        private $idSupplier;
        private $namaSupplier;
        private $alamat;
        private $noHP;

        // public function __construct($idSupplier, $NamaSupplier, $AlamatSupplier, $NoHP, $JenisKelaminCode, $TanggalLahir){
        //     $this->idSupplier = $idSupplier;
        //     $this->namaSupplier = $namaSupplier;
        //     $this->alamat = $alamat;
        //     $this->noHP = $NoHP;
        // }

        function getidSupplier(){ return $this->idSupplier; }
        function getnamaSupplier(){ return $this->namaSupplier; }
        function getalamat(){ return $this->alamat; }
        function getnoHP(){ return $this->noHP; }
        function setidSupplier($idSupplier){ $this->idSupplier = $idSupplier; }
        function setnamaSupplier($namaSupplier){ $this->namaSupplier = $namaSupplier; }
        function setalamat($alamat){ $this->alamat = $alamat; }
        function setnoHP($noHP){ $this->noHP = $noHP; }
    }

    class CrudSupplier extends Supplier{
        function showData(){
            $sql ="SELECT * FROM Supplier";
            $stmt=$this->koneksi->prepare($sql);
            $stmt->execute();
            return $stmt;
        }

        function insertData($pnamaSupplier, $palamat, $pnoHP){
            try {
                $data = new Supplier;
                $data->setnamaSupplier($pnamaSupplier,);
                $data->setalamat($palamat,);
                $data->setnoHP($pnoHP,);                

                $namaSupplier = $data->getnamaSupplier();
                $alamat = $data->getalamat();
                $noHP = $data->getnoHP();                

                $sql="INSERT INTO Supplier(namaSupplier,alamat,noHP) VALUES (:namaSupplier, :alamat, :noHP)";
                $stmt=$this->koneksi->prepare($sql);
                $stmt->bindParam(':namaSupplier', $namaSupplier);
                $stmt->bindParam(':alamat', $alamat);
                $stmt->bindParam(':noHP', $noHP);                
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
                $sql ="SELECT idSupplier, namaSupplier, alamat, noHP FROM supplier  WHERE idSupplier=:idSupplier";
                $stmt=$this->koneksi->prepare($sql);

                $data = new Supplier;
                $data->setidSupplier($pId);

                $idSupplier = $data->getidSupplier();

                $stmt->bindParam(":idSupplier",$idSupplier);
                $stmt->execute();
                $stmt->bindColumn(1, $this->idSupplier);
                $stmt->bindColumn(2, $this->namaSupplier);
                $stmt->bindColumn(3, $this->alamat);
                $stmt->bindColumn(4, $this->noHP);
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

        function updateData($pnamaSupplier, $palamat, $pnoHP, $pidSupplier){
            try {
                $sql="UPDATE Supplier SET namaSupplier=:namaSupplier,alamat=:alamat,noHP=:noHP WHERE idSupplier=:idSupplier";
                $stmt=$this->koneksi->prepare($sql);
                
                $data = new Supplier;
                $data->setidSupplier($pidSupplier,);
                $data->setnamaSupplier($pnamaSupplier,);
                $data->setalamat($palamat,);
                $data->setnoHP($pnoHP,);                

                $idSupplier = $data->getidSupplier();
                $namaSupplier = $data->getnamaSupplier();
                $alamat = $data->getalamat();
                $noHP = $data->getnoHP();  

                $stmt->bindParam(':idSupplier', $idSupplier);
                $stmt->bindParam(':namaSupplier', $namaSupplier);
                $stmt->bindParam(':alamat', $alamat);
                $stmt->bindParam(':noHP', $noHP);
                $stmt->execute();
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        function delete ($pId){
            try{
                $sql="DELETE FROM Supplier WHERE idSupplier=:idSupplier";
                $stmt=$this->koneksi->prepare($sql);
                
                $data = new Supplier;
                $data->setidSupplier($pId);

                $idSupplier = $data->getidSupplier();
                
                $stmt->execute(array("idSupplier"=>$idSupplier));
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
?>