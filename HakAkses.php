<?php

    require_once('Connection.php');

    class HakAkses extends Connection {

        private $IdAkses;
        private $NamaAkses;
        private $Keterangan;

        // function __construct($IdAkses, $NamaAkses, $Keterangan){
        //     $this->IdAkses = $IdAkses;
        //     $this->NamaAkses = $NamaAkses;
        //     $this->Keterangan = $Keterangan; 
        // }

        function getIdAkses(){
            return $this->IdAkses;
        }

        function getNamaAkses(){
            return $this->NamaAkses;
        }

        function getKeterangan(){
            return $this->Keterangan;
        }

        function setIdAkses($IdAkses){
            $this->IdAkses = $IdAkses;
        }

        function setNamaAkses($NamaAkses){
            $this->NamaAkses = $NamaAkses;
        }

        function setKeterangan($Keterangan){
            $this->Keterangan = $Keterangan;
        }
    }

    class CrudHakAkses extends HakAkses{
        function showData(){
            $sql ="SELECT * FROM HakAkses";
            $stmt=$this->koneksi->prepare($sql);
            $stmt->execute();
            return $stmt;
        }

        function insertData($pNama, $pKet){
            try {
                $data = new HakAkses;
                $data->setNamaAkses($pNama);
                $data->setKeterangan($pKet);

                $NamaAkses = $data->getNamaAkses();
                $Keterangan = $data->getKeterangan();

                $sql="INSERT INTO HakAkses(NamaAkses, Keterangan) VALUES (:NamaAkses, :Keterangan)";
                $stmt=$this->koneksi->prepare($sql);
                    $stmt->bindParam(":NamaAkses", $NamaAkses);
                    $stmt->bindParam(":Keterangan", $Keterangan);
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
                $sql ="SELECT IdAkses, NamaAkses, Keterangan FROM HakAkses WHERE IdAkses=:IdAkses";
                $stmt=$this->koneksi->prepare($sql);

                $data = new HakAkses;
                $data->setIdAkses($pId);

                $IdAkses = $data->getIdAkses();

                $stmt->bindParam(":IdAkses",$IdAkses);
                $stmt->execute();
                $stmt->bindColumn(1, $this->IdAkses);
                $stmt->bindColumn(2, $this->NamaAkses);
                $stmt->bindColumn(3, $this->Keterangan);
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

        function updateData($pNama, $pKet, $pId){
            try {
                $sql="UPDATE HakAkses SET NamaAkses=:NamaAkses, Keterangan=:Keterangan WHERE IdAkses=:IdAkses";
                $stmt=$this->koneksi->prepare($sql);
                
                $data = new HakAkses;
                $data->setIdAkses($pId);
                $data->setNamaAkses($pNama);
                $data->setKeterangan($pKet);

                $IdAkses = $data->getIdAkses();
                $NamaAkses = $data->getNamaAkses();
                $Keterangan = $data->getKeterangan();

                $stmt->bindParam(":IdAkses",$IdAkses);
                $stmt->bindParam(":NamaAkses",$NamaAkses);
                $stmt->bindParam(":Keterangan",$Keterangan);
                $stmt->execute();
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        function delete ($pId){
            try{
                $sql="DELETE FROM HakAkses WHERE IdAkses=:IdAkses";
                $stmt=$this->koneksi->prepare($sql);
                
                $data = new HakAkses;
                $data->setIdAkses($pId);

                $IdAkses = $data->getIdAkses();
                
                $stmt->execute(array("IdAkses"=>$IdAkses));
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }

    

?>