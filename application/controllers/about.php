<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class About extends CI_Controller {

 	public function __construct()
 	{
 		parent::__construct();
 	}
 
 	public function index()
 	{

		$data = array( 'title'		=> 'About',
			'isi'		=> 'home/about'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
 	}
 
 }
 
 /* End of file about.php */
 /* Location: ./application/controllers/about.php */ ?>