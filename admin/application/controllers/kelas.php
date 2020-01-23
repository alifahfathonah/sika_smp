<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function index()
	{
		$this->load->model('Model_kelas');
		$this->model_security->getsecurity();
		$isi['content'] 			= 'kelas/tampil_datakelas';
		$isi['judul'] 				= 'Master';
		$isi['sub_judul']			= 'Kelas';
		$isi['data']				= $this->Model_kelas->tampildatakelas();
		$this->load->view('tampilan_home', $isi);
	}
	public function tambah()
	{
		$this->model_security->getsecurity();
		$isi['content'] 			= 'kelas/form_tambahkelas';
		$isi['judul'] 				= 'Master';
		$isi['sub_judul']			= 'Tambah Kelas';
		$isi['kode']				= '';
		$isi['kelas']				= '';
		$isi['nip']					= '';
		$this->load->view('tampilan_home', $isi);
	}


	public function edit()
	{
		$this->model_security->getsecurity();
		$isi['content'] 			= 'kelas/form_tambahkelas';
		$isi['judul'] 				= 'Master';
		$isi['sub_judul']			= 'Edit Kelas';

		$key = $this->uri->segment(3);
		$this->db->where('kd_kelas',$key);
		$query = $this->db->get('kelas');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$isi['kode']			= $row->kd_kelas;
				$isi['kelas']			= $row->nm_kelas;
				$isi['nip']				= $row->nip;
			}
		}
		else
		{
				$isi['kode']			= '';
				$isi['kelas']			= '';
				$isi['nip']				= '';
		}


		$this->load->view('tampilan_home', $isi);
	}

	public function simpan()
	{
		$this->model_security->getsecurity();

		$key = $this->input->post('kode');
		$data['kd_kelas']				= $this->input->post('kode');
		$data['nm_kelas'] 			= $this->input->post('kelas');
		$data['nip'] 						= $this->input->post('nip');

		$this->load->model('model_kelas');
		$query = $this->model_kelas->getdata($key);
		if($query->num_rows()>0)
		{
			$this->model_kelas->getupdate($key,$data);
			$this->session->set_flashdata('info','Data Sudah Di Update');
		}
		else
		{
			$this->model_kelas->getinsert($data);
			$this->session->set_flashdata('info','Data Tersimpan');
		}
		redirect ('kelas/tambah');

	}

	public function delete()
	{
		$this->model_security->getsecurity();
		$this->load->model('model_kelas');

		$key = $this->uri->segment(3);
		$this->db->where('kd_kelas',$key);
		$query = $this->db->get('kelas');
		if($query->num_rows()>0)
		{
			$this->model_kelas->getdelete($key);
		}
		redirect ('kelas');
	}


}
