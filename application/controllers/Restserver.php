<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*use Restserver\libraries\RestController;
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';*/

class Restserver extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function test_get(){
		$array = array("Hola","Mundo","CodeIgniter");
		$this->response($array);
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function test(){
		echo '{
			"id_usuario": "0",
			"nombre_usuario": "Vanessa",
			"email": "vane_sm@gmail.com",
			"password": "12345678";
			"create_date":"17/08/2021";
			"create_by": "Vanessa";
			"update_date": "19/08/2021";
			"update_by": "Vane";
		  }
		  {
			"id_usuario": "1",
			"nombre_usuario": "Vanessa",
			"email": "vane_sm@gmail.com",
			"password": "12345678";
			"create_date":"17/08/2021";
			"create_by": "Vanessa";
			"update_date": "19/08/2021";
			"update_by": "Vane";
		  }';
	}
}
