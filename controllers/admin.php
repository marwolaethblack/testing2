<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class admin extends CI_Controller {

	//LOGIN PRE ADMINA

	public function __construct(){
		parent::__construct();
		$this->load->database();


	}
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
	//UVODNA STRANKA, KED SA PRIHLASI ADMIN, LIST VSETKYCH PRODUKTOV
	public function index(){
		//$this->load->database();
		$query = $this->db->get('products');
		$data["title"] = "Admin JaPage";
		$data['products'] = $query->result();

		$this->load->template('admin/index',$data,true);
	}

	//ADD PRODUCT
	public function add_product(){
		$this->load->database();
		$this->load->helper('form');

		if($this->input->post()){
		    $product_name = $this->input->post('name');
		    $category = $this->input->post('category');
		    $price = $this->input->post('price');
		    $quantity = $this->input->post('quantity');
		    $image = $_FILES['image']['name'];
			$description = $this->input->post('description');

		    $data = ['name' => $product_name,
		        'category' => $category,
		        'price' => $price,
		        'quantity' => $quantity,
		        'image' => $image,
				'description' => $description
		        ];
			$this->db->insert('products',$data);
			$insert_id = $this->db->insert_id();
			//THIS CHECKS WHETHER NEW PRODUCT WAS SUCCESSFULLY ADDED TO DB AFTER INSERT
			if($this->db->affected_rows() == 0){
				$this->session->set_userdata(['add_product_msg' => "FAILED TO ADD A NEW PRODUCT: {$product_name}"]);
			} else {
				//UPLOADING IMAGE AFTER IT WAS SAVED INTO DB
				//!!! SET DEFAULT DIRECTORY ROOT FOR IMAGES AND REWRITE THIS !!!!
				if (!is_dir('./assets/images/uploads/products/'.$insert_id)) {
					mkdir('./assets/images/uploads/products/'.$insert_id, 0777, TRUE);
				}
				$upload_path = './assets/images/uploads/products/'.$insert_id;
				$config = array(
						'upload_path'   => $upload_path,
						'allowed_types' => 'gif|jpg|png',
						'max_size'      => 10000,
						'overwrite'     => FALSE // THIS COULD BE TRUE IN OUR CASE
				);
				$this->load->library('upload', $config);

				//THIS IS FOR CASE OF FAILURE WITH UPLOADING IMAGE
				if ( ! $this->upload->do_upload('image'))
				{
					$data['error'] = $this->upload->display_errors();
					$data['upload_message'] = "Uploading image failed";
					$this->load->view('admin/add_product', $data);
				}
				//THIS IS FOR SUCCESSFUL LOADING OF IMAGE
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$this->session->set_userdata(['add_product_msg' => "PRODUCT: {$product_name} ADDED SUCCESSFULLY"]);
					redirect('admin/add_product');
				}
			}
		}
		$this->load->template('admin/add_product',null,true);
	}

	public function product_details($product_id = null){
		$data = null;
		if($product_id == null) redirect('admin');
		if($query = $this->db->get_where('products',['id' => $product_id],1)){
			$result = $query->result()[0];
			$product = ['id' => $result->id,
				'name' => $result->name,
				'description' => $result->description,
				'category' => $result->category,
				'price' => $result->price,
				'quantity' => $result->quantity,
				'avg_rating' => $result->avg_rating,
				'description' => $result->description,
				'amount_sold' => $result->amount_sold,
				'image' => $result->image,];
			$data = $product;
		} else {
			redirect('admin');
		}

		$this->load->template('admin/product_details',$data,true);
	}

	//ZOBRAZENIE VSETKYCH OBJEDNAVOK
	public function orders(){
		if(!$this->session->admin_id){
			redirect('admin/login');
		}
		$this->load->database();
		$query = $this->db->get('orders');
		$data["title"] = "Admin JaPage";
		$data['orders'] = $query->result();
		$this->load->template('admin/orders',$data,true);
	}
	//PREHLAD USEROV
	public function customers(){
		$this->load->database();
		$query = $this->db->get('customers');
		$data["title"] = "Admin JaPage";
		$data['customers'] = $query->result();

		$this->load->template('admin/customers',$data,true);
	}

	//PREHLAD VSETKYCH ADMINOV, LEN PRE SUPER-ADMINA
	public function admins(){
		$this->load->database();
		$query = $this->db->get('admins');
		$data["title"] = "Admin JaPage";
		$data['admins'] = $query->result();
		$this->load->template('admin/admins',$data,true);
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