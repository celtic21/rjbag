<?php 
//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');


        //notifikasi
        if($this->session->flashdata('sukses')) {
        echo '<div class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
        }
        //form open
 echo form_open(base_url('admin/profil/profil'), 'class="form-horizontal"'); ?>



 <div class="form-group">
  <label  class="col-md-2 control-label">Username</label>
  <div class="col-md-5">
    <input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $profil->username ?>" readonly >
  </div>
</div>
 
 <div class="form-group">
  <label  class="col-md-2 control-label">Nama</label>
  <div class="col-md-5">
    <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" value="<?php echo $profil->nama ?>" required >
  </div>
</div>

 <div class="form-group">
  <label  class="col-md-2 control-label">Alamat</label>
  <div class="col-md-5">
    <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $profil->alamat ?>" required >
  </div>
</div>

 <div class="form-group">
  <label  class="col-md-2 control-label">Telepon</label>
  <div class="col-md-5">
    <input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $profil->telepon ?>" required >
  </div>
</div>

 <div class="form-group">
  <label  class="col-md-2 control-label">Password</label>
  <div class="col-md-5">
    <input type="password" name="password" class="form-control" placeholder="ketik min 4 karakter untuk mengganti password" required >
  </div>
</div>

 <div class="form-group">
  <label  class="col-md-2 control-label"></label>
  <div class="col-md-5">
   <button class="btn btn-success btn-md" nama="submit" type="submit">
   	<i class="fa fa-save"> Simpan</i>
   </button>
   
  </div>
</div>


 <?php echo form_close(); ?>