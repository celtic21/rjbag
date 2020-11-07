<?php 
if (isset($error)) {
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}
//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

//form open
echo form_open_multipart(base_url('admin/kategori/tambah'),' class="form-horizontal"');
 ?>

 <div class="form-group">
  <label  class="col-md-2 control-label">Nama Kategori</label>
  <div class="col-md-5">
    <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" value="<?php echo set_value('nama_kategori') ?>" required >
  </div>
</div>


 <div class="form-group">
  <label  class="col-md-2 control-label">Urutan</label>
  <div class="col-md-5">
    <input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo set_value('urutan') ?>" required >
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Upload Gambar</label>
  <div class="col-md-5">
    <input type="file" name="gambar" class="form-control" placeholder="Gambar" required >
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label"></label>
  <div class="col-md-5">
   <button class="btn btn-success btn-md" nama="submit" type="submit">
   	<i class="fa fa-save"> Simpan</i>
   </button>
   
     <button class="btn btn-info btn-md" nama="reset" type="reset">
     	<i class="fa fa-times"> Reset</i>
     </button>
   
  </div>
</div>


 <?php echo form_close(); ?>