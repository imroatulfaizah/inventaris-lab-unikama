<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {

	public function getAllBarang(){

		$query = "SELECT `a`.`id_barang`,`a`.`kd_barang`,`a`.`nm_barang`, `a`.`jumlah`,`a`.`thn_pengadaan`,`a`.`catatan`, `b`.`nm_merk`,`c`.`nm_kategori`,`d`.`nm_status`,`e`.`nm_kondisi`,`l`.`nm_lokasi` FROM 
		`mekp_barang` `a` JOIN `mekp_merk` `b` ON `a`.`merk` = `b`.`id_merk` 
		JOIN `mekp_kategori` `c` ON `a`.`kategori` = `c`.`id_kategori`
		JOIN `mekp_status_barang` `d` ON `a`.`status` = `d`.`id_status`
		JOIN `mekp_kondisi` `e` ON `a`.`kondisi` = `e`.`id_kondisi`
		JOIN `mekp_lokasi` `l` ON `a`.`id_lokasi` = `l`.`id_lokasi`
		";

		return $this->db->query($query)->result_array();
	}

	public function getOneBarang($id){

		$query = "SELECT a.*, `b`.`nm_merk`,`c`.`nm_kategori`,`d`.`nm_status`,`e`.`nm_kondisi`, `l`.`nm_lokasi` FROM 
		`mekp_barang` `a` JOIN `mekp_merk` `b` ON `a`.`merk` = `b`.`id_merk` 
		JOIN `mekp_kategori` `c` ON `a`.`kategori` = `c`.`id_kategori`
		JOIN `mekp_status_barang` `d` ON `a`.`status` = `d`.`id_status`
		JOIN `mekp_kondisi` `e` ON `a`.`kondisi` = `e`.`id_kondisi`
		JOIN `mekp_lokasi` `l` ON `a`.`id_lokasi` = `l`.`id_lokasi`
		WHERE `a`.`id_barang` = $id
		";

		return $this->db->query($query)->row_array();
	}

	public function getHistoryBarangMasuk($kd){

		$query = "SELECT a.*, b.*, c.*, d.*, l.*, f.*, e.*, d.* FROM `mekp_barang_masuk` `a`
		JOIN `mekp_barang` `b`
		ON `a`.`kd_barang` = `b`.`kd_barang`
		JOIN `mekp_kategori` `c` ON `b`.`kategori` = `c`.`id_kategori`
		JOIN `mekp_status_barang` `d` ON `b`.`status` = `d`.`id_status`
		JOIN `mekp_kondisi` `e` ON `b`.`kondisi` = `e`.`id_kondisi`
		JOIN `mekp_lokasi` `l` ON `b`.`id_lokasi` = `l`.`id_lokasi`
		JOIN `mekp_merk` `f` ON `b`.`merk` = `f`.`id_merk`
		WHERE `a`.`kd_barang` LIKE '%$kd%'
		";

		return $this->db->query($query)->result_array();
	}

	public function getHistoryBarangKeluar($kd){

		$query = "SELECT a.*, a.catatan as catatana, c.*, e.*, d.*, g.* FROM `mekp_barang_keluar` `a`
		JOIN `mekp_barang` `b`ON `a`.`kd_barang` = `b`.`kd_barang`
		JOIN mekp_lokasi c ON a.dari_ke = c.id_lokasi
		JOIN `mekp_kategori` `g` ON `b`.`kategori` = `g`.`id_kategori`
		JOIN `mekp_status_barang` `d` ON `b`.`status` = `d`.`id_status`
		JOIN `mekp_kondisi` `e` ON `b`.`kondisi` = `e`.`id_kondisi`
		JOIN `mekp_merk` `f` ON `b`.`merk` = `f`.`id_merk`
		WHERE `a`.`kd_barang` LIKE '%$kd%'
		";

		return $this->db->query($query)->result_array();
	}

	public function getAllPerawatan(){

		$query = "SELECT a.*, b.*, c.*, d.*  FROM mekp_perawatan a 
		JOIN mekp_lokasi b ON a.lokasi = b.id_lokasi 
		JOIN mekp_barang c ON a.nm_perawatan = c.id_barang
		JOIN mekp_kondisi d ON c.kondisi = d.id_kondisi
		ORDER BY `id_perawatan`
		";

		return $this->db->query($query)->result_array();
	}

	public function getOnePerawatan($id){

		$query = "SELECT a.*, b.*, c.*  FROM mekp_perawatan a 
		JOIN mekp_lokasi b ON a.lokasi = b.id_lokasi
		JOIN mekp_barang c ON a.nm_perawatan = c.id_barang
		-- JOIN mekp_lokasi b ON a.lokasi = b.id_lokasi
		WHERE a.id_perawatan = $id
		";

		return $this->db->query($query)->row_array();
	}

	public function getAllPengajuan(){

		$query = "SELECT a.*, b.*  FROM mekp_pengajuan a 
		JOIN mekp_lokasi b ON a.lokasi = b.id_lokasi ORDER BY `id_pengajuan`
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

	public function getAllPerbaikan($id){

		$query = "SELECT * FROM `mekp_perbaikan`
		inner JOIN mekp_perawatan  ON mekp_perbaikan.id_perawatan = mekp_perawatan.id_perawatan
		WHERE `mekp_perbaikan`.`id_perawatan` = $id ORDER BY `id_perbaikan`
		";

		return $this->db->query($query)->result_array();
	}

	public function getOnePerbaikan($id){

		$query = "SELECT a.*, b.*  FROM mekp_perbaikan a 
		JOIN mekp_lokasi b ON a.lokasi = b.id_lokasi
		WHERE a.id_perbaikan = $id
		";

		return $this->db->query($query)->row_array();
	}

	public function getKDBarang(){
		
		$match = $this->input->post('a');
		$this->db->like('kd_barang',$match);

    	$query = $this->db->get('mekp_barang');      //pass data to query
    	return $query->row_array();

    }

    public function getLaporan($tabel,$tgl,$awal,$akhir){

    	$query = "SELECT * FROM $tabel WHERE ($tgl BETWEEN '$awal' AND '$akhir'
    	";
    	return $this->db->query($query)->result_array();
    }

	//mutasi
	public function getAllMutasi(){

		$query = "SELECT a.*, c.nm_lokasi as lokasi_awal, b.*, d.nm_lokasi as lokasi_akhir FROM `mekp_mutasi` `a`
		JOIN `mekp_barang` `b` ON `a`.`id_barang` = `b`.`id_barang`
		JOIN `mekp_lokasi` `c` ON `a`.lokasi_awal = `c`.`id_lokasi`
        JOIN `mekp_lokasi` `d` ON `a`.lokasi_rinci = `d`.`id_lokasi`
	
		";

		return $this->db->query($query)->result_array();
	}

	//peminjaman
	public function getAllPeminjaman(){

		$query = "SELECT a.*, b.nm_barang  FROM mekp_peminjaman a 
		JOIN mekp_barang b ON a.id_barang = b.id_barang ORDER BY `id_peminjaman`
		";

		return $this->db->query($query)->result_array();
	}

	public function getOnePeminjaman($id){

		$query = "SELECT a.*, b.*  FROM mekp_peminjaman a 
		JOIN mekp_lokasi b ON a.lokasi = b.id_lokasi
		WHERE a.id_peminjaman = $id
		";

		return $this->db->query($query)->row_array();
	}
}