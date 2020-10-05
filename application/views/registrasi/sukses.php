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

	<p class="alert alert-success">Registrasi Telah Dilakukan ! <a href="<?php echo base_url('masuk') ?>" class="btn btn-info btn-sm"> Login di sini</a>
		Anda juga bisa melakukan Checkout  
		<a href="<?php echo base_url('belanja/checkout') ?>" class="btn btn-warning btn-sm"><i class="fa fa-shopping-cart"></i> Check Out</a>


	</p>




</div>
</div>

<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
<div class="flex-w flex-m w-full-sm">
<!-- 	<div class="size11 bo4 m-r-10">
		<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
	</div>

	<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
	
		<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
			Apply coupon
		</button>
	</div> -->
</div>

<div class="size10 trans-0-4 m-t-10 m-b-10">
	<!-- Button -->


</div>
</div>


</div>
</section>
