<?php if ($this->session->userdata('level') == 'Admin') { 

redirect(base_url('admin/user/blok'),'refresh');
}

?>

<p>
	<a href="<?php echo base_url('admin/rekening/tambah') ?>" class="btn btn-success btn lg">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>

<?php
//notifikasi
if ($this->session->flashdata('sukses')) {
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}
?>

<table class="table table-bordered" id="example1" style="text-align: center"> 
	<thead>
		<tr>
			<th style="text-align: center">NO</th>
			<th style="text-align: center">NAMA BANK</th>
			<th style="text-align: center">NOMOR REKENING</th>
			<th style="text-align: center">PEMILIK</th>
			<th style="text-align: center">ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($rekening as $rekening) {?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $rekening->nama_bank ?></td>
			<td><?php echo $rekening->nomor_rekening ?></td>
			<td><?php echo $rekening->nama_pemilik ?></td>
			<td>
				<a href="<?php echo base_url('admin/rekening/edit/'.$rekening->id_rekening) ?>" class= "btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit </a> 

					<a href="<?php echo base_url('admin/rekening/delete/'.$rekening->id_rekening) ?>" class= "btn btn-danger btn-sm" onclick="return confirm ('yakin ingin menghapus data ini ?')"><i class="fa fa-trash-o"></i> Hapus </a> 
			</td>
		</tr>
	<?php $no++;} ?>
	</tbody>
</table>