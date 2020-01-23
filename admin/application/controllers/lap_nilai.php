<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_nilai extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();
		$isi['content'] 			= 'laporan/nilai/lap_datanilai';
		$isi['judul'] 				= 'Laporan';
		$isi['sub_judul']			= 'Laporan Nilai Siswa';
		$this->load->view('tampilan_home', $isi);
	}

}
