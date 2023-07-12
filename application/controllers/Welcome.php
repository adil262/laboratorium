<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Md_Peminjaman');
		$this->load->model('Md_Ruangan');
		$this->load->model('Md_Lab_pemrograman');
	}

	public function index()
	{
		$page_data['page_title'] = "SISTEM INFORMASI PEMINJAMAN LABORATORIUM";
		$page_data['page_judul'] = "JURUSAN TEKNOLOGI INFORMASI POLITEKNIK CALTEX RIAU";

		$page_data['peminjaman'] = $this->Md_Peminjaman->getByPeminjamanAktif();
		$page_data['ruangan'] = $this->Md_Ruangan->getTotalRuangan();
		$page_data['barang'] = $this->Md_Lab_pemrograman->getTotalBarang();
		$page_data['paktif'] = $this->Md_Peminjaman->getTotalPeminjaman();

		$this->load->view('landingpage', $page_data);
	}
}
