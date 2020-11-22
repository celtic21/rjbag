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


		<h2><?php echo $title ?></h2>
		<hr>


		<?php 
		//kalau ada transaksi tampilkan tabel
		if($header_transaksi) { 
		?>

		<table class="table table-bordered table-md">
			<thead>
				<tr>
					<th width="20%">KODE TRANSAKSI</th>
					<th> <?php echo $header_transaksi->kode_transaksi ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>CHECKOUT</td>
					<td> <?php echo date('d-m-y',strtotime($header_transaksi->tgl_cekout)) ?></td>
				</tr>
				<tr>
					<td>Jumlah Total</td>
					<td>Rp. <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
				</tr>
				<tr>
					<td>STATUS BAYAR</td>
					<td> <?php echo $header_transaksi->status_bayar ?></td>
				</tr>
				<tr>
					<td>BUKTI BAYAR</td>
					<td> <?php if( $header_transaksi->bukti_bayar !="") { ?> 
						<img src="<?php echo base_url('assets/upload/image/'.$header_transaksi->bukti_bayar) ?>" class="img img-thumbnail" width="200">
					<?php }else{ echo 'Belum ada bukti bayar';} ?>
					</td>
				</tr>
			</tbody>
		</table>

		<?php 
		//error upload
		if(isset($error)) {
			echo '<p class="alert alert-warning">'.$error.'</p>';
		}

		// notif error
		echo validation_errors('<p class="alert alert-warning">','</p>');

		//form open
		echo form_open_multipart(base_url('dasbor/konfirmasi/' .$header_transaksi->kode_transaksi));
		?>

		<table class="table table-sm">
			<tbody>
				<tr>
					<td>Pembayaran Ke Rekening</td>
					<td>
						
						<select name="id_rekening" class="form-control">
							<?php foreach($rekening as $rekening) { ?>
							<option value="<?php echo $rekening->id_rekening ?>" 
								<?php if($header_transaksi->id_rekening==$rekening->id_rekening) 
								{ echo "selected"; } ?>>
								<?php echo $rekening->nama_bank ?> (NO. Rekening :
								<?php echo $rekening->nomor_rekening ?> a.n <?php 
									  echo $rekening->nama_pemilik ?>)
							</option>
							<?php } ?>
						</select>

					</td>
				</tr>

				<tr>
					<td>Tanggal Transfer</td>
					<td>
						<input  type="date" name="tgl_bayar" class="form-control-lg" placeholder="d-m-y"
						value="<?php 
						if(isset($_POST['tgl_bayar']))
						{ echo set_value('tgl_bayar');
						}elseif($header_transaksi->tgl_bayar!="") {
							echo $header_transaksi->tgl_bayar;
							}else{
							echo date('d-m-y'); } ?>">
				    </td>
				</tr>
			
				<tr>
					<td>Tanggal Konfirmasi</td>
					<td>
						<input readonly type="text" name="tgl_konfirmasi" class="form-control-lg" placeholder="dd-mm-yyyy"
						value="<?php 
						if(isset($_POST['tgl_konfirmasi']))
						{ echo set_value('tgl_konfirmasi');
						}else{
							echo date('d-m-y'); } ?>">
				    </td>
				</tr>
				<tr>
					<td>Jumlah Pembayaran</td>
					<td>Rp.
						<input type="number" name="jumlah_bayar" class="form-control-lg" readonly placeholder="Jumlah Pembayaran"
						value="<?php
						if(isset($_POST['jumlah_bayar'])) { echo set_value('jumlah_bayar');
						}elseif($header_transaksi->jumlah_bayar!="") {
							echo $header_transaksi->jumlah_bayar;
							}else{
							echo $header_transaksi->jumlah_transaksi;}
						 ?>">
					</td>
				</tr>
				<tr>
					<td>Dari Bank</td>
					<td>
						<input type="text" name="nama_bank" class="form-control" placeholder="Nama Bank"
						value="<?php echo $header_transaksi->nama_bank ?>">
						<small>Misal : MANDIRI</small>
					</td>
				</tr>
				<tr>
					<td>Dari No Rekening</td>
					<td>
						<input type="number" name="rekening_pembayaran" class="form-control" placeholder="Nomor Rekening"
						value="<?php echo  $header_transaksi->rekening_pembayaran ?>">
						<small>Misal : 85386538232</small>
					</td>
				</tr>
				<tr>
					<td>Nama Pemilik Rekening</td>
					<td>
						<input type="text" name="rekening_pelanggan" class="form-control" placeholder="Nama Pemilik Rekening"
						value="<?php echo  $header_transaksi->rekening_pelanggan ?>">
						<small>Misal : Andrew</small>
					</td>
				</tr>
				<tr>
					<td>Upload Bukti Bayar</td>
					<td>
						<input type="file" name="bukti_bayar" class="form-control" placeholder="Upload bukti pembayaran">
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<div class="btn-group">
							<button type="submit" class="btn btn-dark btn-md" name="submit">
								<i class="fa fa-upload"></i> Submit
							</button>
							<button type="reset" class="btn btn-warning btn-md" name="reset">
								<i class="fa fa-times"></i> Reset
							</button>
						</div>
					</td>
				</tr>
			</tbody>
		</table>

		<?php
		//form close
		echo form_close();
		//jika belum ada tampilkan notifikasi
		}else{ 
		?>

			<p class="alert alert-warning">
				<i class="fa fa-warning"></i>Belum ada Transaksi
			</p>

		<?php } ?>
		

</div>
</div>
</div>
</section>
