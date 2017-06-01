<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    function __construct(){
		parent::__construct();
        $this->load->library('encryption');
		$this->load->helper('html');
	}
    
	public function index(){
		$data = $this->mymodel->GetBarang();
		$string = "Faber Nainggolan";
        $encript =  $this->encryption->encrypt($string); //enkripsi string
        $decript = $this->encryption->decrypt($encript); //dekripsi string (mengembalikan string ke semula setelah di enkripsi
 
        echo $encript;
        echo $decript;
        //$this->load->view('tabel', array('data' => $data));
		// foreach ($data as $d) {
		// 	echo "Kode barang : " . $d['kode_barang'] . "<br />";
		// 	echo "Nama barang : " . $d['nama_barang'] . "<br />";
		// 	echo "Satuan barang : " . $d['satuan'] . "<br />";
		// 	echo "Jumlah barang : " . $d['jumlah'] . "<br />";
		// 	echo "Harga barang : " . $d['harga'] . "<br />";
		// 	echo "Kategori barang : " . $d['kategori'] . "<hr />";
		// }
	}

	public function insert(){
		$res = $this->mymodel->InsertData('barang', array(
			"kode_barang" => "1005",
			"nama_barang" => "Sabun",
			"satuan" => "gr",
			"jumlah" => 100,
			"harga" => 10000,
			"kategori" => "Sandang",
			));

		if($res >= 1){
			echo "<h1>SUKSES</h1>";
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}

	public function update(){
		$res = $this->mymodel->UpdateData('barang', array("	harga" => "101010" ,
			), array("kode_barang" => "1001"));

		if($res >= 1){
			echo "<h1>SUKSES</h1>";
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}

	public function delete(){
		$res = $this->mymodel->DeleteData('barang', array('kode_barang' => "1005"));

		if($res >= 1){
			echo "<h1>SUKSES</h1>";
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}
}
