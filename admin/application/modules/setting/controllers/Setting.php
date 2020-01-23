<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
	public $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
       //	$this->load->model('group/Group_m');
       	$this->load->model('Setting_m');
       	//$this->load->helper('kirim_sms');

	}

	
	public function index()
	{
		$this->data['Settinglist']=$this->Setting_m->tampil();

		$this->data['halaman']='vsetting';
		$this->load->view('_main',$this->data);
	}


	public function simpan()
	{
		$data=array(
						'namaaplikasi'	=> $this->input->post('namaaplikasi'),
						'footer'		=> $this->input->post('footer')
					);
				$save=$this->Setting_m->insert($data);
				$this->data['Settinglist']=$this->Setting_m->tampil();

		redirect('setting','refresh');
	}


}

/* End of file phonebook.php */
/* Location: ./application/controllers/phonebook.php */
