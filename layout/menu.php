 <!-- Brand Logo -->
    <a href="<?= site_url('home') ?>" class="brand-link">
      <img src="<?= base_url('images/puri_utami.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">UMKM Puri Utami</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>/template/dist/img/avatar-1.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block"> &nbsp;&nbsp;&nbsp;&nbsp;<?= userlogin()->user_group?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" name="keyword" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar" type="submit" name="submit">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

         <!-- sesion Produksi -->
        <?php if (session()->get('user_group')=='Bagian Produksi') { ?>
          <li class="nav-item <?php if(in_array($activeMenu,['dashboard'])) echo "menu-open" ?>">
            <a href="<?= site_url('home') ?>" class="nav-link <?php if(in_array($activeMenu,['dashboard'])) echo "active" ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item <?php if(in_array($activeMenu,['karyawan','bahan_baku','listproduk','overhead'])) echo "menu-open" ?>">
            <a href="#" class="nav-link <?php if(in_array($activeMenu,['karyawan','bahan_baku','listproduk','overhead'])) echo "active" ?>">
               <i class="nav-icon fas fa-database"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="<?= base_url('bahan_baku/daftarbahan')?>" class="nav-link <?php if($activeMenu == 'bahan_baku') echo "active"?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bahan Baku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('karyawan/daftarkaryawan')?>" class="nav-link <?php if($activeMenu == 'karyawan') echo "active"?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?= base_url('Listproduk/listproduk')?>" class="nav-link <?php if($activeMenu == 'listproduk') echo "active"?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>List Produk</p>
              </a>
            </li>
             <li class="nav-item">
                 <a href="<?= base_url('Overhead/daftaroverhead')?>" class="nav-link <?php if($activeMenu == 'overhead') echo "active"?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Overhead</p>
              </a>
            </li>
            </ul>
          </li>
          <li class="nav-item <?php if(in_array($activeMenu,['targetcosting','produksi'])) echo "menu-open" ?>">
            <a href="#" class="nav-link <?php if(in_array($activeMenu,['targetcosting','produksi'])) echo "active" ?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('Targetcosting/listtargetcosting')?>" class="nav-link <?php if($activeMenu == 'targetcosting') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Target Costing</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Produksi/index')?>" class="nav-link <?php if($activeMenu == 'produksi') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produksi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if(in_array($activeMenu,['harga_pokok_produk'])) echo "menu-open" ?>">
            <a href="#" class="nav-link <?php if(in_array($activeMenu,['harga_pokok_produk'])) echo "active" ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Harga_pokok_produk/index') ?>" class="nav-link <?php if($activeMenu == 'harga_pokok_produk') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Harga Pokok Produksi</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } ?>
  <!-- sesion Produksi -->

      <!-- sesion bagian keuangan -->
        <?php if (session()->get('user_group')=='Bagian Keuangan') { ?>
          <li class="nav-item <?php if(in_array($activeMenu,['dashboard'])) echo "menu-open" ?>">
            <a href="<?= site_url('home') ?>" class="nav-link <?php if(in_array($activeMenu,['dashboard'])) echo "active" ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item <?php if(in_array($activeMenu,['coa','kategoribeban','Kartu Stok'])) echo "menu-open" ?>">
            <a href="#" class="nav-link <?php if(in_array($activeMenu,['coa','kategoribeban','Kartu Stok'])) echo "active" ?>">
               <i class="nav-icon fas fa-database"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="<?= base_url('akun/daftarakun') ?>" class="nav-link <?php if($activeMenu == 'coa') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>COA</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?= base_url('kategori_beban/daftarbeban') ?>" class="nav-link <?php if($activeMenu == 'kategoribeban') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Beban</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('periode/daftarperiode') ?>" class="nav-link <?php if($activeMenu == 'periode') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Periode</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if(in_array($activeMenu,['pembebanan','pembebananonsite'])) echo "menu-open" ?>">
            <a href="#" class="nav-link <?php if(in_array($activeMenu,['pembebanan','pembebananonsite'])) echo "active" ?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('pembebanan/ListBeban')?>" class="nav-link <?php if($activeMenu == 'pembebanan') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bayar Beban Online</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Pembebananonsite/ListBeban')?>" class="nav-link <?php if($activeMenu == 'pembebananonsite') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bayar Beban Onsite</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if(in_array($activeMenu,['jurnalumum','bukubesar','neracasaldo','labarugi','lappenj','kartu_harga_pokok','labarugionsite','kartustok','harga_pokok_produk'])) echo "menu-open" ?>">
            <a href="#" class="nav-link <?php if(in_array($activeMenu,['jurnalumum','bukubesar','neracasaldo','labarugi','lappenj','kartu_harga_pokok','labarugionsite','kartustok','harga_pokok_produk'])) echo "active" ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
               <a href="<?= base_url('laporan/kartustok') ?>" class="nav-link <?php if ($activeMenu == 'Kartu Stok') echo "active" ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Kartu Stok</p>
               </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Laporan/jurnalumum')?>" class="nav-link <?php if($activeMenu == 'jurnalumum') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jurnal Umum</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Laporan/bukubesar') ?>" class="nav-link <?php if($activeMenu == 'bukubesar') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buku Besar</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?= base_url('Harga_pokok_produk/index') ?>" class="nav-link <?php if($activeMenu == 'harga_pokok_produk') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Harga Pokok Produksi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Kartu_harga_pokok/index') ?>" class="nav-link <?php if($activeMenu == 'kartu_harga_pokok') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kartu Harga Pokok</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Laporan/neracasaldo') ?>" class="nav-link <?php if($activeMenu == 'neracasaldo') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Neraca Saldo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Laporan/labarugi') ?>" class="nav-link <?php if($activeMenu == 'labarugi') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lap. laba/rugi Online</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Laporan/labarugionsite') ?>" class="nav-link <?php if($activeMenu == 'labarugionsite') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lap. laba/rugi Onsite</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } ?>
    <!-- sesion bagian keuangan -->

    <!-- sesion bagian penjualan -->
        <?php if (session()->get('user_group')=='Bagian Penjualan') { ?>
          <li class="nav-item <?php if(in_array($activeMenu,['dashboard'])) echo "menu-open" ?>">
            <a href="<?= site_url('home') ?>" class="nav-link <?php if(in_array($activeMenu,['dashboard'])) echo "active" ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item <?php if(in_array($activeMenu,['kategori','produk','pelanggan','pelangganonsite'])) echo "menu-open" ?>">
            <a href="#" class="nav-link <?php if(in_array($activeMenu,['kategori','produk','pelanggan','pelangganonsite'])) echo "active" ?>">
               <i class="nav-icon fas fa-database"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('kategori/daftarkategori') ?>" class="nav-link <?php if($activeMenu == 'kategori') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('produk/daftarproduk') ?>" class="nav-link <?php if($activeMenu == 'produk') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produk Jadi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('pelanggan/daftarpelanggan') ?>" class="nav-link <?php if($activeMenu == 'pelanggan') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pelanggan Online</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Pelanggan_onsite/daftarpelanggan') ?>" class="nav-link <?php if($activeMenu == 'pelangganonsite') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pelanggan Onsite</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('periode/daftarperiode') ?>" class="nav-link <?php if($activeMenu == 'periode') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Periode</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if(in_array($activeMenu,['penjualan','penjualanonsite'])) echo "menu-open" ?>">
            <a href="#" class="nav-link <?php if(in_array($activeMenu,['penjualan','penjualanonsite'])) echo "active" ?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('Penjualan_admin/daftarpenjualan')?>" class="nav-link <?php if($activeMenu == 'penjualan') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan Online</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Penjualanonsite/ListJual')?>" class="nav-link <?php if($activeMenu == 'penjualanonsite') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan Onsite</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if(in_array($activeMenu,['lappenj'])) echo "menu-open" ?>">
            <a href="#" class="nav-link <?php if(in_array($activeMenu,['lappenj'])) echo "active" ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Laporan/penjualanonline') ?>" class="nav-link <?php if($activeMenu == 'lappenj') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lap. Penjualan Online</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } ?>
    <!-- sesion bagian penjualan -->

    <!-- sesion pembelian -->
        <?php if (session()->get('user_group')=='Bagian Pembelian') { ?>
          <li class="nav-item <?php if(in_array($activeMenu,['dashboard'])) echo "menu-open" ?>">
            <a href="<?= site_url('home') ?>" class="nav-link <?php if(in_array($activeMenu,['dashboard'])) echo "active" ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item <?php if(in_array($activeMenu,['supplier','bahan_baku','target_produksi'])) echo "menu-open" ?>">
            <a href="#" class="nav-link <?php if(in_array($activeMenu,['supplier','bahan_baku','target_produksi'])) echo "active" ?>">
               <i class="nav-icon fas fa-database"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="<?= base_url('bahan_baku/daftarbahan')?>" class="nav-link <?php if($activeMenu == 'bahan_baku') echo "active"?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bahan Baku</p>
                </a>
              </li>
             <li class="nav-item">
                 <a href="<?= base_url('supplier/daftarsupplier')?>" class="nav-link <?php if($activeMenu == 'supplier') echo "active"?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Supplier</p>
              </a>
            </li>
             <li class="nav-item">
                 <a href="<?= base_url('Target_produksi/daftartargetprod')?>" class="nav-link <?php if($activeMenu == 'target_produksi') echo "active"?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Target Produksi</p>
              </a>
            </li>
            </ul>
          </li>
          <li class="nav-item <?php if(in_array($activeMenu,['safety','reorder','eoq','permintaan','pembelian'])) echo "menu-open" ?>">
            <a href="#" class="nav-link <?php if(in_array($activeMenu,['safety','reorder','eoq','permintaan','pembelian'])) echo "active" ?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('Safety_stock')?>" class="nav-link <?php if($activeMenu == 'safety') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Safety Stock</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Reorder_point')?>" class="nav-link <?php if($activeMenu == 'reorder') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reorder Point</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Eoq/daftareoq')?>" class="nav-link <?php if($activeMenu == 'eoq') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>EOQ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('C_permintaan/ListBeli')?>" class="nav-link <?php if($activeMenu == 'permintaan') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permintaan Pembelian</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="<?=base_url('Beli/ListBeli')?>" class="nav-link <?php if($activeMenu == 'pembelian') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembelian</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } ?>
  <!-- sesion Pembelian -->

    <!-- sesion Analisis Data -->
        <?php if (session()->get('user_group')=='Analisis Data') { ?>
          <li class="nav-item <?php if(in_array($activeMenu,['dashboard'])) echo "menu-open" ?>">
            <a href="<?= site_url('home') ?>" class="nav-link <?php if(in_array($activeMenu,['dashboard'])) echo "active" ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item <?php if(in_array($activeMenu,['coa','kategoribeban','kategori','produk','pelanggan','pelangganonsite','supplier','karyawan','bahan_baku','listproduk','MinRule', 'target_produksi','overhead'])) echo "menu-open" ?>">
            <a href="#" class="nav-link <?php if(in_array($activeMenu,['coa','kategoribeban','kategori','produk','pelanggan','pelangganonsite','supplier','karyawan','bahan_baku','listproduk','MinRule', 'target_produksi','overhead'])) echo "active" ?>">
               <i class="nav-icon fas fa-database"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             <li class="nav-item">
                 <a href="<?= base_url('MinRule/data_min_rule')?>" class="nav-link <?php if($activeMenu == 'MinRule') echo "active"?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Minimal Rule</p>
              </a>
            </li>
            </ul>
          </li>
          <li class="nav-item <?php if(in_array($activeMenu,['Rekapitulasi_Online', 'Rekapitulasi_Onsite', 'Rekapitulasi','harga_pokok_produk','kartu_harga_pokok','labarugionsite','kartustok'])) echo "menu-open" ?>">
            <a href="#" class="nav-link <?php if(in_array($activeMenu,['Rekapitulasi_Online', 'Rekapitulasi_Onsite', 'Rekapitulasi','harga_pokok_produk','kartu_harga_pokok','labarugionsite','kartustok'])) echo "active" ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                  <a href="<?= base_url('Rekapitulasi_Online/index')?>" class="nav-link <?php if($activeMenu == 'Rekapitulasi_Online') echo "active"?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekapitulasi Online</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Rekapitulasi_Onsite')?>" class="nav-link <?php if($activeMenu == 'Rekapitulasi_Onsite') echo "active"?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Rekapitulasi In-Store</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('Rekapitulasi/index')?>" class="nav-link <?php if($activeMenu == 'Rekapitulasi') echo "active"?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Rekapitulasi Gabungan</p>
            </a>
          </li>
            </ul>
          </li>
          <li class="nav-item <?php if (in_array($activeMenu, ['Asosiasi_Online', 'Asosiasi_Onsite', 'Asosiasi'])) echo "menu-open"?>">
            <a href="#" class="nav-link <?php if(in_array($activeMenu, ['Asosiasi_Online', 'Asosiasi_Onsite', 'Asosiasi'])) echo "active"?>">
              <!-- <i class="nav-icon fas fa-chart-pie"></i> -->
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Analisis Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('Asosiasi_Online')?>" class="nav-link <?php if($activeMenu == 'Asosiasi_Online') echo "active"?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Asosiasi Penj. Online</p>
            </a>
          </li>
            <li class="nav-item">
              <a href="<?= base_url('Asosiasi_Onsite')?>" class="nav-link <?php if($activeMenu == 'Asosiasi_Onsite') echo "active"?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Asosiasi Penj. In-Store</p>
            </a>
          </li>
            <li class="nav-item">
              <a href="<?= base_url('Asosiasi')?>" class="nav-link <?php if($activeMenu == 'Asosiasi') echo "active"?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Asosiasi Gab. Penjualan</p>
            </a>
          </li>
          </ul>
          </li>
        <?php } ?>
  <!-- sesion Analisis Data -->

    <!-- sesion pemilik -->
        <?php if (session()->get('user_group')=='Pemilik') { ?>
          <li class="nav-item <?php if(in_array($activeMenu,['dashboard'])) echo "menu-open" ?>">
            <a href="<?= site_url('home') ?>" class="nav-link <?php if(in_array($activeMenu,['dashboard'])) echo "active" ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item <?php if(in_array($activeMenu,['jurnalumum','bukubesar','neracasaldo','labarugi','lappenj','Rekapitulasi_Online', 'Rekapitulasi_Onsite', 'Rekapitulasi','harga_pokok_produk','kartu_harga_pokok','labarugionsite','Kartu Stok'])) echo "menu-open" ?>">
            <a href="#" class="nav-link <?php if(in_array($activeMenu,['jurnalumum','bukubesar','neracasaldo','labarugi','lappenj','Rekapitulasi_Online', 'Rekapitulasi_Onsite', 'Rekapitulasi','harga_pokok_produk','kartu_harga_pokok','labarugionsite','Kartu Stok'])) echo "active" ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               <a href="<?= base_url('laporan/kartustok') ?>" class="nav-link <?php if ($activeMenu == 'Kartu Stok') echo "active" ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Kartu Stok</p>
               </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Laporan/jurnalumum')?>" class="nav-link <?php if($activeMenu == 'jurnalumum') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jurnal Umum</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Laporan/bukubesar') ?>" class="nav-link <?php if($activeMenu == 'bukubesar') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buku Besar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Harga_pokok_produk/index') ?>" class="nav-link <?php if($activeMenu == 'harga_pokok_produk') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Harga Pokok Produksi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Kartu_harga_pokok/index') ?>" class="nav-link <?php if($activeMenu == 'kartu_harga_pokok') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kartu Harga Pokok</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Laporan/neracasaldo') ?>" class="nav-link <?php if($activeMenu == 'neracasaldo') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Neraca Saldo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Laporan/labarugi') ?>" class="nav-link <?php if($activeMenu == 'labarugi') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lap. laba/rugi Online</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Laporan/labarugionsite') ?>" class="nav-link <?php if($activeMenu == 'labarugionsite') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lap. laba/rugi Onsite</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Laporan/penjualanonline') ?>" class="nav-link <?php if($activeMenu == 'lappenj') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lap. Penjualan Online</p>
                </a>
              </li>
               <li class="nav-item">
                  <a href="<?= base_url('Rekapitulasi_Online/index')?>" class="nav-link <?php if($activeMenu == 'Rekapitulasi_Online') echo "active"?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekapitulasi Online</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Rekapitulasi_Onsite')?>" class="nav-link <?php if($activeMenu == 'Rekapitulasi_Onsite') echo "active"?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Rekapitulasi In-Store</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('Rekapitulasi/index')?>" class="nav-link <?php if($activeMenu == 'Rekapitulasi') echo "active"?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Rekapitulasi Gabungan</p>
            </a>
          </li>
            </ul>
          </li>
          <li class="nav-header">SETTING</li>
           <li class="nav-item <?php if(in_array($activeMenu,['setting'])) echo "menu-open" ?>">
            <a href="<?= base_url('setting_puri/daftarsetting') ?>" class="nav-link <?php if(in_array($activeMenu,['setting'])) echo "active" ?>">
              <i class="fas fa-cog"></i>
              <p>Pengaturan Lokasi</p>
            </a>
          </li>
        <?php } ?>
  <!-- sesion pemilik -->
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->