<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keplab extends CI_Controller {

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

		$this->load->model('Keplab_model','pengajuan');
		$data['allpengajuan'] = $this->pengajuan->getAllPengajuan();

		$data['title'] = "Data Pengajuan";
		$this->template->load('layout/template','keplab/view_pengajuan',$data);
    }
    
    public function pengajuanDetail($id){
		$data['user'] = $this->db->get_where('mekp_user',['email' => $this->session->userdata('email')])->row_array();

		$data['lokasidata'] = $this->db->get('mekp_lokasi')->result_array();

		$this->load->model('Member_model','pengajuan');
		$data['allpengajuan'] = $this->pengajuan->getAllPengajuan();
		$data['onepengajuan'] = $this->pengajuan->getOnePengajuan($id);
		$data['allpengajuan'] = $this->pengajuan->getAllPengajuan($id);
		//$data['barang'] = $this->db->get('mekp_barang')->result_array();

		$data['title'] = "Detail Pengajuan";
		$this->template->load('layout/template','keplab/view_pengajuan_detail',$data);
    }

    public function updateStatus($id){
		//string $status_ = "Accepted By Kepala Lab";
		$this->form_validation->set_rules('id_note','note','required');
        $data = [
            // 'id_pengajuan' => $id,
            // 'nm_pengajuan' => $this->input->post('a'),
            // 'jumlah' => $this->input->post('a'),
            // 'tgl_pengajuan' => $this->input->post('b'),
            // 'lokasi' => $this->input->post('c'),
            // 'lokasi_rinci' => $this->input->post('c'),
            // 'keterangan' => $this->input->post('d'),
			'status' => 'Accepted By Kepala Lab',
			'notelab' => $this->input->post('id_note')
        ];

        $this->db->where('id_pengajuan', $id);
        $this->db->update('mekp_pengajuan',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data updated!</div>');
        redirect('keplab/pengajuan');
    }
    
    public function pengajuanEdit($id){
		$data['user'] = $this->db->get_where('mekp_user',['email' => $this->session->userdata('email')])->row_array();

		$data['lokasidata'] = $this->db->get('mekp_lokasi')->result_array();
		$data['kategoridata'] = $this->db->get('mekp_kategori')->result_array();

		$this->load->model('Keplab_model','pengajuan');
		$data['allpengajuan'] = $this->pengajuan->getAllpengajuan();
		$data['onepengajuan'] = $this->pengajuan->getOnePengajuan($id);
		$data['allpengajuan'] = $this->pengajuan->getAllPengajuan($id);
		//$data['barang'] = $this->db->get('mekp_barang')->result_array();

		$this->form_validation->set_rules('aa', 'tanggal Pengajuan','required|trim');
		$this->form_validation->set_rules('bb', 'Kode Barang','required|trim');
		$this->form_validation->set_rules('cc', 'Jumlah','required');
		$this->form_validation->set_rules('xx', 'Lokasi','required');
		$this->form_validation->set_rules('dd', 'Kebutuhan Rinci','required');

		if($this->form_validation->run() == false){

			$data['title'] = "Edit pengajuan";
			$this->template->load('layout/template','member/view_pengajuan_edit',$data);
		}else{

			$data = [

                'id_pengajuan' => $id,
                'nm_pengajuan' => $this->input->post('aa'),
                'jumlah' => $this->input->post('bb'),
				'tgl_pengajuan' => $this->input->post('aa'),
				'lokasi' => $this->input->post('xx'),
				'lokasi_rinci' => $this->input->post('cc'),
				'keterangan' => $this->input->post('dd'),
				'status' => $this->input->post('ee')
			];

			$this->db->where('id_pengajuan', $this->input->post('j'));
			$this->db->update('mekp_penawaran',$data);

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data pengajuan Updated!</div>');
			redirect('member/pengajuanEdit/'.$id);

		}
	}
}