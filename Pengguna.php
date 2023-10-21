<?php 
    require_once('Connection.php');
    class Pengguna extends Connection{
        private $IdPengguna;
        private $NamaPengguna;
        private $Password;
        private $NamaDepan;
        private $NamaBelakang;
        private $NoHp;
        private $Alamat;
        private $IdAkses;

        // public function __construct($IdPengguna, $NamaPengguna, $Password, $NamaDepan, $NamaBelakang, $NoHp, $Alamat, $IdAkses){
        //     $this->idPengguna = $IdPengguna;
        //     $this->namaPengguna = $NamaPengguna;
        //     $this->password = $Password;
        //     $this->namaDepan = $NamaDepan;
        //     $this->namaBelakang = $NamaBelakang;
        //     $this->NoHp = $NoHp;
        //     $this->alamat = $Alamat;
        //     $this->idAkses = $IdAkses;
        // }

        function getIdPengguna(){ return $this->IdPengguna; }
        function getNamaPengguna(){ return $this->NamaPengguna; }
        function getPassword(){ return $this->Password; }
        function getNamaDepan(){ return $this->NamaDepan; }
        function getNamaBelakang(){ return $this->NamaBelakang; }
        function getNoHp(){ return $this->NoHp; }
        function getAlamat(){ return $this->Alamat; }
        function getIdAkses(){ return $this->IdAkses; }
        function setIdPengguna($IdPengguna){ $this->IdPengguna = $IdPengguna; }
        function setNamaPengguna($NamaPengguna){ $this->NamaPengguna = $NamaPengguna; }
        function setPassword($Password){ $this->Password = $Password; }
        function setNamaDepan($NamaDepan){ $this->NamaDepan = $NamaDepan; }
        function setNamaBelakang($NamaBelakang){ $this->NamaBelakang = $NamaBelakang; }
        function setNoHp($NoHp){ $this->NoHp = $NoHp; }
        function setAlamat($Alamat){ $this->Alamat = $Alamat; }
        function setIdAkses($IdAkses){ $this->IdAkses = $IdAkses; }    
    }

    class CrudPengguna extends Pengguna{
        function showData(){
            $sql ="SELECT * FROM Pengguna";
            $stmt=$this->koneksi->prepare($sql);
            $stmt->execute();
            return $stmt;
        }

        function insertData($pNamaPengguna, $pPassword, $pNamaDepan, $pNamaBelakang, $pNoHp, $pAlamat, $pIdAkses){
            try {
                $data = new Pengguna;
                $data->setNamaPengguna($pNamaPengguna,);
                $data->setPassword($pPassword,);
                $data->setNamaDepan($pNamaDepan,);
                $data->setNamaBelakang($pNamaBelakang,);
                $data->setNoHp($pNoHp,);
                $data->setAlamat($pAlamat,);
                $data->setIdAkses($pIdAkses,);

                $NamaPengguna = $data->getNamaPengguna();
                $Password = $data->getPassword();
                $NamaDepan = $data->getNamaDepan();
                $NamaBelakang = $data->getNamaBelakang();
                $NoHp = $data->getNoHp();
                $Alamat = $data->getAlamat();
                $IdAkses = $data->getIdAkses();

                $sql="INSERT INTO Pengguna(NamaPengguna,Password,NamaDepan,NamaBelakang,NoHp,Alamat,IdAkses) VALUES (:NamaPengguna, :Password, :NamaDepan, :NamaBelakang, :NoHp, :Alamat, :IdAkses)";
                $stmt=$this->koneksi->prepare($sql);
                $stmt->bindParam(':NamaPengguna', $NamaPengguna);
                $stmt->bindParam(':Password', $Password);
                $stmt->bindParam(':NamaDepan', $NamaDepan);
                $stmt->bindParam(':NamaBelakang', $NamaBelakang);
                $stmt->bindParam(':NoHp', $NoHp);
                $stmt->bindParam(':Alamat', $Alamat);
                $stmt->bindParam(':IdAkses', $IdAkses);                
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
                $sql ="SELECT IdPengguna, NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, IdAkses FROM pengguna WHERE IdPengguna=:IdPengguna";
                $stmt=$this->koneksi->prepare($sql);

                $data = new Pengguna;
                $data->setIdPengguna($pId);

                $IdPengguna = $data->getIdPengguna();

                $stmt->bindParam(":IdPengguna",$IdPengguna);
                $stmt->execute();
                $stmt->bindColumn(1, $this->IdPengguna);
                $stmt->bindColumn(2, $this->NamaPengguna);
                $stmt->bindColumn(3, $this->Password);
                $stmt->bindColumn(4, $this->NamaDepan);
                $stmt->bindColumn(5, $this->NamaBelakang);
                $stmt->bindColumn(6, $this->NoHp);
                $stmt->bindColumn(7, $this->Alamat);
                $stmt->bindColumn(8, $this->IdAkses);
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

        function updateData($pNamaPengguna, $pPassword, $pNamaDepan, $pNamaBelakang, $pNoHp, $pAlamat, $pIdAkses, $pIdPengguna){
            try {
                $sql="UPDATE Pengguna SET NamaPengguna=:NamaPengguna,Password=:Password,NamaDepan=:NamaDepan,NamaBelakang=:NamaBelakang,NoHp=:NoHp,Alamat=:Alamat,IdAkses=:IdAkses WHERE IdPengguna=:IdPengguna";
                $stmt=$this->koneksi->prepare($sql);
                
                $data = new Pengguna;
                $data->setIdPengguna($pIdPengguna,);
                $data->setNamaPengguna($pNamaPengguna,);
                $data->setPassword($pPassword,);
                $data->setNamaDepan($pNamaDepan,);
                $data->setNamaBelakang($pNamaBelakang,);
                $data->setNoHp($pNoHp,);
                $data->setAlamat($pAlamat,);
                $data->setIdAkses($pIdAkses,);

                $IdPengguna = $data->getIdPengguna();
                $NamaPengguna = $data->getNamaPengguna();
                $Password = $data->getPassword();
                $NamaDepan = $data->getNamaDepan();
                $NamaBelakang = $data->getNamaBelakang();
                $NoHp = $data->getNoHp();
                $Alamat = $data->getAlamat();
                $IdAkses = $data->getIdAkses();

                $stmt->bindParam(':IdPengguna', $IdPengguna);
                $stmt->bindParam(':NamaPengguna', $NamaPengguna);
                $stmt->bindParam(':Password', $Password);
                $stmt->bindParam(':NamaDepan', $NamaDepan);
                $stmt->bindParam(':NamaBelakang', $NamaBelakang);
                $stmt->bindParam(':NoHp', $NoHp);
                $stmt->bindParam(':Alamat', $Alamat);
                $stmt->bindParam(':IdAkses', $IdAkses);
                $stmt->execute();
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        function delete ($pId){
            try{
                $sql="DELETE FROM Pengguna WHERE IdPengguna=:IdPengguna";
                $stmt=$this->koneksi->prepare($sql);
                
                $data = new Pengguna;
                $data->setIdPengguna($pId);

                $IdPengguna = $data->getIdPengguna();
                
                $stmt->execute(array("IdPengguna"=>$IdPengguna));
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
?>