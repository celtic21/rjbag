<?php if ($this->session->userdata('level') == 'Admin') { 

redirect(base_url('admin/user/blok'),'refresh');
}

?>


<?php 
//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

//form open
echo form_open(base_url('admin/user/tambah'),' class="form-horizontal"');
 ?>

 <div class="form-group">
  <label  class="col-md-2 control-label">Nama Pengguna</label>
  <div class="col-md-5">
    <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" value="<?php echo set_value('nama') ?>" required >
  </div>
</div>

 <div class="form-group">
  <label  class="col-md-2 control-label">Username</label>
  <div class="col-md-5">
    <input type="text" name="username" class="form-control" placeholder="username" value="<?php echo set_value('username') ?>" required >
  </div>
</div>

<!-- <div class="form-group">
  <label  class="col-md-2 control-label">Jenis Kelamin</label>
  <div class="col-md-5">
  	<select name="jenis_kelamin" class="form-control">
  		<option value="laki laki">Laki laki</option>
  		<option value="perempuan">Perempuan</option>
  	</select>
  </div>
</div> -->

 <!-- radio -->
               <div class="form-group">
                <label  class="col-md-2 control-label">Jenis Kelamin</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="jenis_kelamin" id="optionsRadios1" value="Laki Laki" checked>
                      Laki Laki
                    </label>
                    &nbsp; &emsp;
                    <label>
                      <input type="radio" name="jenis_kelamin" id="optionsRadios2" value="Perempuan">
                     Perempuan
                    </label>
                  </div>
                </div>
<!-- radio -->

 <div class="form-group">
  <label  class="col-md-2 control-label">Alamat</label>
  <div class="col-md-5">
    <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo set_value('alamat') ?>" required >
  </div>
</div>

 <div class="form-group">
  <label  class="col-md-2 control-label">Telepon</label>
  <div class="col-md-5">
    <input type="number" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon') ?>" required >
  </div>
</div>



 <div class="form-group">
  <label  class="col-md-2 control-label">Password</label>
  <div class="col-md-5">
    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required >
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Hak Akses</label>
  <div class="col-md-5">
  	<select name="level" class="form-control">
  		<option value="Pemilik">Pemilik</option>
  		<option value="Admin">Admin</option>
  	</select>
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