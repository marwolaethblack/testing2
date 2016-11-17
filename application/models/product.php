<?php
class Product extends CI_Model{

	//GET VALUES OF VARIABLES FROM $_POST
	//function edit(){
		//   if ($_POST)
		//{
		//    $name = $this->input->post('name');
		//    $desc = $this->input->post('description');
		//    $new_data['name'] = $name;
		//    $new_data['description'] = $desc;
		//    $this->Product->update($id,$new_data);
		//}
	//}
	//THIS IS FOR REDIRECTING
	//redirect("index");

	//SET SESSION
	// $session_data['name'] = $this->input->get('name_from_form');
	//$this->session->set_userdata($session_data);

	//GET DATA FROM SESSION
	// $var = $this->session->name_of_session_data


	public function __construct(){
		parent::__construct();
		//$this->db is equivalent of $connection from PHPWebProject2 code
		$this->db = $this->load->database('default',TRUE);

	}
	public function get_id(){
		return 420;
	}

	public function total(){
		return 5;
	}
	//GETS ALL RECORD
	public function get_info(){
		//SELECTS ALL ROWS
		$result_set = $this->db->get("agents");
		//CREATES ARRAY OF ROWS
		return $result_set->result_array();
	}

	public function get_by_id($id){
		//THIS CAN BE PLACED IN GET_WHERE INSTED OF THE ARRAY
		//$where['id'] = $id;

		$result_set = $this->db->get_where('agents',array('id' => $id));
		//DONT FORGET TO CALL RESULT_ARRAY()
		return $result_set->result_array();

	}
	public function update($id,$new_data){
		$where['id'] = $id;
		$this->db->update('agents',$new_data,$where);
	}
}

?>