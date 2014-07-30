<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
class Partner extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//$this->load->library('auth');
		$this->load->model(array('partner_m'));
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}
	public function Index(){
		$data= array(
			'title' => 'Register Partner'
		);
		$this->load->view('partner/header', $data);
		$this->load->view('partner/register-partner_v');
	}
	public function join_partner(){
		$data= array(
			'title' => 'Register Partner'
		);
		$this->load->view('partner/header', $data);
		$this->load->view('partner/register-partner_v');
	}

	public function register(){
		if($this->session->userdata('logged_partner'))
	   {
		   redirect ('partner/home');
	        
	    }else{
	   //This method will have the credentials validation
	   $this->load->library('form_validation');
	   $this->load->helper(array('form', 'url'));
		$this->form_validation->set_rules('owner', 'Owner', 'trim|required|xss_clean');
		$this->form_validation->set_rules('perusahaan', 'perusahaan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('bidang', 'HP', 'trim|required|xss_clean');
		$this->form_validation->set_rules('type', 'Gudness Partner', 'trim|required|xss_clean');
		$this->form_validation->set_rules('handphone', 'Handphone', 'trim|required|xss_clean');	   
	   $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
	
	   if($this->form_validation->run() == FALSE)
	   {
		 //Field validation failed.  User redirected to login page
		 //$this->load->view('login_view');
		 	$data= array(
			'title' => 'Register Partner'
			);
			$this->load->view('partner/header', $data);
			$this->load->view('partner/register-partner_v');
	   }
	   else
	   {
		     //Field validation succeeded.  Validate against database
	   $owner = $this->input->post('owner');
	   $perusahaan = $this->input->post('perusahaan');
	   $bidang = $this->input->post('bidang');
	   $type = $this->input->post('type');
	   $photoimg = $this->input->post('photoimg');
	   $handphone = $this->input->post('handphone');
	   $password = $this->input->post('password');
	   $email1 = $this->input->post('email');
	   
	   $config['upload_path'] = './upload/partner/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '1024';
		$config['encrypt_name']= true;
		//var_dump($filename);
		$field_name = "photoimg";
		$this->load->library('upload', $config);
		//$filename = $this->upload->data();
			
		if ( ! $this->upload->do_upload($field_name))
		{
			$error = array('title' => $this->upload->display_errors());
			$data= array(
				'title' => 'Register Partner',
				'error' => $this->upload->display_errors(),
				'owner' => $owner,
				'perusahaan' => $perusahaan,
				'bidang' => $bidang,
				'type' => $type,
				'email' => $email,
				'handphone' => $handphone,
			);
			$this->load->view('partner/header', $data);
			$this->load->view('partner/register-partner_v');
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$dat = $this->upload->data();
			$filename = $dat['file_name'];
		    $this->load->model('partner_m','',TRUE);
	   		$result = $this->partner_m->register($owner, $perusahaan, $bidang, $type, $email1, $handphone, $password,$filename);
		
		 }
		 //Go to private area
		 //redirect('home', 'refresh');
	   }
	
	 }
	}

	public function redeem()
	 {
		 
	 }
	public function new_product()
	 {
	   //This method will have the credentials validation
	   $this->load->library('form_validation');
	   $this->load->helper(array('form', 'url'));
		$this->form_validation->set_rules('namapartner', 'Nama Partner', 'trim|required|xss_clean');
		$this->form_validation->set_rules('product', 'Product', 'trim|required|xss_clean');
		$this->form_validation->set_rules('poin', 'Poin', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('tersedia', 'Tersedia', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('desk', 'Desk', 'trim|required|xss_clean');
	
	   if($this->form_validation->run() == FALSE)
	   {
		 //Field validation failed.  User redirected to login page
		 //$this->load->view('login_view');
		  $namapartner = $this->input->post('namapartner');
		   $product = $this->input->post('product');
		   $poin = $this->input->post('poin');
		   $tersedia = $this->input->post('tersedia');
		   $desk = $this->input->post('desk');
		 $data = array(
			'title' =>'Login dan kumpulkan gudness poin di ayopeduli.com!',
			'namapartner' => $namapartner,
			'product' => $product,
			 'poin' => $poin,
			 'tersedia' => $tersedia,
			 'desk' => $desk
			);
			$this->load->view('admin/header',$data);
			$this->load->view('admin/dashboard_v',$data);
			$this->load->view('admin/footer');
	   }
	   else
	   {
		     //Field validation succeeded.  Validate against database
	   $namapartner = $this->input->post('namapartner');
		$product = $this->input->post('product');
		$poin = $this->input->post('poin');
		$tersedia = $this->input->post('tersedia');
		$desk = $this->input->post('desk');
	   $photoimg = $this->input->post('photoimg');
	   
	   $config['upload_path'] = './upload/product/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '1024';
		$config['encrypt_name']= true;
		//var_dump($filename);
		$field_name = "photoimg";
		$this->load->library('upload', $config);
		//$filename = $this->upload->data();
			
		if ( ! $this->upload->do_upload($field_name))
		{
			//$error = array('title' => $this->upload->display_errors());
			$datas = (array(
				'error' => $this->upload->display_errors(),
				'namapartner' => $namapartner,
				'product' => $product,
				 'poin' => $poin,
				 'tersedia' => $tersedia,
				 'desk' => $desk				
			));			
			
			//list donasi
			$this->load->model(array('donasi_m'));
			$datas['aksi_donasi_all'] = $this->donasi_m->getdonasi();
			$datas['donasi_approve'] = $this->donasi_m->getdonasiapprove();
			$this->load->model(array('aksi_m'));
			$datas['aksi'] = $this->aksi_m->getaksiadmin();
			//$datas['sum'] = $this->donasi_m->getdonasi();	
			//var_dump($data['donasi'] = $this->donasi_m->getdonasi());
			$data = array(
				'title' =>'Halaman Admin nih!',
			);		
			$this->load->view('admin/header', $data);
			$this->load->view('admin/dashboard_v', $datas);
			$this->load->view('admin/footer');	
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$dat = $this->upload->data();
			$filename = $dat['file_name'];
	   //query the database
	   //$sess_array = array();		
//		//foreach($result as $row)
//		$sess_array = array(				 
//				 'email' => $email,
//				 'fullname' => $fullname
//			   );
		//$this->session->set_userdata('logged_in', $sess_array);
		//var_dump($sess_array);
	    $this->load->model('partner_m','',TRUE);
	   	$result = $this->partner_m->insertproduct($namapartner, $product, $poin, $tersedia, $desk, $filename);
		//$error = array('title' => $this->upload->display_errors());
			$datas = (array(
				'success' => "Product berhasil di masukan dan siap di redeem",				
			));			
			
			//list donasi
			$this->load->model(array('donasi_m'));
			$datas['aksi_donasi_all'] = $this->donasi_m->getdonasi();
			$datas['donasi_approve'] = $this->donasi_m->getdonasiapprove();
			$this->load->model(array('aksi_m'));
			$datas['aksi'] = $this->aksi_m->getaksiadmin();
			//$datas['sum'] = $this->donasi_m->getdonasi();	
			//var_dump($data['donasi'] = $this->donasi_m->getdonasi());
			$data = array(
				'title' =>'Halaman Admin nih!',
			);		
			$this->load->view('admin/header', $data);
			$this->load->view('admin/dashboard_v', $datas);
			$this->load->view('admin/footer');	
		
		 }
		 //Go to private area
		 //redirect('home', 'refresh');
	   }
	
	 }	
	
}