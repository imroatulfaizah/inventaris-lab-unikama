<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BAU extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();

		//untuk mengatasi error confirm form resubmission
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
	}

	public function index(){
		$data['user'] = $this->db->get_where('mekp_user',['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = "Home";
		$this->template->load('layout/template','member/view_home',$data);
    }

    public function pengajuan(){
		$data['user'] = $this->db->get_where('mekp_user',['email' => $this->session->userdata('email')])->row_array();

		$data['lokasidata'] = $this->db->get('mekp_lokasi')->result_array();

		$this->load->model('Bau_model','pengajuan');
		$data['allpengajuan'] = $this->pengajuan->getAllPengajuan();
		//$this->db->where('status', 'Accepted By Kepala Lab');

		$data['title'] = "Data Pengajuan";
		$this->template->load('layout/template','bau/view_pengajuan',$data);
    }
    
    public function pengajuanDetail($id){
		$data['user'] = $this->db->get_where('mekp_user',['email' => $this->session->userdata('email')])->row_array();

		$data['lokasidata'] = $this->db->get('mekp_lokasi')->result_array();

		$this->load->model('Bau_model','pengajuan');
		$data['allpengajuan'] = $this->pengajuan->getAllPengajuan();
		$data['onepengajuan'] = $this->pengajuan->getOnePengajuan($id);
		$data['allpengajuan'] = $this->pengajuan->getAllPengajuan($id);
		//$data['barang'] = $this->db->get('mekp_barang')->result_array();

		$data['title'] = "Detail Pengajuan";
		$this->template->load('layout/template','bau/view_pengajuan_detail',$data);
    }

    public function updateStatus($id){
		$this->form_validation->set_rules('id_note','note','required');

        $data = [       
			'status' => 'Accepted By Kepala BAU',
			'note' => $this->input->post('id_note')
        ];
        $this->db->where('id_pengajuan', $id);
        $this->db->update('mekp_pengajuan',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data updated!</div>');
        redirect('bau/pengajuan');
    }

}