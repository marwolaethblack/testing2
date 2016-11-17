<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data["username"] = "bob";
		$this->load->view('layouts/header');
		$this->load->view('welcome_message',$data);
	}


	public function my_method($id = ''){
		//$this->load->helper('url');
		$this->load->model('Product');
		$data["id_from_model"] = $this->Product->get_id();
		$data["products_total"] = $this->Product->total();
		$data['id'] = $id;
		$data["my_name"] = "JaPeGe";
		$this->load->view('my_html_view',$data);
		echo $this->input->get('id');
	}

	public function db_test($id){
		//OFTEN USED MODELS/CONTROLLERS/HELPERS DEFINE IN AUTOLOAD.PHP FILE
		$this->load->model('Product');
		$data["id"] = $id;
		$data["db_info"] = $this->Product->update($id,["name" => "keket","description" => "edited desc"]);
		$this->load->view('my_html_view',$data);
	}
	public function save_session(){
		$this->session->set_userdata(["username" => "BOB"]);
		echo "Session saved";
	}

	public function show_session(){
		$username = $this->session->username;
		echo $username;
	}
	//BEFORE UPLOADING FILE, LOAD HELPER CALLED FORM
	public function do_upload(){

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload',$config);
		$this->upload->do_upload('img_file');

		//if ( ! $this->upload->do_upload('img_file'))
		//{
		//    $error = array('error' => $this->upload->display_errors());

		//    $this->load->view('file_upload', $error);
		//}
		//else
		//{
		//    $data = array('upload_data' => $this->upload->data());


		//}
	}

	public function file_upload()
	{

		$this->load->helper('form');
		if($_FILES){
			$this->do_upload('img_file');
			
		} else echo "its here";

	
		$this->load->view('file_upload');
	}
}