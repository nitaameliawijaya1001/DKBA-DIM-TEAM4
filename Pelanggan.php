<?php
    class Pelanggan {
        private $idPelanggan;
        private $namaPelanggan;
        private $alamatPelanggan;
        private $noHP;
        private $jenisKelaminCode;
        private $tanggalLahir;

        // public function __construct($idPelanggan, $NamaPelanggan, $AlamatPelanggan, $NoHP, $JenisKelaminCode, $TanggalLahir){
        //     $this->idPelanggan = $idPelanggan;
        //     $this->namaPelanggan = $NamaPelanggan;
        //     $this->alamatPelanggan = $AlamatPelanggan;
        //     $this->noHP = $NoHP;
        //     $this->jenisKelaminCode = $JenisKelaminCode;
        //     $this->tanggalLahir = $TanggalLahir;
        // }

        public function getIdPelanggan(){
            return $this->idPelanggan;
        }

        public function getNamaPelanggan(){
            return $this->namaPelanggan;
        }

        public function getAlamatPelanggan(){
            return $this->alamatPelanggan;
        }

        public function getNoHP(){
            return $this->noHP;
        }
        
        public function getJenisKelaminCode(){
            return $this->jenisKelaminCode;
        }

        public function getTanggalLahir(){
            return $this->tanggalLahir;
        }

        function setIdPelanggan($idPelanggan){
            $this->idPelanggan = $idPelanggan;
        }

        function setNamaPelanggan($namaPelanggan){
            $this->namaPelanggan = $namaPelanggan;
        }

        function setAlamatPelanggan($alamatPelanggan){
            $this->alamatPelanggan = $alamatPelanggan;
        }

        function setNoHP($noHP){
            $this->noHP = $noHP;
        }

        function setJenisKelaminCode($jenisKelaminCode){
            $this->njenisKelaminCodeoHP = $jenisKelaminCode;
        }

        function setTanggalLahir($tanggalLahir){
            $this->tanggalLahir = $tanggalLahir;
        }
    }

    class CrudPelanggan extends Pelanggan{
        function showData(){
            $sql ="SELECT * FROM Pelanggan";
            $stmt=$this->koneksi->prepare($sql);
            $stmt->execute();
            return $stmt;
        }

        function insertData($pNama, $pAlamat, $pNoHP, $pGender, $pBod){
            try {
                $data = new Pelanggan;
                $data->setNamaPelanggan($pNama);
                $data->setAlamatPelanggan($pAlamat);
                $data->setNoHP($pNoHP);
                $data->setJenisKelaminCode($pGender);
                $data->setTanggalLahir($pBod);

                $namaPelanggan = $data->getNamaPelanggan();
                $alamatPelanggan = $data->getAlamatPelanggan();
                $noHP = $data->getNoHP();
                $jenisKelaminCode = $data->getJenisKelaminCode();
                $tanggalLahir = $data->getTanggalLahir();

                $sql="INSERT INTO Pelanggan(idPelanggan, namaPelanggan, alamatPelanggan, noHP, jenisKelaminCode, tanggalLahir) VALUES (:idPelanggan, :namaPelanggan, :alamatPelanggan, :noHP, :jenisKelaminCode, :tanggalLahir)";
                $stmt=$this->koneksi->prepare($sql);
                    $stmt->bindParam(":idPelanggan", $namaPelanggan);
                    $stmt->bindParam(":alamatPelanggan", $alamatPelanggan);
                    $stmt->bindParam(":noHP", $noHP);
                    $stmt->bindParam(":jenisKelaminCode", $jenisKelaminCode);
                    $stmt->bindParam(":tanggalLahir", $jenisKelaminCode);
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
                $sql ="SELECT idPelanggan, namaPelanggan, alamatPelanggan, noHP, jenisKelaminCode, tanggalLahir FROM Pelanggan WHERE IdPelanggan=:IdPelanggan";
                $stmt=$this->koneksi->prepare($sql);

                $data = new Pelanggan;
                $data->setIdPelanggan($pId);

                $IdPelanggan = $data->getIdPelanggan();

                $stmt->bindParam(":IdBarang",$IdPelanggan);
                $stmt->execute();
                $stmt->bindColumn(1, $this->idPelanggan);
                $stmt->bindColumn(2, $this->namaPelanggan);
                $stmt->bindColumn(3, $this->alamatPelanggan);
                $stmt->bindColumn(4, $this->noHP);
                $stmt->bindColumn(5, $this->jenisKelaminCode);
                $stmt->bindColumn(6, $this->tanggalLahir);
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

        function updateData($pNama, $pAlamat, $pNoHP, $pGender, $pBod, $pId){
            try {
                $sql="UPDATE Pelanggan SET namaPelanggan=:namaPelanggan, alamatPelanggan=:alamatPelanggan, noHP=:noHP, jenisKelaminCode=:jenisKelaminCode, tanggalLahir=:tanggalLahir WHERE idPelanggan=:idPelanggan";
                $stmt=$this->koneksi->prepare($sql);
                
                $data = new Pelanggan;
                $data->setIdPelanggan($pId);
                $data->setNamaPelanggan($pNama);
                $data->setAlamatPelanggan($pAlamat);
                $data->setNoHP($pNoHP);
                $data->setJenisKelaminCode($pGender);
                $data->setTanggalLahir($pBod);

                $idPelanggan = $data->getIdPelanggan();
                $namaPelanggan = $data->getNamaPelanggan();
                $alamatPelanggan = $data->getAlamatPelanggan();
                $noHP = $data->getNoHP();
                $jenisKelaminCode = $data->getJenisKelaminCode();
                $tanggalLahir = $data->getTanggalLahir();

                $stmt->bindParam(":idPelanggan",$idPelanggan);
                $stmt->bindParam(":namaPelanggan",$namaPelanggan);
                $stmt->bindParam(":alamatPelanggan",$alamatPelanggan);
                $stmt->bindParam(":noHP",$noHP);
                $stmt->bindParam(":jenisKelaminCode",$jenisKelaminCode);
                $stmt->bindParam(":tanggalLahir",$tanggalLahir);
                $stmt->execute();
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        function delete ($pId){
            try{
                $sql="DELETE FROM Pelanggan WHERE idPelanggan=:idPelanggan";
                $stmt=$this->koneksi->prepare($sql);
                
                $data = new Barang;
                $data->setIdPelanggan($pId);

                $idPelanggan = $data->getIdPelanggan();
                
                $stmt->execute(array("idPelanggan"=>$idPelanggan));
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
?>