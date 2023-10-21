<?php

    require_once('Connection.php');

    class Barang extends Connection {
        private $IdBarang;
        private $NamaBarang;
        private $Keterangan;
        private $Satuan;
        private $IdPengguna;

        // function __construct($idBarang, $NamaBarang, $Keterangan, $Satuan, $idPengguna){
        //     $this->idBarang = $idBarang;
        //     $this->namaBarang = $NamaBarang;
        //     $this->keterangan = $Keterangan; 
        //     $this->satuan = $Satuan;
        //     $this->idPengguna = $idPengguna;  
        // }

        function getIdBarang(){
            return $this->IdBarang;
        }

        function getNamaBarang(){
            return $this->NamaBarang;
        }

        function getKeterangan(){
            return $this->Keterangan;
        }

        function getSatuan(){
            return $this->Satuan;
        }
        
        function getIdPengguna(){
            return $this->IdPengguna;
        }

        function setIdBarang($IdBarang){
            $this->IdBarang = $IdBarang;
        }

        function setNamaBarang($NamaBarang){
            $this->NamaBarang = $NamaBarang;
        }

        function setKeterangan($Keterangan){
            $this->Keterangan = $Keterangan;
        }

        function setSatuan($Satuan){
            $this->Satuan = $Satuan;
        }

        function setIdPengguna($IdPengguna){
            $this->IdPengguna = $IdPengguna;
        }
    }

    class CrudBarang extends Barang{
        function showData(){
            $sql ="SELECT * FROM Barang";
            $stmt=$this->koneksi->prepare($sql);
            $stmt->execute();
            return $stmt;
        }

        function insertData($pNama, $pKet, $pSatuan, $pIdPgn){
            try {
                $data = new Barang;
                $data->setNamaBarang($pNama);
                $data->setKeterangan($pKet);
                $data->setSatuan($pSatuan);
                $data->setIdPengguna($pIdPgn);

                $NamaBarang = $data->getNamaBarang();
                $Keterangan = $data->getKeterangan();
                $Satuan = $data->getSatuan();
                $IdPengguna = $data->getIdPengguna();

                $sql="INSERT INTO Barang(NamaBarang, Keterangan, Satuan, IdPengguna) VALUES (:NamaBarang, :Keterangan, :Satuan, :IdPengguna)";
                $stmt=$this->koneksi->prepare($sql);
                    $stmt->bindParam(":NamaBarang", $NamaBarang);
                    $stmt->bindParam(":Keterangan", $Keterangan);
                    $stmt->bindParam(":Satuan", $Satuan);
                    $stmt->bindParam(":IdPengguna", $IdPengguna);
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
                $sql ="SELECT IdBarang, NamaBarang, Keterangan, Satuan, IdPengguna FROM Barang WHERE IdBarang=:IdBarang";
                $stmt=$this->koneksi->prepare($sql);

                $data = new Barang;
                $data->setIdBarang($pId);

                $IdBarang = $data->getIdBarang();

                $stmt->bindParam(":IdBarang",$IdBarang);
                $stmt->execute();
                $stmt->bindColumn(1, $this->IdBarang);
                $stmt->bindColumn(2, $this->NamaBarang);
                $stmt->bindColumn(3, $this->Keterangan);
                $stmt->bindColumn(4, $this->Satuan);
                $stmt->bindColumn(5, $this->IdPengguna);
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

        function updateData($pNama, $pKet, $pSatuan, $pIdPgn, $pId){
            try {
                $sql="UPDATE Barang SET NamaBarang=:NamaBarang, Keterangan=:Keterangan, Satuan=:Satuan, IdPengguna=:IdPengguna WHERE IdBarang=:IdBarang";
                $stmt=$this->koneksi->prepare($sql);
                
                $data = new Barang;
                $data->setIdBarang($pId);
                $data->setNamaBarang($pNama);
                $data->setKeterangan($pKet);
                $data->setSatuan($pSatuan);
                $data->setIdPengguna($pIdPgn);

                $IdBarang = $data->getIdBarang();
                $NamaBarang = $data->getNamaBarang();
                $Keterangan = $data->getKeterangan();
                $Satuan = $data->getSatuan();
                $IdPengguna = $data->getIdPengguna();

                $stmt->bindParam(":IdBarang",$IdBarang);
                $stmt->bindParam(":NamaBarang",$NamaBarang);
                $stmt->bindParam(":Keterangan",$Keterangan);
                $stmt->bindParam(":Satuan",$Satuan);
                $stmt->bindParam(":IdPengguna",$IdPengguna);
                $stmt->execute();
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        function delete ($pId){
            try{
                $sql="DELETE FROM Barang WHERE IdBarang=:IdBarang";
                $stmt=$this->koneksi->prepare($sql);
                
                $data = new Barang;
                $data->setIdBarang($pId);

                $IdBarang = $data->getIdBarang();
                
                $stmt->execute(array("IdBarang"=>$IdBarang));
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
?>