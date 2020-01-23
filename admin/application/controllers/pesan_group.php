<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan_group extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();
		$isi['content'] 			= 'pesan/group_pesan';
		$isi['judul'] 				= 'Pesan';
		$isi['sub_judul']			= 'Pesan Group';
		$this->load->view('tampilan_home', $isi);
	}

	 public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('url','html','form');
  }

  public function tambah()
  {
    $this->model_security->getsecurity();
    $isi['content']       = 'pesan/group_pesan';
    $isi['judul']         = 'Pesan';
    $isi['sub_judul']     = 'Tambah Pesan';
    $isi['kode']          = '';
    $isi['mobile']        = '';
    $isi['message']       = '';
    $this->load->view('tampilan_home', $isi);
  }
 

 
  public function sendmsg()
  {
   $data = array(
        array(
                'kd_pesan' => 'kode',
                'nomor' => 'mobile',
                'pesan' => 'message'
        ),
        array(
                'kd_pesan' => 'kode2',
                'nomor' => 'mobile',
                'pesan' => 'message'
        )

);
   $this->db->insert_batch('pesan', $data);

  }
 
}