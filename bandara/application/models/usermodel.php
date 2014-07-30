<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
Class Usermodel extends Model
{
	function Usermodel()
	{
		parent::Model();
	}
	function cek_usersama($username){
		$sql = "SELECT user_username FROM user WHERE user_username = '".$username."'";
		$hasil = $this->db->query($sql);
		return $hasil->num_rows();
	}
	function cek_password(){
		$user_username = $this->input->post('user_username');
		$user_id = $this->input->post('user_id');
		$user_password = $this->input->post('user_password');
		$sql = "SELECT * FROM user WHERE user_username = '".$user_username."' AND user_id = ".$user_id." 
				AND user_password = PASSWORD('".$user_password."')";
		$hasil = $this->db->query($sql);
		return $hasil->num_rows();
	}
	function update_password(){
		$user_id = $this->input->post('user_id');
		$user_passwordbaru = $this->input->post('user_passwordbaru');
		$sql = "UPDATE user SET user_password = PASSWORD('".$user_passwordbaru."') WHERE user_id = ".$user_id." ";
		$this->db->query($sql);
	}
	function get_list_user()
	{
		return $this->db->get('user');
	}
	function save_priv($id){
		$klasifikasi = $this->input->post('klasifikasi_tambah')+$this->input->post('klasifikasi_edit')+$this->input->post('klasifikasi_hapus')+$this->input->post('klasifikasi_lihat');
		$lokasi = $this->input->post('lokasi_tambah')+$this->input->post('lokasi_edit')+$this->input->post('lokasi_hapus')+$this->input->post('lokasi_lihat');
		$kantor = $this->input->post('kantor_tambah')+$this->input->post('kantor_edit')+$this->input->post('kantor_hapus')+$this->input->post('kantor_lihat');
		$masuk = $this->input->post('masuk_tambah')+$this->input->post('masuk_edit')+$this->input->post('masuk_hapus')+$this->input->post('masuk_lihat');
		$lamaran = $this->input->post('lamaran_tambah')+$this->input->post('lamaran_edit')+$this->input->post('lamaran_hapus')+$this->input->post('lamaran_lihat');
		$keluar = $this->input->post('keluar_tambah')+$this->input->post('keluar_edit')+$this->input->post('keluar_hapus')+$this->input->post('keluar_lihat');
		$perjanjian = $this->input->post('perjanjian_tambah')+$this->input->post('perjanjian_edit')+$this->input->post('perjanjian_hapus')+$this->input->post('perjanjian_lihat');
		$data = array(
			'priv_klasifikasi' => $klasifikasi,
			'priv_lokasi' => $lokasi,
			'priv_kantor' => $kantor,
			'priv_masuk' => $masuk,
			'priv_lamaran' => $lamaran,
			'priv_keluar' => $keluar,
			'priv_perjanjian' => $perjanjian
		);
		$this->db->where('user_id',$id);
		$this->db->update('user', $data);
	}
	function privuser($user_id=''){
		$sql = "SELECT * FROM user WHERE user_id = ".$user_id." ";
		return $this->db->query($sql);
	}
	function simpan($data)
	{
		if(($data['user_id']) AND ($this->input->post('user_password')))
		{
			$id = $data['user_id'];
			$name = $data['user_name'];
			$user = $data['user_username'];
			$jabatan = $data['user_jabatan'];
			$level = $data['user_level'];
			$pass = $data['user_password'];
			$sql = "UPDATE user SET 
					user_name = '".$name."',
					user_username = '".$user."',
					user_jabatan = '".$jabatan."',
					user_level = '".$level."',
					user_password = PASSWORD('".$this->input->post('user_password')."')
					WHERE user_id = ".$id;
			$this->db->query($sql);
		}
		else
		{
			$this->db->from('user');
			$this->db->where('user_id',$this->input->post('user_id'));
			$num = $this->db->count_all_results();
			if($num > 0)
			{
				$this->db->where('user_id', $data['user_id']);
				$this->db->update('user', $data);
			}
			else
			{
				$this->db->insert('user',$data);
				$this->db->query('UPDATE user set user_password=PASSWORD("'.$data['user_password'].'") WHERE user_username="'.$data['user_username'].'"');
			}
		}
	}
	function hapus_user($id)
	{
		$this->db->where('user_id',$id);
		$this->db->delete('user');
	}
}
