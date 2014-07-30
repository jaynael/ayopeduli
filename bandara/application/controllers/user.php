<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends Controller {

	function User()
	{
		parent::Controller();
		$this->load->library(array('auth','pquery','form_validation'));
		$this->load->model(array('usermodel'));
		$this->auth->restrict();
	}	
	function index()
	{
		$this->auth->cek('manajemen_user');
		$data['user'] = $this->usermodel->get_list_user();
		$this->load->view('user/panel',$data);
	}
	function update(){
		$config = array(
			array(
				  'field'   => 'user_password',
				  'label'   => 'Password',
				  'rules'   => 'required'
			   ),
			array(
				  'field'   => 'user_passwordbaru',
				  'label'   => 'Password baru',
				  'rules'   => 'required|matches[user_passwordbarulagi]'
			   ),
			array(
				  'field'   => 'user_passwordbarulagi',
				  'label'   => 'Konfirmasi password',
				  'rules'   => 'required'
			   )
		);
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="error">','</span>');
		if ($this->form_validation->run() == FALSE){
			$this->fubah_password();
		}else{
			if($this->usermodel->cek_password()){
				$this->usermodel->update_password();
				$data['title'] = 'Konfirmasi Perubahan Password';
				$this->load->view('user/confirmubahpassword_v', $data);
			}else{
				$this->simplival->alert('Masukkan password lama dengan benar');
				$this->fubah_password();
			}
		}
	}
	function fubah_password(){
		$data['title'] = 'Form Perubahan Password';
		$this->load->view('user/fubahpassword_v', $data);
	}
	function simpan_priv(){
		$this->usermodel->save_priv($this->session->userdata('sesi_idprivuser'));
		redirect('user/hak_akses');
	}
	function hak_akses(){
		$this->auth->cek('manajemen_user');
		if($this->uri->segment(4)){
			$this->session->set_userdata('sesi_idprivuser', $this->uri->segment(3,0));
			$this->session->set_userdata('sesi_nameprivuser', $this->uri->segment(4,0));
		}
		$data['title'] = 'Pengaturan Hak Akses '.$this->session->userdata('sesi_nameprivuser');
		$data['privuser'] = $this->usermodel->privuser($this->session->userdata('sesi_idprivuser'));
		$this->load->view('user/thakakses_v', $data);
	}
	function simpan(){
		$cekusername = $this->usermodel->cek_usersama($this->input->post('user_username'));
		$config = array(
			array(
				  'field'   => 'user_name',
				  'label'   => 'Nama pemakai program',
				  'rules'   => 'required'
			   ),
			array(
				  'field'   => 'user_username',
				  'label'   => 'Username',
				  'rules'   => 'required'
			   ),
			array(
				  'field'   => 'user_jabatan',
				  'label'   => 'Jabatan',
				  'rules'   => 'required'
			   )
		);
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			if(($cekusername) AND ($this->input->post('user_id')==false)){
				$this->simplival->alert('PERINGATAN\nUsername '.$this->input->post('user_username').' Sudah Ada Sebelumnya');
				$this->index();
			}else{
				$this->auth->cek_maxuser();
				if(($this->auth->cek_maxuser()) && ($this->input->post('user_id') == false)){
					$this->simplival->alert('KONFIRMASI\nGagal Melakukan Menyimpan Data.\nJumlah Pemakai Program Sudah Pada Batas Maksimal.\nUntuk Menambahkan Jumlah	Pemakai, dapat menghubungi Administrator Utama');
					$this->index();
					return false;
				}
				$data = $this->fungsi->accept_data(array_keys($_POST));
				$this->usermodel->simpan($data);
				$this->simplival->alert('KONFIRMASI\nData Berhasil Disimpan');
				$this->index();
			}
		}
	}
	function hapus()
	{
		$id = $this->uri->segment(3);
		$this->usermodel->hapus_user($id);
		$this->index();
	}
}

/* End of file user.php */
/* Location: ./system/application/controllers/user.php */