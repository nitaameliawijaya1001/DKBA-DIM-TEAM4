<?php

    require_once('Connection.php');

    class DashboardData extends Connection {
        private $IdBarang;
        private $NamaBarang;
        private $TotalPenjualan;
        private $Modal;
        private $TotalPendapatan;
    }

    class CrudDashboardData extends DashboardData {
        function totalBarang(){
            $sql ="SELECT count(IdBarang) as 'Total Barang' from barang";
            $stmt=$this->koneksi->prepare($sql);
            $stmt->execute();
            return $stmt; 
        }

        function totalPenjualan(){
            $sql ="SELECT SUM(HargaJual*JumlahPenjualan) as 'Total Penjualan' FROM penjualan";
            $stmt=$this->koneksi->prepare($sql);
            $stmt->execute();
            return $stmt; 
        }

        function totalPendapatan(){
            $sql ="SELECT SUM(
                (penjualan.HargaJual * penjualan.JumlahPenjualan) - (penjualan.JumlahPenjualan * (SELECT SUM(HargaBeli)/COUNT(IdBarang) FROM pembelian WHERE idBarang=barang.IdBarang))
                ) AS 'Keuntungan'
                FROM barang 
                JOIN penjualan ON penjualan.IdBarang=barang.IdBarang;";
            $stmt=$this->koneksi->prepare($sql);
            $stmt->execute();
            return $stmt; 
        }

        function tabelPenjualanBarang(){
            $sql ="SELECT barang.IdBarang, barang.NamaBarang, (penjualan.HargaJual * penjualan.JumlahPenjualan) AS 'Total Penjualan', 
            (penjualan.JumlahPenjualan * (SELECT SUM(HargaBeli)/COUNT(IdBarang) FROM pembelian WHERE idBarang=barang.IdBarang)) AS 'Modal', 
            (penjualan.HargaJual * penjualan.JumlahPenjualan) - (penjualan.JumlahPenjualan*(SELECT SUM(HargaBeli)/COUNT(IdBarang) FROM pembelian WHERE idBarang=barang.IdBarang)) AS 'Total Pendapatan'
            FROM barang
            JOIN penjualan ON penjualan.IdBarang=barang.IdBarang
            JOIN pembelian ON pembelian.IdBarang=barang.IdBarang
            
            group by barang.IdBarang";
            $stmt=$this->koneksi->prepare($sql);
            $stmt->execute();
            return $stmt; 
        }

    }




?>