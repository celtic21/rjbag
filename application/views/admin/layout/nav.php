  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if ($this->session->userdata('level') == 'Admin' && $this->session->userdata('jenis_kelamin') == 'perempuan') { ?>
          <img src="<?php echo base_url() ?>assets/tampilan/adminp.png"  class="img-circle" alt="User Image">
        <?php } ?>
         <?php if ($this->session->userdata('level') == 'Admin' && $this->session->userdata('jenis_kelamin') == 'laki laki') { ?>
          <img src="<?php echo base_url() ?>assets/tampilan/adminl.png"  class="img-circle" alt="User Image">
        <?php } ?>
         <?php if ($this->session->userdata('level') == 'Owner' && $this->session->userdata('jenis_kelamin') == 'laki laki') { ?>
          <img src="<?php echo base_url() ?>assets/tampilan/owner.png"  class="img-circle" alt="User Image">
        <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->





      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>



<?php if ($this->session->userdata('level') == 'Admin') { ?>
      <!-- menu dasbor -->
        <li><a href="<?php echo base_url('admin/dasbor') ?>"><i class="fa fa-dashboard text-aqua"></i> <span>DASHBOARD</span></a></li>

 
      <!-- menu transaksi -->
        <li><a href="<?php echo base_url('admin/transaksi') ?>"><i class="fa fa-check text-aqua"></i> <span>TRANSAKSI</span></a></li>


        <!-- menu produk -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sitemap text-aqua"></i> <span>PRODUK</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/produk') ?>"><i class="fa fa-table"></i> Data Produk</a></li>
            <li><a href="<?php echo base_url('admin/produk/tambah') ?>"><i class="fa fa-plus"></i> Tambah Produk</a></li>
            <li><a href="<?php echo base_url('admin/kategori') ?>"><i class="fa fa-tags"></i> kategori produk</a></li>
          </ul>
        </li>

                <!-- menu profil -->
        <li><a href="<?php echo base_url('admin/profil') ?>"><i class="fa  fa-user text-aqua"></i> <span> Profil</span></a></li>

      
        
<?php } ?>


<?php if ($this->session->userdata('level') == 'Owner') { ?>
      <!-- menu dasbor -->
        <li><a href="<?php echo base_url('admin/dasbor') ?>"><i class="fa fa-dashboard text-aqua"></i> <span>DASHBOARD</span></a></li>


      <!-- menu transaksi -->
        <li><a href="<?php echo base_url('admin/transaksi') ?>"><i class="fa fa-check text-aqua"></i> <span>TRANSAKSI</span></a></li>


         <!-- menu dasbor -->
        <li><a href="<?php echo base_url('admin/rekening') ?>"><i class="fa fa-dollar text-aqua"></i> <span>Data Rekening</span></a></li>

      <!-- menu user -->
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-users text-aqua"></i> <span>PENGGUNA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-table"></i> Data Pengguna</a></li>
            <li><a href="<?php echo base_url('admin/user/tambah') ?>"><i class="fa fa-plus"></i> Tambah Pengguna</a></li>
          </ul>
        </li>

           <!-- menu konfigurasi -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench text-aqua" ></i> <span>PROFIL TOKO</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/konfigurasi') ?>"><i class="fa fa-home"></i> Konfigurasi Umum</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/logo') ?>"><i class="fa fa-image"></i> Konfigurasi Logo</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/icon') ?>"><i class="fa  fa-file-image-o"></i> Konfigurasi icon</a></li>
          </ul>
        </li>
<?php } ?>

    
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php echo $title ?>
      </h1>
     <!--  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
      
            <!-- /.box-header -->
            <div class="box-body">

 <style type="text/css">
   .j {
   color: blue;
   }
   .r {
   color: #c72838;
   }
   .ketiga {
   color: rgb(200,200,0);
   }
   .navbar{background-color:#ad1d35;
   }
</style>