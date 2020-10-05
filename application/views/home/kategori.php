<!-- Banner -->
<section class="banner bgwhite p-t-40 p-b-40">
<div class="container">
<div class="row"> 

		<?php foreach($kategori as $kategori) { ?>
		<!-- block1 -->
		<div class="block1 hov-img-zoom m-b-30 col-md-4" >
			<img src="<?php echo base_url('assets/upload/image/' .$kategori->gambar) ?>"  alt="IMG-BENNER">

			<div class="block1-wrapbtn w-size2">
				<!-- Button -->
				<a href="<?php echo base_url('produk/kategori/'.$kategori->slug_kategori) ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
					<?php echo $kategori->nama_kategori ?>
				</a>
			</div>
		</div>
	<?php } ?>
 

	
	</div>

	
	</div>
</div>
</div>
</section> 