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

	public function inventarisAdd(){
		$data['user'] = $this->db->get_where('mekp_user',['email' => $this->session->userdata('email')])->row_array();

		$data['lokasidata'] = $this->db->get('mekp_lokasi')->result_array();

		$this->form_validation->set_rules('a', 'Nama Perawatan','required|trim');
		$this->form_validation->set_rules('b', 'Lokasi','required');
		$this->form_validation->set_rules('c', 'Lokasi Rinci','required');
		$this->form_validation->set_rules('d', 'Tanggal Perawatan','required');


		if($this->form_validation->run() == false){

			$data['title'] = "Data Perawatan Add";
			$this->template->load('layout/template','teknisi/view_perawatan_add',$data);

		}else{

			$data = [

				'nm_perawatan' => $this->input->post('a'),
				'lokasi' => $this->input->post('b'),
				'lokasi_rinci' => $this->input->post('c'),
				'tgl_perawatan' => $this->input->post('d'),
				'keterangan' => $this->input->post('e')

			];

			$this->db->insert('mekp_barang',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Data added!</div>');
			redirect('teknisi/inventaris');
		}
	}

	public function inventarisDetail($id){
		$data['user'] = $this->db->get_where('mekp_user',['email' => $this->session->userdata('email')])->row_array();

		$data['lokasidata'] = $this->db->get('mekp_lokasi')->result_array();

		$this->load->model('Teknisi_model','perawatan');
		$data['allperawatan'] = $this->perawatan->getAllPerawatan();
		$data['oneperawatan'] = $this->perawatan->getOnePerawatan($id);
		$data['allperbaikan'] = $this->perawatan->getAllPerbaikan($id);
		$data['barang'] = $this->db->get('mekp_barang')->result_array();

		$data['title'] = "Detail Perawatan";
		$this->template->load('layout/template','teknisi/view_perawatan_detail',$data);
	}

	public function inventarisEdit($id){
		$data['user'] = $this->db->get_where('mekp_user',['email' => $this->session->userdata('email')])->row_array();

		$data['lokasidata'] = $this->db->get('mekp_lokasi')->result_array();
		$data['kategoridata'] = $this->db->get('mekp_kategori')->result_array();

		$this->load->model('Teknisi_model','perawatan');
		$data['allperawatan'] = $this->perawatan->getAllPerawatan();
		$data['oneperawatan'] = $this->perawatan->getOnePerawatan($id);
		$data['allperbaikan'] = $this->perawatan->getAllPerbaikan($id);
		$data['barang'] = $this->db->get('mekp_barang')->result_array();

		$this->form_validation->set_rules('a', 'Nama Perawatan','required|trim');
		$this->form_validation->set_rules('b', 'Lokasi','required');
		$this->form_validation->set_rules('c', 'Lokasi Rinci','required');
		$this->form_validation->set_rules('d', 'Tanggal','required');

		if($this->form_validation->run() == false){

			$data['title'] = "Edit Perawatan";
			$this->template->load('layout/template','teknisi/view_perawatan_edit',$data);
		}else{

			$data = [

				'nm_perawatan' => $this->input->post('a'),
				'lokasi' => $this->input->post('b'),
				'lokasi_rinci' => $this->input->post('c'),
				'tgl_perawatan' => $this->input->post('d'),
				'keterangan' => $this->input->post('e')

			];

			$this->db->where('id_perawatan', $this->input->post('zz'));
			$this->db->update('mekp_perawatan',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data updated!</div>');
			redirect('teknisi/perawatan');
		}
	}

	public function inventarisdelete($id){
		$this->db->delete('mekp_perawatan',['id_perawatan' => $id]);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data deleted!</div>');
		redirect('teknisi/inventaris');
	}

	public function perawatan(){
		$data['user'] = $this->db->get_where('mekp_user',['email' => $this->session->userdata('email')])->row_array();

		$data['lokasidata'] = $this->db->get('mekp_lokasi')->result_array();

		$this->load->model('Teknisi_model','perawatan');
		$data['allperawatan'] = $this->perawatan->getAllPerawatan();

		$data['title'] = "Data Perawatan";
		$this->template->load('layout/template','teknisi/view_perawatan',$data);
	}

	public function perawatanAdd(){
		$data['user'] = $this->db->get_where('mekp_user',['email' => $this->session->userdata('email')])->row_array();

		$data['lokasidata'] = $this->db->get('mekp_lokasi')->result_array();

		$this->form_validation->set_rules('a', 'Nama Perawatan','required|trim');
		$this->form_validation->set_rules('b', 'Lokasi','required');
		$this->form_validation->set_rules('c', 'Lokasi Rinci','required');
		$this->form_validation->set_rules('d', 'Tanggal Perawatan','required');


		if($this->form_validation->run() == false){

			$data['title'] = "Data Perawatan Add";
			$this->template->load('layout/template','teknisi/view_perawatan_add',$data);

		}else{

			$data = [

				'nm_perawatan' => $this->input->post('a'),
				'lokasi' => $this->input->post('b'),
				'lokasi_rinci' => $this->input->post('c'),
				'tgl_perawatan' => $this->input->post('d'),
				'keterangan' => $this->input->post('e')

			];

			$this->db->insert('mekp_perawatan',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Data added!</div>');
			redirect('teknisi/perawatan');
		}
	}

	public function perawatanDetail($id){
		$data['user'] = $this->db->get_where('mekp_user',['email' => $this->session->userdata('email')])->row_array();

		$data['lokasidata'] = $this->db->get('mekp_lokasi')->result_array();

		$this->load->model('Teknisi_model','perawatan');
		$data['allperawatan'] = $this->perawatan->getAllPerawatan();
		$data['oneperawatan'] = $this->perawatan->getOnePerawatan($id);
		$data['allperbaikan'] = $this->perawatan->getAllPerbaikan($id);
		$data['barang'] = $this->db->get('mekp_barang')->result_array();

		$data['title'] = "Detail Perawatan";
		$this->template->load('layout/template','teknisi/view_perawatan_detail',$data);
	}

	public function perawatanEdit($id){
		$data['user'] = $this->db->get_where('mekp_user',['email' => $this->session->userdata('email')])->row_array();

		$data['lokasidata'] = $this->db->get('mekp_lokasi')->result_array();
		$data['kategoridata'] = $this->db->get('mekp_kategori')->result_array();

		$this->load->model('Teknisi_model','perawatan');
		$data['allperawatan'] = $this->perawatan->getAllPerawatan();
		$data['oneperawatan'] = $this->perawatan->getOnePerawatan($id);
		$data['allperbaikan'] = $this->perawatan->getAllPerbaikan($id);
		$data['barang'] = $this->db->get('mekp_barang')->result_array();

		$this->form_validation->set_rules('a', 'Nama Perawatan','required|trim');
		$this->form_validation->set_rules('b', 'Lokasi','required');
		$this->form_validation->set_rules('c', 'Lokasi Rinci','required');
		$this->form_validation->set_rules('d', 'Tanggal','required');

		if($this->form_validation->run() == false){

			$data['title'] = "Edit Perawatan";
			$this->template->load('layout/template','teknisi/view_perawatan_edit',$data);
		}else{

			$data = [

				'nm_perawatan' => $this->input->post('a'),
				'lokasi' => $this->input->post('b'),
				'lokasi_rinci' => $this->input->post('c'),
				'tgl_perawatan' => $this->input->post('d'),
				'keterangan' => $this->input->post('e')

			];

			$this->db->where('id_perawatan', $this->input->post('zz'));
			$this->db->update('mekp_perawatan',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data updated!</div>');
			redirect('teknisi/perawatan');
		}
	}

	public function perawatandelete($id){
		$this->db->delete('mekp_perawatan',['id_perawatan' => $id]);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data deleted!</div>');
		redirect('teknisi/perawatan');
	}
}