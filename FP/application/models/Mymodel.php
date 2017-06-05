<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model {
	
    public function Cek($table, $datalogin){
        return $this->db->get_where($table,$datalogin);
    }
    
    public function Cekstatus($username){
        $datastatus = $this->db->query("SELECT `status` FROM `datadiri` WHERE username = '" . $username . "'");
        $data = $datastatus->result_array();
        return $data[0];
    }
    
	public function GetBarang($where=""){
		$data = $this->db->query('SELECT * FROM barang '.$where);
		return $data->result_array();
	}

	public function InsertData($tableName, $data){
		$res = $this->db->insert($tableName, $data);
		return $res;
	}

	public function Update($tableName, $data1='', $data2='', $where=''){
		$res = $this->db->query("UPDATE artikel SET isi = '" . $data1 . "' ," . " judul = '" . $data2 . "'" . " WHERE id_artikel = '" . $where ."'");
		return $res;
	}

	public function Delete($tableName, $where=''){
		$res = $this->db->query("DELETE FROM artikel WHERE `id_artikel` = " . $where);
        //$res = $this->db->delete($tableName, $where);
		return $res;
	}
    
    public function Save($url){
		$this->db->set('pic', $url);
		$this->db->insert('barang');
	}
}
