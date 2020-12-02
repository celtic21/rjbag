<?php
//notifikasi
if ($this->session->flashdata('sukses')) {
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}
?>

<table class="table table-bordered" width="100%" id="example1">
	<thead>
		<tr class="bg-success" >
			<th style="text-align: center">NO</th>
			<th style="text-align: center">PELANGGAN</th>
			<th style="text-align: center">KODE</th>
			<th style="text-align: center">NO.RESI</th>
			<th style="text-align: center">TANGGAL</th>
			<th style="text-align: center">TOTAL</th>
			<th style="text-align: center">ITEM</th>
			<th style="text-align: center">STATUS</th>
			<th width="25%" style="text-align: center">ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach($header_transaksi as $header_transaksi) { ?>
		<tr>

			<td style="text-align: center"><?php echo $i ?></td>
			<td style="text-align: center"><?php echo $header_transaksi->nama_pelanggan ?>
				<!-- <br><small>
				    Telepon : <?php echo $header_transaksi->telepon ?>
					<br>Email: <?php echo $header_transaksi->email ?>
					<br>Alamat : <?php echo nl2br($header_transaksi->alamat) ?>
				</small> -->
			</td>
			<td style="text-align: center"><?php echo $header_transaksi->kode_transaksi ?></td>
			<td style="text-align: center"><?php echo $header_transaksi->resi ?></td>
			<td style="text-align: center"><?php echo date('d-m-y',strtotime($header_transaksi->tgl_cekout)) ?></td>	
			<td style="text-align: center"><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
			<td style="text-align: center"><?php echo $header_transaksi->total_item ?></td>
			<td style="text-align: center"><?php echo $header_transaksi->status_bayar ?></td>		
			<td style="text-align: center">
				<div class="btn-group">
			
					<a href="<?php echo base_url('admin/transaksi/detail/' .$header_transaksi->kode_transaksi) ?> " 
					class="btn btn-sm" style="background-color:#4E85DD; color: white;"><i class="fa fa-eye"></i> Detail</a>

					<a href="<?php echo base_url('admin/transaksi/kirim/' .$header_transaksi->kode_transaksi) ?> " 
					 class="btn btn-sm" style="background-color:#E25760; color: white;"><i class="fa  fa-truck"></i> Pengiriman</a>	

					<a href="<?php echo base_url('admin/transaksi/resi/' .$header_transaksi->kode_transaksi) ?> " 
					class="btn btn-sm" style="background-color:#3CDA9D; color: white;"><i class="fa fa-check"></i> No.Resi</a>		
				</div>
				<div class="crearfix"></div>
				
				<div class="btn-group" >
			
					<!-- <a href="<?php echo base_url('admin/transaksi/pdf/' .$header_transaksi->kode_transaksi) ?> " 
					class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Unduh PDF</a>

					<a href="<?php echo base_url('admin/transaksi/cetakkirim/' .$header_transaksi->kode_transaksi) ?> " 
					target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-truck"></i> Pengiriman</a>	 -->

					<!-- <a href="<?php echo base_url('admin/transaksi/word/' .$header_transaksi->kode_transaksi) ?> " 
					class="btn btn-warning btn-sm"><i class="fa fa-file-word-o"></i> Word</a>  -->
							
				</div>
			</td>
		</tr>
		<?php $i++; } ?>
	</tbody>
</table>