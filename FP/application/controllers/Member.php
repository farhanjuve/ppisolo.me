<?php 
 
class Member extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "member"){
			redirect('crud/daftar');
		}
	}
 
	function index(){
		$this->load->view('Upload');
	}
}