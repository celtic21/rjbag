<!-- Cart -->
<section class="bgwhite p-t-70 p-b-100">
<div class="container">
<!-- Cart item -->
<div class="pos-relative">
<div class=" bgwhite">

	<h1><?php echo $title ?></h1><hr>
	<div class="clearfix"></div>
	<br><br>

	<?php if($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-warning">';
		echo $this->session->flashdata('sukses');
		echo '</div>';
	} ?>

	<p class="alert alert-success">Registrasi Telah Dilakukan ! <a  href="<?php echo base_url('masuk/logout') ?>" class="btn btn-info btn-sm"> Login di sini</a>
		Anda juga bisa melakukan Checkout  
		<a href="<?php echo base_url('belanja/checkout') ?>" class="btn btn-warning btn-sm"><i class="fa fa-shopping-cart"></i> Check Out</a>


	</p>




</div>
</div>


</div>
</section>
