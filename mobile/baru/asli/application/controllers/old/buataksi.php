<?php
 
class Buataksi extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//$this->load->model('buataksi','',TRUE);
	}
 
	public function index(){				
		$this->load->helper('form');
		$this->load->library('form_validation');		
		$data['title'] = 'Create a news item';
		$this->form_validation->set_rules('judul', 'judul', 'required');
		$this->form_validation->set_rules('cat', 'cat', 'required');
		$this->load->view('header', $data );
		if ($this->form_validation->run() === FALSE)
		{ 
		$this->load->view('buat-aksi_v');
		}
		else
		{
		//if validation is true, calling the model, inserting data and shows the success page
		//$this->load->model('buataksi_m');
		//$this->load->view('views_test/success', $data);
			$this->load->model('Buataksi_m');
			$this->site_model->insert_aksi();
			$this->load->view('success');//loading success view
		
		}
		$this->load->view('footer');
	}
	
}