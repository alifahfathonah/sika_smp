<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan_terkirim extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();
		$isi['content'] 			= 'pesan/tampil_pesan';
		$isi['judul'] 				= 'Pesan';
		$isi['sub_judul']			= 'Pesan Terkirim';
		$isi['data']				= $this->db->get('pesan');
		$this->load->view('tampilan_home', $isi);
	}

	public function delete()
	{
		$this->model_security->getsecurity();
		$this->load->model('model_pesan');

		$key = $this->uri->segment(3);
		$this->db->where('kd_pesan',$key);
		$query = $this->db->get('pesan');
		if($query->num_rows()>0)
		{
			$this->model_pesan->getdelete($key);
		}
		redirect ('pesan_terkirim');
	}

	public function hapussemua()
	{
		$this->model_security->getsecurity();
		$this->load->model('model_pesan');
		
		{
			$this->model_pesan->gethapussemua('pesan');
		}
		redirect ('pesan_terkirim');
	}
}