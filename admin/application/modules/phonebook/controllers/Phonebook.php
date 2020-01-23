<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phonebook extends CI_Controller {
	public $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
       	$this->load->model('group/Group_m');
       	$this->load->model('Phonebook_m');
       	$this->load->helper('kirim_sms');
		$this->load->model('setting/Setting_m');
	}


	public function index()
	{
		$this->data['judul'] 				= 'SMS Manager';
		$this->data['sub_judul']			= 'Phonebook';
		$this->data['Settinglist']=$this->Setting_m->tampil();
		$this->data['phonebooklist']=$this->Phonebook_m->tampil();
		$this->data['group']=$this->Group_m->getgroup();
		$this->data['content']='vphonebook';
		$this->load->view('tampilan_home', $this->data);
	}


	public function save()
	{
		{
			$this->form_validation->set_rules('namakontak','Nama ','required');
			$this->form_validation->set_rules('groupid','Group','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('no_hp','Nomor HP','required');

			if($this->form_validation->run()==FALSE)
			{
				$this->data['Settinglist']=$this->Setting_m->tampil();
				$this->session->set_flashdata('pesan', 'pastikan semua field diisi');
				$this->data['content']='vphonebook';
				$this->load->view('tampilan_home',$this->data);
			}else
			{
				$data=array(
						'namakontak'	=> $this->input->post('namakontak'),
						'groupid'		=> $this->input->post('groupid'),
						'email'			=> $this->input->post('email'),
						'no_hp'			=> $this->input->post('no_hp')
					);
				$save=$this->Phonebook_m->insert($data);
				$this->session->set_flashdata('pesan', 'sukses');
				echo json_encode(array('status'=>TRUE));
			}
		}
	}


	public function update($phonebook_id)
	{
		$data=$this->Phonebook_m->getid($phonebook_id);
		echo json_encode($data);
	}


	public function updateaction()
	{
		$data=array(
			'namakontak'	=> $this->input->post('namakontak'),
			'groupid'		=> $this->input->post('groupid'),
			'no_hp'			=> $this->input->post('no_hp'),
			'email'			=> $this->input->post('email')
			);
		$this->Phonebook_m->actionupdate(array('phonebook_id'=>$this->input->post('phonebook_id')),$data);
		$this->session->set_flashdata('pesan', 'sukses');
		echo json_encode(array('status'=>TRUE));
	}


	public function delete($phonebook_id)
	{
				$this->Phonebook_m->hapus($phonebook_id);
				$this->session->set_flashdata('pesan', 'data berhasil di hapus');
				echo json_encode(array('status'=>TRUE));
	}


	public function kirimsms($no_hp)
	{
			$this->data['judul'] 				= 'SMS Manager';
			$this->data['sub_judul']			= 'Kirim SMS';
			$this->data['Settinglist']=$this->Setting_m->tampil();
			$this->data['getid']=$this->Phonebook_m->getidbyphone($no_hp);
			$this->data['content']='vkirim';
			$this->load->view('tampilan_home',$this->data);
	}

	public function send()
	{
		$this->data['Settinglist']=$this->Setting_m->tampil();
		$no_hp=$this->input->post('no_hp');
		$namakontak=$this->input->post('namakontak');
		$isi=$this->input->post('isi');
		$b= str_replace('{nama}',$namakontak, $isi);
		$data=array(
				'nohp'=>$no_hp,
				'nama'=>$namakontak,
				'isi' =>$b
			);
		kirim_sms($no_hp,$b);
	}
	public function semua()
	{
		$this->data['judul'] 				= 'SMS Manager';
		$this->data['sub_judul']			= 'Pesan Semua';
		$this->data['Settinglist']=$this->Setting_m->tampil();
		$this->data['content']='vsemua';
		$this->load->view('tampilan_home',$this->data);
	}
	public function sendsemua()
	{
		$ab=$this->Phonebook_m->getno_hp();

		$isi	=$this->input->post('isi');
		foreach($ab as $nomor)
		{
			kirim_sms($nomor->no_hp,$isi);
		}
		$data=$this->session->set_flashdata('pesan', 'Pesan Telah Berhasil Dikirm');
		$this->data['phonebooklist']=$this->Phonebook_m->tampil();
		$this->data['content']='vphonebook';
		$this->load->view('tampilan_home',$this->data,$data);


	}
	public function group()
	{
		$this->data['judul'] 				= 'SMS Manager';
		$this->data['sub_judul']			= 'Pesan Group';
		$this->data['Settinglist']=$this->Setting_m->tampil();
		$this->data['group']=$this->Group_m->getgroup();
		$this->data['content']='vgroup';
		$this->load->view('tampilan_home',$this->data);

	}
	public function sendgroup ()
	{
		$isi=$this->input->post('isi');
		$nama=$this->input->post('groupid');
		$kontak=$this->Phonebook_m->kontaknama($nama);
		foreach ($kontak as $valuex) {
		$av=str_replace('{nama}', $valuex->namakontak, $isi);
		kirim_sms($valuex->no_hp,$av);
		}
	}

}

/* End of file phonebook.php */
/* Location: ./application/controllers/phonebook.php */
