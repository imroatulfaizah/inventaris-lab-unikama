<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bau_model extends CI_Model {
    public function getAllPengajuan(){

		$query = "SELECT a.*, b.*  FROM mekp_pengajuan a 
		JOIN mekp_lokasi b ON a.lokasi = b.id_lokasi 
        -- WHERE a.status = 'Accepted By Kepala BAU'
        ORDER BY `id_pengajuan`
		";

		return $this->db->query($query)->result_array();
	}

	public function getOnePengajuan($id){

		$query = "SELECT a.*, b.*  FROM mekp_pengajuan a 
		JOIN mekp_lokasi b ON a.lokasi = b.id_lokasi
		WHERE a.id_pengajuan = $id
		";

		return $this->db->query($query)->row_array();
	}
}
