<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        //$this->check_isvalidated();
		$this->load->helper(array('form', 'url'));
    }
    
 public function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
	 $email= $data['email'];
	 $data['uid'] = $session_data['uid'];
	 $uid= $data['uid'];
	 //var_dump($uid);
	 $this->load->model(array('user_m'));
	 $datas['user_item'] = $this->user_m->getuser($email);
	 //$datas['namanya'] = $datas['user_item']['fullname'] ;
	 $datas['donasi_user'] = $this->user_m->getdonasi($uid);
	 $datas['aksi_user'] = $this->user_m->getaksi($uid);
	 //$datas['title'] = $datas['user_item']['fullname'] ;
	 $this->load->model(array('partner_m'));
	$datas['product'] = $this->partner_m->getproduct();	
	 $datas['title'] = 'halaman profile' ;	 
		if (empty($datas['user_item']))
			{
				show_404();
			}
	$this->load->view('header', $datas);
	$this->load->view('profile/my-profile_v', $datas);
	$this->load->view('footer'); 
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

public function redeem()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
	 $email= $data['email'];
	 $data['uid'] = $session_data['uid'];
	 $uid= $data['uid'];
	 //var_dump($uid);
	 $this->load->model(array('user_m'));
	 $datas['user_item'] = $this->user_m->getuser($email);
	 //$datas['namanya'] = $datas['user_item']['fullname'] ;
	 //$datas['donasi_user'] = $this->user_m->getdonasi($uid);
	 //$datas['aksi_user'] = $this->user_m->getaksi($uid);
	 //$datas['title'] = $datas['user_item']['fullname'] ;
	 $this->load->model(array('partner_m'));
	 $datas['product'] = $this->partner_m->getproduct();	
	 $datas['title'] = 'halaman profile' ;	 
		if (empty($datas['user_item']))
			{
				show_404();
			}
	$this->load->view('header', $datas);
	$this->load->view('profile/my-redeem_v', $datas);
	$this->load->view('footer'); 
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
}
 public function editaksi($aid)
 {
	 if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
	 $email= $data['email'];
	 $data['uid'] = $session_data['uid'];
	 $uid= $data['uid'];
	 //var_dump($uid);
	 $this->load->model(array('user_m'));
	 $datas['user_item'] = $this->user_m->getuser($email);
	 //$datas['namanya'] = $datas['user_item']['fullname'] ;
	 $datas['donasi_user'] = $this->user_m->getdonasi($uid);
	 $datas['aksi_user'] = $this->user_m->getaksi($uid);
	 $this->load->model(array('aksi_m'));
	 $datas['aksi_content'] = $this->aksi_m->getaksicontent($aid, $uid);
	 $datas['aid'] = $aid;	
	 //$datas['title'] = $datas['user_item']['fullname'] ;	
	 $datas['title'] = 'halaman profile' ;	 
		if (empty($datas['user_item']))
			{
				show_404();
			}
	$this->load->view('header', $datas);
	$this->load->view('profile/edit-aksi_v', $datas);
	$this->load->view('footer'); 
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
	
}

public function updateaksi($aid){
		if(isset($_POST['submitted'])) {
			if($this->session->userdata('logged_in'))
			   {
				 $session_data = $this->session->userdata('logged_in');
				 $data['email'] = $session_data['email'];
				 $email= $data['email'];
				 $data['uid'] = $session_data['uid'];
				 $uid= $data['uid'];
				 //var_dump($uid);
				 $this->load->model(array('user_m'));
				 $datas['user_item'] = $this->user_m->getuser($email);
				 //$datas['namanya'] = $datas['user_item']['fullname'] ;
				 $datas['donasi_user'] = $this->user_m->getdonasi($uid);
				 $datas['aksi_user'] = $this->user_m->getaksi($uid);
				 $this->load->model(array('aksi_m'));
				 $datas['aksi_content'] = $this->aksi_m->getaksicontent($aid, $uid);
				 $datas['aid'] = $aid;	
				 //$datas['title'] = $datas['user_item']['fullname'] ;	
				 $datas['title'] = 'halaman profile' ;	 
					if (empty($datas['user_item']))
						{
							show_404();
						}
						if (isset($_POST['picaksi'])){
							$config['upload_path'] = './upload/aksi/';
							$config['allowed_types'] = 'gif|jpg|png';
							$config['max_size']	= '1000';
							$config['max_width']  = '1024';
							$config['max_height']  = '1024';
							$config['encrypt_name']= true;
							//var_dump($filename);
							$field_name = "picaksi";
							$this->load->library('upload', $config);
							//$filename = $this->upload->data();
							$email =($_POST['email']);
							$uid =($_POST['uid']);
							$datas['aid'] = $aid;
							//$cat  =($_POST['cat']);
							$judul = ($_POST['judul']);
							$descsing  = ($_POST['descsing']);
							$donasi =($_POST['donasi']);		
							$jumlahtarget  =($_POST['jumlahtarget']);
							$tgl  =($_POST['tgl']);
							$desc = htmlspecialchars($_POST['deskripsi']);		
							$vid =($_POST['vid']);
							
							if ( ! $this->upload->do_upload($field_name))
							{
								$error = array('title' => $this->upload->display_errors());
								//$datas = array('error' => $this->upload->display_errors());
								$this->load->model(array('user_m'));
								$datas = (array(
									'error' => $this->upload->display_errors(),
									'judul' => $judul,
									'descsing' => $descsing,
									'donasi' => $donasi,
									'jumlahtarget' => $jumlahtarget,
									'tgl' => $tgl,
									'desc' => $desc,
									'vid' => $vid,
									'aid' => $aid
								));
								$datas['user_item'] = $this->user_m->getuser($email);
								$datas['donasi_user'] = $this->user_m->getdonasi($uid);
								$datas['aksi_user'] = $this->user_m->getaksi($uid);
								$this->load->model(array('aksi_m'));
								$datas['aksi_content'] = $this->aksi_m->getaksicontent($aid, $uid);
								//$this->load->view('upload_form', $error);
								$this->load->view('header', $error);
								
								$this->load->view('profile/edit-aksi_v',$datas);
								$this->load->view('footer');
							}
							else
								{
									//$data = array('upload_data' => $this->upload->data());
									$dat = $this->upload->data();
									$filename = $dat['file_name'];
									//var_dump($filename);
									$this->load->model(array('aksi_m'));
									$data['profile_update'] = $this->aksi_m->updateaksi($filename);						
									//$this->load->view('upload_success', $data);					
								}
							}else{
								$this->load->model(array('aksi_m'));
								$this->aksi_m->updateaksi($aid);
								//var_dump($data['profile_update']);	
								//echo $aid;
								$datas = (array(
									'success' => "Aksi Berhasil di Update",
									'title' => "Aksi Berhasil di Update",
									'aid' => $aid
									
								));
								$datas['user_item'] = $this->user_m->getuser($email);
								$datas['donasi_user'] = $this->user_m->getdonasi($uid);
								$datas['aksi_user'] = $this->user_m->getaksi($uid);
								$this->load->model(array('aksi_m'));
								$datas['aksi_content'] = $this->aksi_m->getaksicontent($aid, $uid);
								$this->load->view('header', $datas);					
								$this->load->view('profile/edit-aksi_v',$datas);
								$this->load->view('footer');
								}
			 
						   }
						   else
						   {
							 //If no session, redirect to login page
							 redirect('login', 'refresh');
						   }
						}else{
							redirect('home', 'refresh');
						}
				}
			 
public function editprofile($uid)
	{
		if(isset($_POST['submitted'])) {			
	 		if (isset($_POST['photoimg'])){
					$config['upload_path'] = './upload/user/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '500';
					$config['max_width']  = '1024';
					$config['max_height']  = '1024';
					$config['encrypt_name']= true;
					//var_dump($filename);
					$field_name = "photoimg";
					$this->load->library('upload', $config);
					//$filename = $this->upload->data();
						
					if (!$this->upload->do_upload($field_name))
					{
						$error = array('title' => $this->upload->display_errors());
						//$datas = array('error' => $this->upload->display_errors());
						$this->load->model(array('user_m'));
						$datas = (array(
						'error' => $this->upload->display_errors(),
						));
						$session_data = $this->session->userdata('logged_in');
						$data['email'] = $session_data['email'];
						$email= $data['email'];
						$data['uid'] = $session_data['uid'];
						$uid= $data['uid'];
						//var_dump($uid);
						$this->load->model(array('user_m'));
						$datas['user_item'] = $this->user_m->getuser($email);
						//$datas['namanya'] = $datas['user_item']['fullname'] ;
						$datas['donasi_user'] = $this->user_m->getdonasi($uid);
						$datas['aksi_user'] = $this->user_m->getaksi($uid);
						//$datas['title'] = $datas['user_item']['fullname'] ;
						//$this->load->view('upload_form', $error);
						$this->load->view('header', $error);								
						$this->load->view('profile/my-profile_v',$datas);
						$this->load->view('footer');
					}
					else
					{
						$dat = $this->upload->data();
						$filename = $dat['file_name'];
						$this->load->model(array('user_m'));
						$data['profile_update'] = $this->user_m->updatepic($filename);						
						$this->load->model(array('user_m'));
						$datasu = (array(
							'success' => "Profile anda telah diupdate",
							'tittle' => "Profile anda telah diupdate",
						));
						$session_data = $this->session->userdata('logged_in');
						$data['email'] = $session_data['email'];
						$email= $data['email'];
						$data['uid'] = $session_data['uid'];
						$uid= $data['uid'];
						//var_dump($uid);
						$this->load->model(array('user_m'));
						$datas['user_item'] = $this->user_m->getuser($email);
						//$datas['namanya'] = $datas['user_item']['fullname'] ;
						$datas['donasi_user'] = $this->user_m->getdonasi($uid);
						$datas['aksi_user'] = $this->user_m->getaksi($uid);
						//$datas['title'] = $datas['user_item']['fullname'] ;
						//$this->load->view('upload_form', $error);
						$this->load->view('header', $datasu);								
						$this->load->view('profile/my-profile_v',$datasu);
						$this->load->view('footer');
					}
				}
				if (!isset($_POST['photoimg'])){
				$this->load->model(array('user_m'));
				$data['profile_update'] = $this->user_m->update( $uid);
				//$this->load->view('upload_success', $data);
				$this->load->model(array('user_m'));
				$datas = (array(
					'success' => "Profile anda telah diupdate",
					'tittle' => "Profile anda telah diupdate",
				));
				$session_data = $this->session->userdata('logged_in');
				$data['email'] = $session_data['email'];
				$email= $data['email'];
				$data['uid'] = $session_data['uid'];
				$uid= $data['uid'];
				//var_dump($uid);
				$this->load->model(array('user_m'));
				$datas['user_item'] = $this->user_m->getuser($email);
				$datas['namanya'] = $datas['user_item']['fullname'] ;
				$datas['donasi_user'] = $this->user_m->getdonasi($uid);
				$datas['aksi_user'] = $this->user_m->getaksi($uid);
				//$datas['title'] = $datas['user_item']['fullname'] ;
				//$this->load->view('upload_form', $error);
				$this->load->view('header', $datas);								
				$this->load->view('profile/my-profile_v',$datas);
				$this->load->view('footer');
				};
	 //}
	}else{
		redirect('home');
	}
}

public function logout()
 {
	 session_start();
	$this->load->helper(array('form', 'url'));
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('login');
 }

 }
 ?>
