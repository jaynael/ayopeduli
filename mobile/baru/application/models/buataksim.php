<?
//$fullname =($_POST['fullname']);
//$panggilan  = ($_POST['panggilan']);
//$email =($_POST['email']);
//$password = ($_POST['password']);	
//$now1 = date("m/d/Y H:i:s");
//$uid= ($_POST['uid']);

class buataksim extends Model{
	public function __construct() {
		$this->load->database();
	}		
	public function insert_aksi(){
		$data = array(
			'judul' => $this->input->post('judul'),
			'cat' => $this->input->post('cat'),
			'descsing' => $this->input->post('descsing'),
			'pic' => $this->input->post('pic'),
			'donasi' => $this->input->post('donasi'),
			'jumlahtarget' => $this->input->post('jumlahtarget'),
			'tgl' => $this->input->post('tgl'),
			'desc' => $this->input->post('desc'),
			'vid' => $this->input->post('vid'),
			//'now' => $now1
		);
		return $this->db->insert('ap_aksi', $data);
	}
        
}

?>