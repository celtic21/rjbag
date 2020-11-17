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


		<h4><?php echo $title ?></h4>
		<hr>
		<!-- <p>Berikut adalah riwayat belanja anda</p> -->

		<?php 
		//kalau ada transaksi tampilkan tabel
		if($header_transaksi) { 
		?>

		<!-- <table class="table table-hover table-sm">
			<thead>
				<tr>
					<th width="20%">KODE TRANSAKSI</th>
					<th> <?php echo $header_transaksi->kode_transaksi ?></th>
				</tr>

				<tr>
					<th  width="20%">NO.RESI</th>
					<th> <?php echo $header_transaksi->resi ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>CHECKOUT</td>
					<td> <?php echo date('d-m-y',strtotime($header_transaksi->tgl_cekout)) ?></td>
				</tr>
				
				<tr>
					<td>STATUS BAYAR</td>
					<td> <?php echo $header_transaksi->status_bayar ?></td>
				</tr>
				<tr>
					<td>EKPEDISI</td>
					<td> <?php echo $header_transaksi->ekpedisi ?></td>
				</tr>
				<tr>
					<td>ESTIMASI</td>
					<td> <?php echo $header_transaksi->estimasi ?></td>
				</tr>
				<tr>
					<td>ONGKIR</td>
					<td> Rp. <?php echo number_format($header_transaksi->ongkir) ?></td>
				</tr>
				<tr>
					<td>JUMLAH TOTAL</td>
					<td> Rp. <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
				</tr>
				
			</tbody>
		</table> -->

		 <div class="row">
        <div class="col-sm-12">
      </div>
  
    
        <div class="col-md-6 invoice-col">
          	<p>Kode Transaksi &nbsp;: <?php echo $header_transaksi->kode_transaksi ?></p>
            <p>NO.RESI &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <?php echo $header_transaksi->resi ?></p>
            <p>CHECKOUT &nbsp; &nbsp; &nbsp; &nbsp;: <?php echo date('d-m-y',strtotime($header_transaksi->tgl_cekout)) ?></p>
            <p>STATUS BAYAR &nbsp;: <?php echo $header_transaksi->status_bayar ?></p>
            
        
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
        <div class="col-md-6 invoice-col">
         	<p>Kurir &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;: <?php echo $header_transaksi->ekpedisi ?></p>
            <p>Ongkir &nbsp; &nbsp; &nbsp;: <?php echo number_format($header_transaksi->ongkir) ?></p>
            <p>Estimasi &nbsp;: <?php echo $header_transaksi->estimasi ?></p>
        </div>
        <!-- /.col -->
      </div>

<br>
		<table class="table table-bordered table-sm">
			<thead>
				<tr class="bg-light">
					<th  style="text-align: center">NO</th>
					<th  style="text-align: center">KODE</th>
					<th  style="text-align: center">NAMA PRODUK</th>
					<th  style="text-align: center">JUMLAH</th>
					<th  style="text-align: center">HARGA</th>
					<th  style="text-align: center">TOTAL</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; foreach($transaksi as $transaksi) { ?>
				<tr>
					<td  style="text-align: center"><?php echo $i ?></td>
					<td  style="text-align: center"><?php echo $transaksi->kode_produk ?></td>
					<td ><?php echo $transaksi->nama_produk ?></td>	
					<td  style="text-align: center"><?php echo number_format($transaksi->jumlah) ?></td>
					<td  >Rp.<?php echo number_format($transaksi->harga) ?></td>
					<td  >Rp.<?php echo number_format($transaksi->total_harga) ?></td>
				</tr>
				<?php $i++; } ?>
			</tbody>
		</table>

		<?php
		//jika belum ada tampilkan notifikasi
		}else{ 
		?>

			<p class="alert alert-warning">
				<i class="fa fa-warning"></i>Belum ada Transaksi
			</p>

		<?php } ?>

		<style>p.indent{ padding-left: 1.8em }</style>
		

</div>
</div>
</div>
</section>
