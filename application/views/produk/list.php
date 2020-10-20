<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url() ?>assets/tampilan/slide3.jpg);">
<h2 class="l-text2 t-center">
<?php echo $title ?>
</h2>
<p class="m-text13 t-center">
<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>
</p>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
<div class="row">
<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
	<div class="leftbar p-r-20 p-r-0-sm">
		<!--  -->
		<h4 class="m-text14 p-b-7">
			Kategori Produk
		</h4>

		<ul class="p-b-54">
			<?php foreach($listing_kategori as $listing_kategori) { ?>
			<li class="p-t-4">
				<a href="<?php echo base_url('produk/kategori/' .$listing_kategori->slug_kategori) ?>" class="s-text13 active1">
					<?php echo $listing_kategori->nama_kategori; ?>
				</a>
			</li>
			<?php } ?>
		</ul>

		<h4 class="m-text14 p-b-32">
							Filters
						</h4>

						<div class="filter-price p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-17">
								Price
							</div>

							<div class="wra-filter-bar">
								<div id="filter-bar"></div>
							</div>

							<div class="flex-sb-m flex-w p-t-16">
								<div class="w-size11">
									<!-- Button -->
									<button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
										Filter
									</button>
								</div>

								<div class="s-text3 p-t-10 p-b-10">
									Range: IDR<span id="value-lower">100000</span> - IDR<span id="value-upper">1000000</span>
								</div>
							</div>
						</div>
	</div>
</div>

<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

	<!-- Product -->
	<div class="row">
		<?php foreach($produk as $produk) {?>

		<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

	<!-- form proses belanja -->
	<?php echo form_open(base_url('belanja/add')); 
	//elemen yg dibawa
	echo form_hidden('id', $produk->id_produk);
	echo form_hidden('qty', 12);
	echo form_hidden('price', $produk->harga);
	echo form_hidden('name', $produk->nama_produk);
	//elemen redirect
	echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));
	?>

			<!-- Block2 -->
			<div class="block2">
				<div class="block2-img wrap-pic-w of-hidden pos-relative">
					<img src="<?php echo base_url('assets/upload/image/thumbs/' .$produk->gambar) ?>" 
					alt="<?php echo $produk->nama_produk ?>">

					<div class="block2-overlay trans-0-4">
						<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
							<i class="fa fa-eye" aria-hidden="true"></i>
							<i class="fa fa-eye dis-none" aria-hidden="true"></i>
						</a>

						<div class="block2-btn-addcart w-size1 trans-0-4">
							<!-- Button -->
							<button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
							Add to Cart
							</button>
						</div>
					</div>
				</div>

				<div class="block2-txt p-t-20">
					<a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
					<?php echo $produk->nama_produk ?>
				</a>

					<span class="block2-price m-text6 p-r-5">
					<b>	IDR <?php echo number_format($produk->harga,'0',',','.') ?></b>
					</span>
					
				</div>
			</div>
			<!-- closing form --> 
			<?php echo form_close(); ?>
		</div>
	<?php 
	}
	?>
		
	</div>

	<!-- Pagination -->
	<div class="pagination flex-m flex-w p-t-26 text-center">
		<?php echo $pagin; ?>
	</div>
</div>
</div>
</div>
</section>
