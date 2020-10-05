<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

// load model
public function __construct()
{
	parent::__construct();
	$this->load->model('kategori_model');
	//proteksi halaman
	$this->simple_login->cek_login();
}






//data kategori
	public function index()
	{
		$kategori = $this->kategori_model->listing();
		$data = array(  'title'     => 'Data Kategori',
					    'kategori'  => $kategori,
						'isi'	    => 'admin/kategori/list'
	);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}







public function tambah()
	{
		//validasi input
		$valid = $this->form_validation;


		$valid->set_rules('nama_kategori','Nama Kategori','required|is_unique[tb_kategori.nama_kategori]',
			array('required'    => '%s harus diisi',
				  'is_unique'	=> '%s sudah ada. Buat kategori baru!'));

		
		if($valid->run()){
			$config['upload_path']   = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']      = '2400'; //dalam kb
			$config['max_width']     = '2024';
			$config['max_height']    = '2024';
			  
			$this->load->library('upload', $config);
		


			if ( ! $this->upload->do_upload('gambar')){
				//end validasi

				$data = array(  'title' => 'Tambah Kategori produk',
						        'error'		=> $this->upload->display_errors(),
								'isi'	=> 'admin/kategori/tambah'
							);
				$this->load->view('admin/layout/wrapper', $data, FALSE);
			}else{

				$upload_gambar = array('upload_data' => $this->upload->data());
				

				//buat thumbnail
				$config['image_library'] 	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
				// lokasi folder thumbnail
				$config['new_image']		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width']         	= 250;//pxl
				$config['height']       	= 250;//pxl
				$config['thumb_marker']		= '';

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();
				//end thumbnail
				$i    = $this->input;
				$slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
				$data = array ( 'slug_kategori'    => $slug_kategori,
								'nama_kategori'    => $i->post('nama_kategori'),
								'urutan'    	   => $i->post('urutan'),
								'gambar'   		   => $upload_gambar['upload_data']['file_name']
				);
				$this->kategori_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Data telah ditambah');
				redirect(base_url('admin/kategori'),'refresh');
		}}
	
	$data = array(  'title'     => 'Tambah Produk',
					'isi'	    => 'admin/kategori/tambah'
				 );
	$this->load->view('admin/layout/wrapper', $data, FALSE);
		//end masuk database
	}







	//edit kategori
	public function edit($id_kategori)
	{
		$kategori = $this->kategori_model->detail($id_kategori);

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori','Nama Kategori','required',
			array('required'   => '%s harus diisi'));

		if($valid->run()){
			// check jika gambar di ganti
			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path']   = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']      = '2400'; //dalam kb
			$config['max_width']     = '2024';
			$config['max_height']    = '2024';
			  
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
		//end validasi


		$data = array(  'title' => 'Edit Kategori',
						'error'		=> $this->upload->display_errors(),
						'kategori'	=> $kategori,
						'isi'	=> 'admin/kategori/edit'
	);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());

		//buat thumbnail
		$config['image_library'] 	= 'gd2';
		$config['source_image'] 	= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
		// lokasi folder thumbnail
		$config['new_image']		= './assets/upload/image/thumbs/';
		$config['create_thumb'] 	= TRUE;
		$config['maintain_ratio'] 	= TRUE;
		$config['width']         	= 250;//pxl
		$config['height']       	= 250;//pxl
		$config['thumb_marker']		= '';

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
		//end thumbnail
		$i 			   = $this->input;
		$slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
		$data 		   = array ( 'id_kategori'	 => $id_kategori,
							  	 'slug_kategori' => $slug_kategori,
							     'nama_kategori' => $i->post('nama_kategori'),
							   	 'urutan'        => $i->post('urutan'),
							   	 'gambar'   		   => $upload_gambar['upload_data']['file_name']
							   );

		$this->kategori_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diedit');
		redirect(base_url('admin/kategori'),'refresh');
	}}else{
		$i 			   = $this->input;
		$slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
		$data 		   = array ( 'id_kategori'	 => $id_kategori,
							  	 'slug_kategori' => $slug_kategori,
							     'nama_kategori' => $i->post('nama_kategori'),
							   	 'urutan'        => $i->post('urutan')
							   	// 'gambar'   		   => $upload_gambar['upload_data']['file_name']
							   );

		$this->kategori_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diedit');
		redirect(base_url('admin/kategori'),'refresh');
	//end masuk database
	}}
	$data = array(  	'title'     => 'Edit Kategori: ',
						'kategori'	=> $kategori,
				
						'isi'	    => 'admin/kategori/edit'
					 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}







	//delete data kategori
	public function delete($id_kategori)
	{
		$data = array ('id_kategori' => $id_kategori);
		$this->kategori_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/kategori'),'refresh');
	}






}

/* End of file Kategori.php */
/* Location: ./application/controllers/admin/Kategori.php */