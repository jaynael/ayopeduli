<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Area extends Controller {
	function area()
	{
		parent::Controller();
		$this->load->library('auth');
		$this->load->model(array('area_m'));
		$this->load->helper(array('globals'));
		$this->load->library(array('simpliparse','pquery','form_validation'));
		$this->auth->restrict();
	}	
	function index(){
		// $this->_empty_sesi();
		redirect('area/browse');
	}
	function browse(){
		$data['title'] = 'Daftar Data Area Bandara';
			$data['no'] = $this->uri->segment(4, 0);
			$data['total_page']	= $this->db->count_all('area');
			$perpage	= 10;
			$data3		= $this->simpliparse->getAjaxPagination($data['total_page'],
				$perpage,'area/browse/bandara/',4,'#content');
			$data['paging'] = $data3['paging'];
		$data['browse_area'] = $this->area_m->get_all($data['no'], $perpage);
		$this->load->view('area/tarea_v',$data);		
	}
	function input(){
		$data['title'] = 'Form Input Data Area Bandara';
		$this->load->view('area/iarea_v', $data);
	}
	function edit(){
		$data['title'] = 'Form Edit Data Area Bandara';
		$data['detail_area'] = $this->area_m->get_one($this->uri->segment(3,0));
		$this->load->view('area/earea_v',$data);		
	}
	function form_upload(){
		$data['title'] = 'Upload File Foto';
		$this->load->view('area/formupload_v', $data);
	}
	function upload_file(){
		$config['upload_path'] 	 = './asset/images/fotoarea/';
		$config['allowed_types'] = 'jpg';
		$config['max_size']		 = '10000000';
		$config['max_width']  	 = '10000000';
		$config['max_height']  	 = '8000000';
		$this->load->library('upload', $config);

		$this->upload->do_upload("foto");
			$data = $this->upload->data("foto");
			$data2['file'] = $data["file_name"];
		$this->load->view('area/confirm_upload_v', $data2);
	}
	function simpan(){
		$config = array(
				array(
					  'field'   => 'nama',
					  'label'   => 'Nama Area',
					  'rules'   => 'required'
				   ),
				array(
					  'field'   => 'koordinat1',
					  'label'   => 'Koordinat 1',
					  'rules'   => 'required'
				   ),
				array(
					  'field'   => 'koordinat2',
					  'label'   => 'Koordinat 2',
					  'rules'   => 'required'
				   ),
				array(
					  'field'   => 'tooltip',
					  'label'   => 'Tooltip',
					  'rules'   => 'required'
				   )
		);
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE){
			$this->input();
		}else{
			$this->area_m->insert();
			redirect("area");		
		}
	}
	function hapus()
	{
		$this->area_m->delete($this->uri->segment(3));
		$this->browse();
	}
}

/* End of file Area.php */
/* Location: ./system/application/controllers/area.php */