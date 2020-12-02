<!-- Cart -->
<section class="bgwhite p-t-70 p-b-100">
<div class="container">
<!-- Cart item -->
<div class="pos-relative">
<div class=" bgwhite">

	<!-- <h1><?php echo $title ?></h1><hr> -->
	<div class="clearfix"></div>
	<br><br>

	<?php if($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-warning">';
		echo $this->session->flashdata('sukses');
		echo '</div>';
	} ?>

<p class="alert alert-success">
	Terimakasih, Barang yang sudah anda beli akan segera kami proses :)
	<br>
	Silahkan lakukan
	<a href="<?php echo base_url('dasbor/belanja') ?>" class="alert-success"> konfirmasi pembayaran</a>
</p>

</div>
</div>


</div>
</section>
