<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_siswa extends CI_Controller {

	public function index()
	{
		$this->load->model('Model_siswa');
		$this->model_security->getsecurity();
		$isi['content'] 			= 'laporan/siswa/lap_datasiswa';
		$isi['judul'] 				= 'Laporan';
		$isi['sub_judul']			= 'Siswa';
		$isi['data']				= $this->Model_siswa->tampildatasiswa();
		$this->load->view('tampilan_home', $isi);
	}
	
}
