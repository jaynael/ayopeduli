<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller{    
    function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url'));
    }	
	
    public function index(){
		if($this->session->userdata('logged_in'))
   {
	   redirect ('home');
        
    }else{
		// Load our view to be displayed
        // to the user
       // $data['msg'] = $msg;
        //$this->load->view('login_view', $data);
		$this->load->helper(array('form'));
		$data = array(
			'title' =>'Daftar sekarang dan gabung bersama ribuan volunteer lainnya.',
			);
		$this->load->view('header',$data);
		$this->load->view('profile/register_v');
		$this->load->view('footer');
		
	}
	}
    
    public function new_user(){
		if($this->session->userdata('logged_in'))
   {
	   redirect ('home');
        
    }else{
	   //This method will have the credentials validation
	   $this->load->library('form_validation');
	   $this->load->helper(array('form', 'url'));
		$this->form_validation->set_rules('fullname', 'Fullname', 'trim|required|xss_clean');
		$this->form_validation->set_rules('panggilan', 'Panggilan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('handphone', 'HP', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
	
	   if($this->form_validation->run() == FALSE)
	   {
		 //Field validation failed.  User redirected to login page
		 //$this->load->view('login_view');
		 $data = array(
			'title' =>'Login dan kumpulkan gudness poin di ayopeduli.com!',
			);
			$this->load->view('header',$data);
			$this->load->view('profile/register_v');
			$this->load->view('footer');
	   }
	   else
	   {
		     //Field validation succeeded.  Validate against database
	   $fullname = $this->input->post('fullname');
	   $panggilan = $this->input->post('panggilan');
	   $password = $this->input->post('password');
	   $photoimg = $this->input->post('photoimg');
	   $handphone = $this->input->post('handphone');
	   $email1 = $this->input->post('email');
	   
	   $config['upload_path'] = './upload/user/';
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
			$datas = (array(
				'error' => $this->upload->display_errors(),
				'fullname' => $fullname,
				'panggilan' => $panggilan,
				'email' => $email,
				'handphone' => $handphone,				
			));

			//$this->load->view('upload_form', $error);
			$this->load->view('header', $error);
			$this->load->view('profile/register_v', $datas);
			$this->load->view('footer');
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$dat = $this->upload->data();
			$filename = $dat['file_name'];
		    $this->load->model('user_m','',TRUE);
	   		$result = $this->user_m->register($fullname, $panggilan, $filename, $email1, $handphone, $password);
		
		 }
		 //Go to private area
		 //redirect('home', 'refresh');
	   }
	
	 }
	}

}


/* End of file login.php */
/* Location: ./application/controllers/login.php */