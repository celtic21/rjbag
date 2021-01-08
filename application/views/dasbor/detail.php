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

		 <div class="row">
        <div class="col-sm-12">
      </div>
  
    
        <div class="col-md-6 invoice-col">
          	<p >Kode Transaksi &ensp;&nbsp;: <?php echo $header_transaksi->kode_transaksi ?></p>
            <p>NO.RESI &emsp;&emsp;&emsp;&emsp;: <?php echo $header_transaksi->resi ?></p>
            <p>CHECKOUT &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo date('d-m-y',strtotime($header_transaksi->tgl_cekout)) ?></p>
            <p>STATUS BAYAR &ensp;&nbsp;: <?php echo $header_transaksi->status_bayar ?></p>
            
        
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
        <div class="col-md-6 invoice-col">
         	<p>Kurir &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;: <?php echo $header_transaksi->ekpedisi ?></p>
         	<p>Berat &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;: <?php echo $header_transaksi->berat_total ?> Kg</p>
            <p>Ongkir &nbsp; &nbsp; : Rp. <?php echo number_format($header_transaksi->ongkir) ?></p>
            <p>Estimasi &nbsp;: <?php echo $header_transaksi->estimasi ?></p>
        </div>
        <!-- /.col -->
      </div>

<br>

		<table class="table table-bordered table-sm">
			<thead>
				<tr class="bg-light">
					<th  style="text-align: center">NO</th>
					<!-- <th  style="text-align: center">KODE</th> -->
					<th  style="text-align: center">NAMA PRODUK</th>
					<th  style="text-align: center">JUMLAH</th>
					<th  style="text-align: center">BERAT</th>
					<th  style="text-align: center">TOTAL BERAT</th>
					<th  style="text-align: center">HARGA</th>
					<th  style="text-align: center">TOTAL</th>
				</tr>
			</thead>
			<tbody>
				<?php 


				 ?>
				
				<?php $i=1; foreach($transaksi as $transaksi) { ?>
				<tr>
					<?php 
					$berat = $transaksi->berat;
					$jml  = $transaksi->jumlah;
					$satuan = $berat / $jml;
					 ?>

					<td  style="text-align: center"><?php echo $i ?></td>				
					<td ><?php echo $transaksi->nama_produk ?></td>	
					<td  style="text-align: center"><?php echo number_format($transaksi->jumlah) ?></td>
					<td  style="text-align: center"><?php echo $satuan ?> kg</td>
					<td  style="text-align: center"><?php echo $transaksi->berat ?> kg</td>
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
<style>.tab { 
       display:inline-block; 
       margin-left: 40px; 
}</style>