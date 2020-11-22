<div class="clearfix"></div>
<table class="table table-bordered">
	<thead>

		<tr>
			<th width="20%">NAMA PELANGGAN</th>
			<th> <?php echo $header_transaksi->nama_pelanggan ?></th>
		</tr>
		<tr>
			<th width="20%">KODE TRANSAKSI</th>
			<th> <?php echo $header_transaksi->kode_transaksi ?></th>
		</tr>
			<tr>
			<th width="20%">NO.RESi</th>
			<th> <?php echo $header_transaksi->resi ?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>TANGGAL CHECKOUT</td>
			<td> <?php echo date('d-m-y',strtotime($header_transaksi->tgl_cekout)) ?></td>
		</tr>
		<tr>
			<td>TANGGAL BAYAR</td>
			<td> <?php echo date('d-m-y',strtotime($header_transaksi->tgl_bayar)) ?></td>
		</tr>
		<tr>
			<td>TANGGAL KONFIRMASI</td>
			<td> <?php echo date('d-m-y',strtotime($header_transaksi->tgl_konfirmasi)) ?></td>
		</tr>
		<tr>
			<td>JUMLAH TOTAL</td>
			<td>Rp. <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
		</tr>
		<tr>
			<td>STATUS BAYAR</td>
			<td> <?php echo $header_transaksi->status_bayar ?></td>
		</tr>
		<tr>
			<td>BUKTI BAYAR</td>
			<td> <?php 
				  if($header_transaksi->bukti_bayar =="") { echo 'Belum Ada';
				}else { ?>
				  <img src="<?php echo base_url('assets/upload/image/' .$header_transaksi->bukti_bayar) ?>" class="img img-thumbnail" width="200">
				<?php } ?>
		    </td>
		</tr>
		<tr>
			<td>TANGGAL BAYAR</td>
			<td> <?php echo date('d-m-y', strtotime($header_transaksi->status_bayar)) ?></td>
		</tr>
		<tr>
			<td>JUMLAH BAYAR</td>
			<td> Rp. <?php echo number_format($header_transaksi->jumlah_bayar,'0',',','.') ?></td>
		</tr>
		<tr>
			<td>PEMBAYRAN DARI</td>
			<td> <?php echo $header_transaksi->nama_bank ?> No. rekening 
				  <?php echo $header_transaksi->rekening_pembayaran ?> a.n 
				   <?php echo $header_transaksi->rekening_pelanggan ?>
				  
			</td>
		</tr>
			<tr>
			<td>PEMBAYARAN KE REKENING</td>
			<td> <?php echo $header_transaksi->bank ?> No. rekening 
				  <?php echo $header_transaksi->nomor_rekening ?> a.n
				  <?php echo $header_transaksi->nama_pemilik ?>
					
			</td>
		</tr>
	</tbody>
</table>


<hr>


<table class="table table-bordered" width="100%">
	<thead>
		<tr class="bg-success">
			<th>NO</th>
			<th>KODE</th>
			<th>NAMA PRODUK</th>
			<th>JUMLAH</th>
			<th>HARGA</th>
			<th>SUB TOTAL</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach($transaksi as $transaksi) { ?>
		<tr>
			<td><?php echo $i ?></td>
			<td><?php echo $transaksi->kode_produk ?></td>
			<td><?php echo $transaksi->nama_produk ?></td>	
			<td><?php echo number_format($transaksi->jumlah) ?></td>
			<td><?php echo number_format($transaksi->harga) ?></td>
			<td><?php echo number_format($transaksi->total_harga) ?></td>
		</tr>
		<?php $i++; } ?>
	</tbody>
</table>
<hr>
<p class="pull-right">
	<div class="btn-group pull-right">
		<a href="<?php echo base_url('admin/transaksi/cetak/' .$header_transaksi->kode_transaksi) ?>" 
			target="_blank" title="cetak" class="btn btn-info btn-sm">
			<i class="fa fa-print"></i> Cetak
		</a>
		<!-- <a href="<?php echo base_url('admin/transaksi') ?>" title="Kembali" class="btn btn-success btn-sm">
			<i class="fa fa-backward"></i> Kembali
		</a> -->
	</div>
</p>