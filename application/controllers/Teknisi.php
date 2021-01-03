<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teknisi extends CI_Controller {

	public function inventaris(){
		$data['user'] = $this->db->get_where('mekp_user',['email' => $this->session->userdata('email')])->row_array();

		$data['lokasidata'] = $this->db->get('mekp_lokasi')->result_array();

		$this->load->model('Teknisi_model','inventaris');
		$data['allinventaris'] = $this->inventaris->getAllInventaris();

		$data['title'] = "Data Inventaris";
		$this->template->load('layout/template','teknisi/view_inventaris',$data);
	}
}