<?php
//notifikasi
if ($this->session->flashdata('sukses')) {
  echo '<p class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>

<?php 
//error upload
if (isset($error)) {
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}

//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

//form open
echo form_open_multipart(base_url('admin/konfigurasi'),' class="form-horizontal"');
 ?>

 <div class="form-group form-group-lg">
  <label  class="col-md-2 control-label">Nama Website</label>
  <div class="col-md-8">
    <input type="text" name="namaweb" class="form-control" placeholder="Nama Website" value="<?php echo $konfigurasi->namaweb ?>" required >
  </div>
</div>

 <div class="form-group">
  <label  class="col-md-2 control-label">Tagline</label>
  <div class="col-md-8">
    <input type="text" name="tagline" class="form-control" placeholder="Tagline" value="<?php echo $konfigurasi->tagline ?>" required >
  </div>
</div>

 <div class="form-group">
  <label  class="col-md-2 control-label">Telepon</label>
  <div class="col-md-8">
    <input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $konfigurasi->telepon ?>" required >
  </div>
</div>

 <div class="form-group">
  <label  class="col-md-2 control-label">Alamat</label>
  <div class="col-md-8">
    <input type="text" name="alamat" class="form-control" placeholder="alamat" value="<?php echo $konfigurasi->alamat ?>" required >
  </div>
</div>

 <div class="form-group">
  <label  class="col-md-2 control-label">Email</label>
  <div class="col-md-8">
    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $konfigurasi->email ?>" required >
  </div>
</div>

 <div class="form-group">
  <label  class="col-md-2 control-label">Website</label>
  <div class="col-md-8">
    <input type="text" name="website" class="form-control" placeholder="Alamat Website" value="<?php echo $konfigurasi->website ?>" required >
  </div>
</div>

 <div class="form-group">
  <label  class="col-md-2 control-label">Facebook</label>
  <div class="col-md-8">
    <input type="text" name="facebook" class="form-control" placeholder="facebook" value="<?php echo $konfigurasi->facebook ?>" required >
  </div>
</div>

 <div class="form-group">
  <label  class="col-md-2 control-label">Instagram</label>
  <div class="col-md-8">
    <input type="text" name="instagram" class="form-control" placeholder="instagram" value="<?php echo $konfigurasi->instagram ?>" required >
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Deskripsi Website</label>
  <div class="col-md-8">
    <input type="text" name="deskripsi" class="form-control" placeholder="deskripsi" value="<?php echo $konfigurasi->deskripsi ?>" required >
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Rekening Pembayaran</label>
  <div class="col-md-8">
    <input type="text" name="rekening_pembayaran" class="form-control" placeholder="Rekening Pembayaran" value="<?php echo $konfigurasi->rekening_pembayaran ?>" required >
  </div>
</div>


<div class="form-group">
  <label  class="col-md-2 control-label"></label>
  <div class="col-md-5">
   <button class="btn btn-success btn-lg" nama="submit" type="submit">
   	<i class="fa fa-save">Simpan</i>
   </button>
   
     <button class="btn btn-info btn-lg" nama="reset" type="reset">
     	<i class="fa fa-times">Reset</i>
     </button>
   
  </div>
</div>


 <?php echo form_close(); ?>