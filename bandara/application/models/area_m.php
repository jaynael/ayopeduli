<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
Class Area_m extends Model
{
	function area_m()
	{
		parent::Model();
	}
	function get_all($limit1 = '', $limit2 = '', $cari = ''){
		if($limit1 or $limit2)
			$this->db->limit($limit2, $limit1);
		if($cari)
			$this->db->like('nama',$cari);
		$this->db->order_by('idarea', 'DESC');
		$hasil = $this->db->get('area');
		return $hasil;
	}
	function get_one($id){
		$this->db->where('idarea', $id);
		$hasil = $this->db->get('area');
		return $hasil;
	}
	function insert(){
		$data = array(
			'nama' => $this->input->post('nama'),
			'foto' => $this->input->post('foto'),
			'koordinat1' => $this->input->post('koordinat1'),
			'koordinat2' => $this->input->post('koordinat2'),
			'tooltip' => $this->input->post('tooltip'),
			'keterangan' => $this->input->post('keterangan')
		);
		if($this->input->post('idarea')){
			$this->db->where('idarea', $this->input->post('idarea'));
			$this->db->update('area', $data);
		}else{
			$this->db->insert('area', $data);
		}
	}
	function delete($id){
		$this->db->where('idarea', $id);
		$this->db->delete('area');
	}
}
