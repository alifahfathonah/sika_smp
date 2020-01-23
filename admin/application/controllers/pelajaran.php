<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelajaran extends CI_Controller {

	public function index()
	{
		$this->load->model('model_pelajaran');
		$this->model_security->getsecurity();
		$isi['content'] 			= 'pelajaran/tampil_datapelajaran';
		$isi['judul'] 				= 'Master';
		$isi['sub_judul']			= 'Mata Pelajaran';
		$isi['data']				= $this->model_pelajaran->tampildatapelajaran();
		$this->load->view('tampilan_home', $isi);
	}
	public function tambah()
	{
		$this->model_security->getsecurity();
		$isi['content'] 			= 'pelajaran/form_tambahpelajaran';
		$isi['judul'] 				= 'Master';
		$isi['sub_judul']			= 'Tambah Pelajaran';
		$isi['kode']				= '';
		$isi['pelajaran']			= '';
		$isi['bobot']				= '';
		$this->load->view('tampilan_home', $isi);
	}


	public function edit()
	{
		$this->model_security->getsecurity();
		$isi['content'] 			= 'pelajaran/form_tambahpelajaran';
		$isi['judul'] 				= 'Master';
		$isi['sub_judul']			= 'Edit Pelajaran';

		$key = $this->uri->segment(3);
		$this->db->where('kd_pelajaran',$key);
		$query = $this->db->get('mata_pelajaran');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['kode']			= $row->kd_pelajaran;
				$isi['pelajaran']		= $row->nm_pelajaran;
				$isi['bobot']			= $row->bobot;
			}
		}
		else
		{
				$isi['kode']			= '';
				$isi['pelajaran']		= '';
				$isi['bobot']			= '';
		}


		$this->load->view('tampilan_home', $isi);
	}

	public function simpan()
	{
		$this->model_security->getsecurity();

		$key = $this->input->post('kode');
		$data['kd_pelajaran']		= $this->input->post('kode');
		$data['nm_pelajaran'] 		= $this->input->post('pelajaran');
		$data['bobot'] 				= $this->input->post('bobot');

		$this->load->model('model_pelajaran');
		$query = $this->model_pelajaran->getdata($key);
		if($query->num_rows()>0)
		{
			$this->model_pelajaran->getupdate($key,$data);
			$this->session->set_flashdata('info','Data Sudah Diupdate');
		}
		else
		{
			$this->model_pelajaran->getinsert($data);
			$this->session->set_flashdata('info','Data Tersimpan');
		}
		redirect ('pelajaran/tambah');

	}

	public function delete()
	{
		$this->model_security->getsecurity();
		$this->load->model('model_pelajaran');

		$key = $this->uri->segment(3);
		$this->db->where('kd_pelajaran',$key);
		$query = $this->db->get('mata_pelajaran');
		if($query->num_rows()>0)
		{
			$this->model_pelajaran->getdelete($key);
		}
		redirect ('pelajaran');
	}
	

}
