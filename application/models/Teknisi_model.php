<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teknisi_model extends CI_Model {
    public function getAllInventaris(){

		$query = "SELECT * FROM mekp_barang
        ORDER BY `id_barang`
		";

		return $this->db->query($query)->result_array();
	}

	public function getOneInventaris($id){

		$query = "SELECT * FROM mekp_barang
		WHERE a.id_barang = $id
		";

		return $this->db->query($query)->row_array();
	}
}
