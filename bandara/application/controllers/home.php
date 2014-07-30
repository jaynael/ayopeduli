<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Controller {

	function Home()
	{
		parent::Controller();
		$this->load->library('auth');
		$this->load->library('pquery');
		$this->load->library('fungsi');
		$this->load->model(array('setting_m', 'area_m'));
	}	
	function index()
	{
		$data['browse_area'] = $this->area_m->get_all('');
		$this->load->view('home/index', $data);
	}
	function do_login()
	{
		$this->auth->restrict(true);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		// $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|callback_valid_captcha');
		// $this->form_validation->set_message('valid_captcha','%s tidak sama');
		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$this->load->library('auth');
			$login = array('username'=>$this->input->post('username'),
				       'password'=>$this->input->post('password')
			);
			$return = $this->auth->do_login($login);
			if($return){
				// echo $this->fungsi->warning('Selamat datang, '.from_session('nama'),'index.php/home');
				redirect('home');
			}else{
				echo $this->fungsi->warning('Maaf, username atau password yang Anda masukkan salah...','home');
				// echo warning('Maaf, username atau password yang Anda masukkan salah...','home');
			}
		}
	}
	function valid_captcha($str)
	{
		$expiration = time()-60;
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? 
			    AND ip_address = ? AND captcha_time > ?";
		$binds = array($str, $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();	
		if ($row->count == 0) 
		{
			return FALSE;
		}else{
			return TRUE;
		}          
	}
	function logout()
	{
		$this->auth->logout();
		redirect('home');
		// echo $this->fungsi->warning('Anda telah LogOut dari sistem...','home');
	}
	function front()
	{
		if(!is_logged_in())
		{
			$data = $this->auth->setChaptcha();
			$this->load->view('home/login_form',$data);
		}
		else
		{
			$data['title'] = '';
			$this->load->view('home/home_v',$data);
		}	
	}
	function about()
	{
		$this->load->view('home/about_v');		
	}
}

/* End of file home.php */
/* Location: ./system/application/controllers/home.php */