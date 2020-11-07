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
 echo form_open(base_url('admin/transaksi/resi/'.$header_transaksi->kode_transaksi), 'class="form-horizontal"'); ?>



 <div class="form-group">
  <label  class="col-md-2 control-label">Kode Transaksi</label>
  <div class="col-md-5">
    <input type="text" name="kode_transaksi" class="form-control" value="<?php echo $header_transaksi->kode_transaksi ?>" readonly >
  </div>
</div>
 
 <div class="form-group">
  <label  class="col-md-2 control-label">No. Resi</label>
  <div class="col-md-5">
    <input type="text" name="resi" class="form-control" placeholder="Nomor Resi"  value="<?php echo $header_transaksi->resi ?>"required >
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