<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
<div class="container">
	<!-- Cart item -->
	<div class="container-table-cart pos-relative">
		<div class="wrap-table-shopping-cart bgwhite">

			<!-- <h1><?php echo $title ?></h1> -->
			<div class="clearfix"></div>
			

			<?php if($this->session->flashdata('sukses')) {
				echo '<div class="alert alert-warning">';
				echo $this->session->flashdata('sukses');
				echo '</div>';
			} ?>

		
			<table class="table-shopping-cart">
				<tr class="table-head" align="center">
					<th class="column-1"			>GAMBAR</th>
					<th class="column-2"			>PRODUK</th>
					<th class="column-3"			>HARGA</th>
					<th class="column-4 p-l-70"		>JUMLAH</th>
					<th class="column-5" width="15%">SUB TOTAL</th>
					<th class="column-6" width="20%">ACTION</th>
				</tr>

				<!-- looping data keranjang -->
				<?php 
				foreach($keranjang as $keranjang) {
					//ambil data produk
					$id_produk = $keranjang['id'];
					$produk    = $this->produk_model->detail($id_produk);

					//form update
					echo form_open(base_url('belanja/update_cart/' .$keranjang['rowid']));

				?>

				<tr class="table-row">
					<td class="column-1">
						<div class="cart-img-product b-rad-4 o-f-hidden">
							<img src="<?php echo base_url('assets/upload/image/thumbs/' .$produk->gambar) ?>" 
							alt="<?php echo $keranjang['name'] ?>">
						</div>
					</td>
					<td class="column-2"><?php echo $keranjang['name'] ?></td>
					<td class="column-3">Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?></td>
					<td class="column-4" align="center">
						<div class="flex-w bo5 of-hidden w-size17" >
							<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
								<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
							</button>

							<input class="size8 m-text18 t-center num-product" min="12" max="<?php echo $produk->stok?>" type="number" name="qty" value="<?php echo $keranjang['qty'] ?>">

							<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
								<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
							</button>
						</div>
					</td>
					<td class="column-5" align="left">Rp. 
						<?php  $sub_total = $keranjang['price'] * $keranjang['qty'];
						echo number_format($sub_total,'0',',','.');
						?>
					</td>
					<td>
						<button type="submit" name="update" class="btn btn-success btn-sm btn-dark">
							<i class="fa fa-edit"></i> Update
						</button>

						<a href="<?php echo base_url('belanja/hapus/' .$keranjang['rowid']) ?>"  
						  class="btn  btn-sm" style="background-color:#ad1d35; color: white;">
							<i class="fa fa-trash-o"></i> Hapus
						</a>
					</td>
				</tr>
				<?php 
				//form close
				echo form_close();
				//end looping
				}
				?>
				<tr class="table-row bg-light" style="font-weight: bold; color;white !important;">
					<td colspan="4" class="column-1">Total Belanja</td>
					<td colspan="2" class="column-2">Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?></td>
				</tr>

			</table>
		
				
			</div>
		</div>
		<br>
			<p class="pull-right">
				<a href="<?php echo base_url('belanja/hapus') ?>" class="btn btn-md" style="background-color:#ad1d35; color: white;">
				<i class="fa fa-trash-o"></i> Bersihkan keranjang belanja
		    	<a/>

		    	<a href="<?php echo base_url('belanja/checkout') ?>" class="btn btn-dark btn-md">
				<i class="fa fa-shopping-cart "></i> CheckOut
		    	<a/>

			</p>

		</div>
	</div>

	
		
	
</div>
</section>
