<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$queryProduk = $this->produk_model->getProduk();
		$datProduk = array('queryPrd' => $queryProduk);
		$this->load->view('welcome_message',$datProduk);
	}
	public function __Construct()
	{
	    parent::__Construct();
		$this->load->model('produk_model');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
	}
	public function fungsitambah(){
	    $this->form_validation->set_rules('nmp','Nama','required');
		$this->form_validation->set_rules('hrg','Harga','numeric');
		$this->form_validation->set_rules('kat','Kategori','required');
		$this->form_validation->set_rules('stat','Status','required');
  
        if($this->form_validation->run() != false){

		$nama = $this->input->post("nmp");
		$harga = $this->input->post("hrg");
		$kategori = $this->input->post("kat");
		$status = $this->input->post("stat");
		$pilihan = $this->input->post("pilihan");
		$id = $this->input->post("id");

		
			if ($pilihan == "tambah"){
				$arrtam = array(
					'nama_produk' => $nama,
					'harga' => $harga,
					'kategori' => $kategori,
					'status' => $status
				);
				$this->produk_model->tambahProduk($arrtam);
				redirect(base_url(""));
			}
			else
			{
				$arrtam = array(
					'nama_produk' => $nama,
					'harga' => $harga,
					'kategori' => $kategori,
					'status' => $status
				);
				$this->produk_model->editProduk($arrtam,$id);
				redirect(base_url(""));
			}
		}
		else {
			$queryProduk = $this->produk_model->getProduk();
		    $datProduk = array('queryPrd' => $queryProduk);
		    $this->load->view('welcome_message',$datProduk);
		}
	}
	public function fungsihapus($id){
		$this->produk_model->hapusProduk($id);
		redirect(base_url(""));
	}
	public function fungsiganti(){
		$pilihan2 = $this->input->post("pilihan2");
		if ($pilihan2 == "con1"){
			$queryProduk = $this->produk_model->getJual();
		    $datProduk = array('queryPrd' => $queryProduk);
		    $this->load->view('welcome_message',$datProduk);
		}	
		else if ($pilihan2 == "con2"){
			$queryProduk = $this->produk_model->getTidak();
		    $datProduk = array('queryPrd' => $queryProduk);
		    $this->load->view('welcome_message',$datProduk);
		}	
		else {
			$queryProduk = $this->produk_model->getProduk();
		    $datProduk = array('queryPrd' => $queryProduk);
		    $this->load->view('welcome_message',$datProduk);
		}
	}
}
