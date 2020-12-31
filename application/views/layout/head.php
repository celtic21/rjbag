<?php 
//load konfigurasi web
$site  =  $this->konfigurasi_model->listing();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>

<script src="<?php echo base_url() ?>assets/template/js/jquery-3.5.1.min.js"></script>


	<title><?php echo $title ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<!-- icon -->
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/upload/image/' .$site->icon) ?>"/>
<!-- seo google -->
	<meta name="deskripsi" content="<?php echo $title ?>, <?php echo $site->deskripsi ?>">


<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/css/main.css">
<!--===============================================================================================-->
<style type="text/css" media="screen">


	.pagination a, .pagination b{
		padding: 10px 20px;
		text-decoration: none;
		float: left;
	}
	
	.pagination a {
		background-color: #D42430;
		color: white;
	}

	.pagination b{
		background-color: black;
		color: white;
	}

	.pagination a:hover{
		background-color: black;
	}
	.wrap_header {

    /* background-color: #D42430;
	 */}

	p {
    font-family: Montserrat-Regular;
    font-size: 15px;
    line-height: 1.7;
    color: #000000;
    margin: 0px;
}
.topbar {
    height: 45px;
    background-color: #f5f5f5;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

.header-wrapicon1 img, .header-wrapicon2 img {
    height: 100%;
    color: white;
}

.form-control:disabled, .form-control[readonly] {
    background-color: transparent;
    opacity: 1;
}
.s-text13 {
    font-family: Montserrat-Regular;
    font-size: 15px;
    color: #000000;
    line-height: 1.8;
}
.form-control {
    display: block;
    width: 100%;
    padding: .5rem .75rem;
    font-size: 1.1rem;
    line-height: 1.25;
    color: #495057;
    background-color: #fff;
    background-image: none;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: .25rem;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}

</style>

</head>
<body class="animsition">