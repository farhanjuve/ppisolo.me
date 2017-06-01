<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('mymodel');
 
	}
    
    public function index(){
		$data = $this->mymodel->GetBarang();
		$this->load->view('index', array('data' => $data));
        //$this->load->view('tabel', array('data' => $data));
	}
    
    public function daftar(){
        $this->load->view('login');
    }
    
    /*public function masukupload(){
        if($this->session->userdata('status') != "login"){
			redirect('crud/daftar');
		}
        
        $this->load->view('upload');
    }*/
    
    public function masuk(){
        /*$cek = $this->m_login->cek_login("admin",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("admin"));
 
		}else{
			echo "Username dan password salah !";
		}*/
        
        $username = $_POST['username'];
		$password = $_POST['password'];
        $datalogin = array(
            'username' => $username,
            'password' => $password
        );
        
        $cekdulu = $this->mymodel->cek("datadiri", $datalogin);
        
        if($cekdulu->num_rows()==1){
            foreach($cekdulu->result() as $data){
                $data_session = array(
                'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
                /*$sess_data['id_user'] = $data->id_user;
                $sess_data['password'] = $data->username;
                $this->session->set_userdata($sess_data);*/
            }
            redirect('admin');
        } else{
            echo "Gagal login!";
        }
    }
    
    public function keluar(){
        $this->session->sess_destroy();
	redirect('crud/daftar');
        //echo "berhasil destroy";
    }
    
    public function do_upload(){
        if (isset($_POST['upload'])){
            $target = "./images/".basename($_FILES['image_file']['name']);
            
            $gambar = $_FILES['image_file']['name'];
            //foto_siswa
            
            $data_insert = array(
                'foto_siswa' => $target
            );
            
            if(is_uploaded_file($_FILES['image_file']['tmp_name'])){
                move_uploaded_file($_FILES['image_file']['tmp_name'], $target);
                //echo "Sukses upload gambar!";
            } else {
                //echo "Gagal upload, tanya kenapa?";
            }
            
            $res = $this->db->insert('uploadlomba', $data_insert);
            
            if($res>=1){
                echo "Kamu benar";
            } else {
                echo "masih salah";
            }
        }
    }
    
    /*function bytesToSize1024($bytes, $precision = 2) {
        $unit = array('B','KB','MB');
        return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
    }
    $sFileName = $_FILES['image_file']['name'];
    $sFileType = $_FILES['image_file']['type'];
    $sFileSize = bytesToSize1024($_FILES['image_file']['size'], 1);
    echo <<<EOF
    <p>Your file: {$sFileName} has been successfully received.</p>
    <p>Type: {$sFileType}</p>
    <p>Size: {$sFileSize}</p>
    EOF;*/
    
	/*public function edit_data($kode_barang){
		$barang = $this->mymodel->GetBarang("where kode_barang = $kode_barang");
		$data = array(
			"kode_barang" => $barang[0]['kode_barang'],
			"nama_barang" => $barang[0]['nama_barang'],
			"jumlah" => $barang[0]['jumlah'],
			"harga" => $barang[0]['harga']
			 );
		$this->load->view('form_edit',$data);

	}*/
    
    /*public function do_update(){

		$kode_barang = $_POST['kode_barang'];
		$nama_barang = $_POST['nama_barang'];
		$tambah = $_POST['tambah'];
		$jumlah =  $_POST['jumlah'];
		
		$harga = $_POST['harga'];

		$data_update = $jumlah + $tambah;
		$where = $kode_barang;
		$res = $this->mymodel->update('barang',$data_update,$where);
		if($res>=1){
            redirect('crud/index');
        }
	}*/

	/*public function do_delete($kode_barang){
        $wheree = array('kode_barang' => $kode_barang);
        $res = $this->mymodel->delete('barang',$wheree);
        if($res>=1){
            redirect('crud/index');
        }
	}*/
    
    /*public function add_data(){
        $this->load->view('form_add');
    }*/
    
    /*public function do_insert(){
        if (isset($_POST['upload'])){
            $target = "./images/".basename($_FILES['image']['name']);
            
            $kode_barang = $_POST['kode_barang'];
            $nama_barang = $_POST['nama_barang'];
            $jumlah =  $_POST['jumlah'];
            $harga = $_POST['harga'];
            $gambar = $_FILES['image']['name'];
            
            $encript1 =  base64_encode($kode_barang);
            $encript2 =  $this->encryption->encrypt($nama_barang);
            $encript3 =  $this->encryption->encrypt($jumlah);
            $encript4 =  $this->encryption->encrypt($harga);//enkripsi string

            //$decript = $this->encryption->decrypt($encript); //dekripsi string (mengembalikan string ke semula setelah di enkripsi

            //echo $encript;
            //echo $decript;
            
            $data_insert = array(
                'kode_barang' => $encript1,
                'nama_barang' => $encript2,
                'jumlah' => $encript3,
                'harga' => $encript4,
                'image' => $target
            );
            
            if(is_uploaded_file($_FILES['image']['tmp_name'])){
                move_uploaded_file($_FILES['image']['tmp_name'], $target);
                echo "Sukses upload gambar!";
            } else {
                echo "Gagal upload, tanya kenapa?";
            }
            $res = $this->db->insert('barang', $data_insert) or trigger_error(mysql_error().$sql);

            if($res>=1){
                echo "Kamu benar";
            } else {
                echo "masih salah";
            }
        }
    }*/
    
    /*public function save(){
		$url = $this->do_upload();
		$title = $_POST["title"];
		$this->mymodel->save($title, $url);
	}*/
    
    /*public function do_upload($kode_barang){
        $imagee = $_FILES['image']['name'];
        
        $type = explode('.', $imagee);
		$type = strtolower($type[count($type)-1]);
		$url = "./images/".uniqid(rand()).'.'.$type;
		if(in_array($type, array("jpg", "jpeg", "gif", "png")))
			if(is_uploaded_file($_FILES["pic"]["tmp_name"]))
				if(move_uploaded_file($_FILES["pic"]["tmp_name"],$url))
					return $url;
		return "";
    }*/
}