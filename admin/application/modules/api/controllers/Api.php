<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MX_Controller {
	public $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
       //	$this->load->model('group/Group_m');
       	$this->load->model('Api_m');
       	$this->load->helper('kirim_sms');
       	$this->load->model('setting/Setting_m');
	}


	public function index()
	{
		$this->data['judul'] 				= 'SMS MANAGER';
		$this->data['sub_judul']			= 'Api Setting';
		$this->data['Settinglist']=$this->Setting_m->tampil();
		$this->data['phonebooklist']=$this->Api_m->tampil();

		$this->data['content']='vapi';
		$this->load->view('tampilan_home',$this->data);
	}


	public function simpan()
	{
		$data=array(
						'userkey'	=> $this->input->post('userkey'),
						'passkey'		=> $this->input->post('passkey')
					);
				$save=$this->Api_m->insert($data);
				$this->data['phonebooklist']=$this->Api_m->tampil();


		$this->data['judul'] 				= 'SMS MANAGER';
		$this->data['sub_judul']			= 'Api Setting';
		$this->data['content']='vapi';
		$this->load->view('tampilan_home',$this->data);
	}


}

/* End of file phonebook.php */
/* Location: ./application/controllers/phonebook.php */
