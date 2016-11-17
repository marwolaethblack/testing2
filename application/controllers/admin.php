<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class admin extends CI_Controller {

	//LOGIN PRE ADMINA
	public function login()
	{
		if($this->input->post('submit')){
			$admin_name = $this->input->post('admin_name');
			$password = $this->input->post('password');
			$this->load->database();
			$query = $this->db->get('admins');
			foreach ($query->result() as $admin)
			{
				if( $admin->name === $admin_name){
					foreach($query->result() as $admin){
						if( $admin->password === $password){

							$this->session->unset_userdata('login_message');
							$this->session->set_userdata(['admin_id' => $admin->id]);
							redirect('admin/index','refresh');
						} else{
							$this->session->set_userdata(["login_message" => "Username/Password combination is incorrect"]);
						}
					}
				} else {
					$this->session->set_userdata(["login_message" => "Username/Password combination is incorrect"]);
				}
			}
		}
		$data["title"] = "Admin Login";
		$this->load->template('admin/login',$data,false);
	}
	//UVODNA STRANKA, KED SA PRIHLASI ADMIN
	public function index(){
		$data["title"] = "Admin JaPage";
		$this->load->template('admin/index',$data,true);
	}

	//ZOBRAZENIE VSETKYCH OBJEDNAVOK
	public function orders(){
		if(!$this->session->admin_id){
			redirect('admin/login');
		}
		$this->load->template('admin/orders',null,true);
	}

	//PREHLAD VSETKYCH ADMINOV, LEN PRE SUPER-ADMINA
	public function admins(){
		$this->load->template('admin/admins',null,true);
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

}