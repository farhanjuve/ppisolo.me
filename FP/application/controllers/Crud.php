<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('mymodel');
        $this->load->helper(array('url','download'));	
	}
    
    public function index(){
		$data = $this->mymodel->GetBarang();
		$this->load->view('index', array('data' => $data));
        //$this->load->view('tabel', array('data' => $data));
	}
    
    public function daftar(){
        if($this->session->userdata('status') != "member"){
			$this->load->view('Login');
		} else {
            $this->load->view('Upload');   
        }
    }
    
    public function daftaruser(){
        $this->load->view('daftar');
    }
    
    /*public function masukupload(){
        if($this->session->userdata('status') != "login"){
			redirect('crud/daftar');
		}
        
        $this->load->view('upload');
    }*/
    
    public function masuk(){
        
        $username = $_POST['username'];
		$password = $_POST['password'];
        
        $datalogin = array(
            'username' => $username,
            'password' => $password
        );
        
        $cekdulu = $this->mymodel->cek("datadiri", $datalogin);
        
        if($cekdulu->num_rows()>0){
            $a = $this->mymodel->cekstatus($username);
            foreach($cekdulu->result() as $data){
                $data_session = array(
                'nama' => $username,
				'status' => $a['status']
				);
                
			$this->session->set_userdata($data_session);
            }
            
            if($a['status'] == "member"){
                redirect('member');    
            } 
            
            if($a['status'] == "admin"){
                redirect('admin');
            }
            
            //var_dump($this->mymodel->cekstatus($username));
        } else{
            echo "Gagal login!";
        }
    }
    
    public function keluar(){
        $this->session->sess_destroy();
        redirect('crud/daftar');
        //echo "berhasil destroy";
    }
    
    public function adminloginn(){
        redirect('adminlogin');
    }
    
    public function do_daftar(){
        if (isset($_POST['daftarupload'])){
            $getIdd = $this->db->query("SELECT MAX(`id_user`) FROM `datadiri`");
            $getIdd = $getIdd->result_array();
            
            $data_insert = array(
                'id_user' => $getIdd[0]['MAX(`id_user`)']+1,
                'status' => 'member',
                'namalengkap' => $_POST['fullnamedaftar'],
                'sekolah' => $_POST['asalsekolahdaftar'],
                'email' => $_POST['emaildaftar'],
                'username' => $_POST['usernamedaftar'],
                'password' => $_POST['passworddaftar']
            );
            
            $res = $this->db->insert('datadiri', $data_insert);
            
            if($res>=1){
                redirect('crud/daftar');
            } else {
                echo "masih salah";
            }
        }
    }
    
    public function do_upload(){
        if (isset($_POST['upload'])){
            
            $sesi = $this->session->userdata("nama");
            $getIdUser = $this->db->query("SELECT id_user FROM datadiri WHERE username = '" . $sesi . "'");
            $getIdUser = $getIdUser->result_array();
            
            $ext_user=strtolower(substr($_FILES['image_file']['name'],-5));
            $target = "./data_peserta/".basename(($getIdUser[0]['id_user']).$ext_user);
            
            $data_insert = array(
                'file_docx' => $target
            );
            
            if(is_uploaded_file($_FILES['image_file']['tmp_name'])){
                move_uploaded_file($_FILES['image_file']['tmp_name'], $target);
                $this->load->view('sudahupload');
            } else {
                echo "Gagal upload, tanya kenapa?";
            }
            
            $res = $this->db->insert('uploadlomba', $data_insert);
            
            if($res>=1){
                
            } else {
                echo "masih salah";
            }
        }
    }
    
    public function berhasilupload(){
        $this->load->view('sudahupload');    
    }
    
    public function do_download(){				
		force_download('repo/daftarpeserta.docx',NULL);
	}
    
    public function do_keluhan(){
        if(isset($_POST['keluhkan'])){
            $insert_keluhan = array(
                'nama_keluhan' => $_POST['name'],
                'email_keluhan' => $_POST['email'],
                'subject_keluhan' => $_POST['subject'],
                'pesan_keluhan' => $_POST['message']
            );
            
            $res = $this->db->insert('keluhan',$insert_keluhan);
            
            if($res>=1){
                redirect('');
            } else {
                echo "terjadi kesalahan, hubungi admin!";
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