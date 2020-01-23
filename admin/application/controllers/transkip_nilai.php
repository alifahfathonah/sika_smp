<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transkip_nilai extends CI_Controller {

	public function index()
	{
		$this->load->model('model_nilai');
		$this->model_security->getsecurity();
		$isi['content'] 			= 'laporan/transkip_nilai/lap_transkip';
		$isi['judul'] 				= 'Transkip Nilai';
		$isi['sub_judul']			= 'Transkip Nilai';


 		if(isset($_POST['nis'])){
		$nis = $this->input->post('nis');
		$isi['data']				= $this->model_nilai->tampildatatranskip();
		$isi['ratarata']				= $this->model_nilai->ratarata();
	}
		$this->load->view('tampilan_home', $isi);

	}

}
