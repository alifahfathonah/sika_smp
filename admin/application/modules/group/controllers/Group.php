<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends MX_Controller {
	public $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
       	$this->load->model('Group_m');
       	$this->load->model('setting/Setting_m');

	}


	public function index()
	{
			$this->data['judul'] 				= 'SMS Manager';
			$this->data['sub_judul']			= 'Group';
			$this->data['Settinglist']=$this->Setting_m->tampil();
			$this->data['grouplist']=$this->Group_m->tampil();
			$this->data['content']='vgroup';
			$this->load->view('tampilan_home',$this->data);
	}


	public function save()
	{

			$this->form_validation->set_rules('nama','Nama Group','required');
			if($this->form_validation->run()==FALSE)
			{
				$this->session->set_flashdata('pesan', 'pastikan semua field diisi');
				$this->data['content']='vgroup';
				$this->load->view('tampilan_home',$this->data);
			}else
			{
				$data=array(
						'nama'	=> $this->input->post('nama')
					);
				$save=$this->Group_m->insert($data);
				$this->session->set_flashdata('Data Group berhasil Disimpan', 'sukses');
				echo json_encode(array('status'=>TRUE));
			}
	}

	public function delete($group_id)
	{
				$this->Group_m->hapus($group_id);
				$this->session->set_flashdata('pesan', 'data berhasil di hapus');
				echo json_encode(array('status'=>TRUE));
	}


	public function update($group_id)
	{
		$data=$this->Group_m->getid($group_id);
		echo json_encode($data);
	}


	public function updateaction()
	{
		$data=array(
			'nama'	=>$this->input->post('nama')

			);
		$this->Group_m->actionupdate(array('group_id'=>$this->input->post('group_id')),$data);
		echo json_encode(array('status'=>TRUE));
	}


}

/* End of file logih.php */
/* Location: ./application/controllers/logih.php */
