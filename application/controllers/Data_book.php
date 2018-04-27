<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/

class Data_book extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('data_book_m');
	}

	public function index() {
		$data = array(
			'content'	=> 'data_book_v',
			'data' 		=> $this->data_book_m->getAll(),
			'cap'		=> $this->buat_captcha()
		);
		$_SESSION['keyCapt'] = $data['cap']['word'];
		$this->load->view('template/layout', $data);
	}

	public function daftar() {

		if($_SESSION['keyCapt'] != $this->input->post('captcha')) {
			$this->session->set_flashdata('msg', 'Captcha Salah!');
			redirect(base_url());
			exit;
		}

		$cek = $this->data_book_m->cek_user($this->input->post('email'));
		if ($cek) {
			$this->session->set_flashdata('msg', 'maaf email sudah terdaftar.');
			redirect(base_url());
			exit;
		}
		
		$input = array (
			'nama' 	=> $this->input->post('nama'),
			'email'	=> $this->input->post('email'),
			'telp' 	=> $this->input->post('telp')
		);

		$this->data_book_m->insert($input);
		$this->session->set_flashdata('msg', 'Data berhasil ditambahkan.');
		redirect(base_url());
	}


	public function Edit($pk) {

		$data['data'] 		= $this->data_book_m->select($pk)->row();
		$data['content'] 	= 'data_book_edit';

		if ($this->input->post('email')) {
			$input = array (
				'nama' 	=> $this->input->post('nama'),
				'email'	=> $this->input->post('email'),
				'telp' 	=> $this->input->post('telp')
			);

			$this->data_book_m->update($pk, $input);
			$this->session->set_flashdata('msg', 'Data berhasil di edit.');
			redirect('data_book/edit/'.$data['data']->id);	
		}

		
		$this->load->view('template/layout', $data);
		
		
	}

	public function Delete($pk) {
		$this->data_book_m->delete($pk);
		$this->session->set_flashdata('msg', 'Data berhasil di hapus.');
		redirect('data_book/view_list');
	}

	public function view_list() {
		$this->load->library('pagination');
		$config['base_url'] = base_url('data_book/view_list'); //site url
        $config['total_rows'] = $this->data_book_m->getRow(); //total row
        $config['per_page'] = 2;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->data_book_m->list($config["per_page"], $data['page']);           
 		$data['content']	= 'data_book_list';
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('template/layout',$data);
	}


	function buat_captcha()
	{                                
	    $expiration = time()-300; // Two hour limit
	    $this->db->query("DELETE FROM captca WHERE time < ".$expiration);
	    $vals = array(
	                //'word'         => 'Random word',
	                'word_length' => 4,
	                'img_path' => './assets/captcha/',
	                'img_url' => base_url().'assets/captcha/',
	                'font_path' => './system/fonts/texb.ttf',
	                'img_width' => '150',
	                'img_height' => '50',
	                'expiration' => '3600'
	            );

	    $cap = create_captcha($vals);

	    //puts in the db
	    $captchadata = array(
	                'id'    => '',
	                'time'  => $cap['time'],
	                'ip'    => $this->input->ip_address(),
	                'word'  => $cap['word']
	            );

	    $query = $this->db->insert_string('captca', $captchadata);
	    $this->db->query($query);

	    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') echo $cap['image'];
	    else return $cap;
	}
}