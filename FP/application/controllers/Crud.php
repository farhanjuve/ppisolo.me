<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Mymodel');
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
    
    public function do_update1($idartikel){
        //$dataid = array('id_artikelku' => $idartikel);
        //var_dump($dataid);
        $this->load->view('uploadForm_b', array('id_artikelku' => $idartikel));
        //array('id_artikelku' => $idartikel)
  
    }
    
    public function do_update($idartikel){

        var_dump($dataid);
        
        if(isset($_POST['update'])) {
            if(!empty($_FILES['foto']['tmp_name'])) { 
                //unlink("../data_artikel/$gambar");
                $ext=strtolower(substr($_FILES['foto']['name'],-3));
                if($ext=='gif')
                    $ext=".gif";
                else
                    $ext=".png";
                move_uploaded_file($_FILES['foto']['tmp_name'], "./data_artikel/" . basename(($idartikel).$ext));

            }
            
            $updatejudul = $_POST['judul'];
            $updateisi =  $_POST['konten'];
            
            $res = $this->Mymodel->Update('artikel',$updateisi, $updatejudul, $idartikel);
            
            if($res>=1){
                var_dump($dataid);
                //redirect('admin');
            } else {
                echo "masih salah";
            }
    
                /*echo "
                <script>
                location.assign('index.php?page=berita&ps=true2');
                </script>
                ";*/
        }
	}

	public function do_delete($idartikel){
        $res = $this->Mymodel->Delete('artikel',$idartikel);
        if($res>=1){
            redirect ('admin');
        } else {
            echo "ada yang salah, kontak admin!";
        
	   }
    }
}