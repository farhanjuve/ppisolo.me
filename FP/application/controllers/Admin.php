<?php 
 
class Admin extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "admin"){
			redirect('crud/daftar');
		}
	}
 
	function index(){
		$this->load->view('Dashboard');
	}
}