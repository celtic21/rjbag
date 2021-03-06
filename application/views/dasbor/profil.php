<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
<div class="row">
<div class="col-sm-6 col-md-3 col-lg-3 p-b-50">
	<div class="leftbar p-r-20 p-r-0-sm">
		<!--  --> 
<?php include('menu.php') ?>	

</div>
</div>

<div class="col-sm-6 col-md-9 col-lg-9 p-b-50">


		<h5><?php echo $title ?></h5>
		<br>
		
				<?php 
				//notifikasi
				if($this->session->flashdata('sukses')) {
				echo '<div class="alert alert-success">';
				echo $this->session->flashdata('sukses');
				echo '</div>';
				}


				//display error
				echo validation_errors('<div class="alert alert-warning">','</div>');

				//form open
				echo form_open(base_url('dasbor/profil'), 'class="leave-comment"'); ?>

				<table class="table table-sm">
					<tbody>
						<tr>
							<td>Nama</td>
							<th><input type="text" name="nama_pelanggan" class="form-control" placeholder="NAMA Lengkap"
							value="<?php echo $pelanggan->nama_pelanggan ?>" required></th>			
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="email" name="email" class="form-control" placeholder="Email"
							value="<?php echo $pelanggan->email ?>" readonly></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="password" class="form-control" placeholder="Password">
							<span class="text-warning">* Ketik minimal 6 karakter baru untuk mengganti password baru</span>
						</td>
						</tr>
						<tr>
							<td>Telepon</td>
							<td><input type="text" name="telepon" class="form-control" placeholder="Telepon"
							value="<?php echo $pelanggan->telepon ?>" required></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td><input type="text" name="alamat" class="form-control" placeholder="Telepon"
							value="<?php echo $pelanggan->alamat ?>" required></td>
						</tr>
						<td></td>
						<td colspan="" rowspan="" headers=""></td>

					</tbody>
				</table>

			
								<button class="btn btn-dark btn-md pull-right" type="submit">
									<i class="fa fa-save"></i> Update Profil
								</button>


				<?php echo form_close(); ?>

</div>
</div>
</div>
</section>
