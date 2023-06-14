<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produk_model extends CI_Model{

	function getProduk(){
		$query = $this->db->get('produk2');
		return $query->result();
	}
	function getJual(){
		$this->db->where('status',"bisa");
		$query = $this->db->get('produk2');
		return $query->result();
	}
	function getTidak(){
		$this->db->where('status',"tidak");
		$query = $this->db->get('produk2');
		return $query->result();
	}
	function tambahProduk($dat){
		$query = $this->db->insert("produk2",$dat);
	}
	function editProduk($dat, $id){
		$this->db->where('id_produk', $id);
		$query = $this->db->update("produk2",$dat);
	}
	function hapusProduk($dat){
		$this->db->where('id_produk', $dat);
        $this->db->delete("produk2");
	}
}


?>