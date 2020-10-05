<?php if ($this->session->userdata('level') == 'Admin') { 

redirect(base_url('admin/user/blok'),'refresh');
}

?>



<p>
	<a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-success btn lg">
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

<table class="table table-bordered" id="example1"> 
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Alamat</th>
			<th>Telepon</th>
			<th>Username</th>
			<th>level</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($user as $user) {?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $user->nama ?></td>
			<td><?php echo $user->jenis_kelamin ?></td>
			<td><?php echo $user->alamat ?></td>
			<td><?php echo $user->telepon ?></td>
			<td><?php echo $user->username ?></td>
			<td><?php echo $user->level ?></td>
			<td>
				<a href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>" class= "btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit </a> 

					<a href="<?php echo base_url('admin/user/delete/'.$user->id_user) ?>" class= "btn btn-danger btn-xs" onclick="return confirm ('yakin ingin menghapus data ini ?')"><i class="fa fa-trash-o"></i> Hapus </a> 
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>