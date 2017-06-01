<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model {
	
    public function cek($table, $datalogin){
        return $this->db->get_where($table,$datalogin);
    }
    
    public function cekstatus($username){
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

	public function update($tableName, $data, $where){
		// $res = $this->db->update($tableName, $data, $where);
		$res = $this->db->query("UPDATE barang SET jumlah = " . $data . " WHERE kode_barang = " . $where);
		return $res;
	}

	public function delete($tableName, $where){
		$res = $this->db->delete($tableName, $where);
		return $res;
	}
    
    public function save($url){
		$this->db->set('pic', $url);
		$this->db->insert('barang');
	}
}
