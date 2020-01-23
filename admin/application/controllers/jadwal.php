<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function index()
	{
		$this->load->model('Model_jadwal');
		$this->model_security->getsecurity();
		$isi['content'] 			= 'jadwal/tampil_datajadwal';
		$isi['judul'] 				= 'Transaksi';
		$isi['sub_judul']			= 'Jadwal Pelajaran';
		$isi['data']				= $this->Model_jadwal->tampildatajadwal();
		$this->load->view('tampilan_home', $isi);
	}
	
	public function tambah()
	{
		$this->model_security->getsecurity();
		$isi['content'] 			= 'jadwal/form_tambahjadwal';
		$isi['judul'] 				= 'Transaksi';
		$isi['sub_judul']			= 'Tambah Jadwal Pelajaran';
		$isi['kode']				= '';
		$isi['pelajaran']			= '';
		$isi['guru']				= '';
		$isi['kelas']				= '';
		$isi['hari']				= '';
		$isi['waktu']				= '';

		$this->load->view('tampilan_home', $isi);
	}


	public function edit()
	{
		$this->model_security->getsecurity();
		$isi['content'] 			= 'jadwal/form_tambahjadwal';
		$isi['judul'] 				= 'Transaksi';
		$isi['sub_judul']			= 'Edit Jadwal Pelajaran';

		$key = $this->uri->segment(3);
		$this->db->where('kd_jadwal',$key);
		$query = $this->db->get('jadwal_pelajaran');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['kode']				= $row->kd_jadwal;
				$isi['pelajaran']			= $row->kd_pelajaran;
				$isi['guru']				= $row->nip;
				$isi['kelas']				= $row->kd_kelas;
				$isi['hari']				= $row->hari;
				$isi['waktu']				= $row->waktu;
			}
		}
		else
		{
				$isi['kode']				= '';
				$isi['pelajaran']			= '';
				$isi['guru']				= '';
				$isi['kelas']				= '';
				$isi['hari']				= '';
				$isi['waktu']				= '';
		}


		$this->load->view('tampilan_home', $isi);
	}

	public function simpan()
	{
		$this->model_security->getsecurity();

		$key = $this->input->post('kode');
		$data['kd_jadwal']					= $this->input->post('kode');
		$data['kd_pelajaran'] 				= $this->input->post('pelajaran');
		$data['nip'] 						= $this->input->post('guru');
		$data['kd_kelas']					= $this->input->post('kelas');
		$data['hari'] 						= $this->input->post('hari');
		$data['waktu'] 						= $this->input->post('waktu');
		

		$this->load->model('model_jadwal');
		$query = $this->model_jadwal->getdata($key);
		if($query->num_rows()>0)
		{
			$this->model_jadwal->getupdate($key,$data);
			$this->session->set_flashdata('info','Data sudah di update');
		}
		else
		{
			$this->model_jadwal->getinsert($data);
			$this->session->set_flashdata('info','Data sudah disimpan');
		}
		redirect ('jadwal/tambah');

	}

	public function delete()
	{
		$this->model_security->getsecurity();
		$this->load->model('model_jadwal');

		$key = $this->uri->segment(3);
		$this->db->where('kd_jadwal',$key);
		$query = $this->db->get('jadwal_pelajaran');
		if($query->num_rows()>0)
		{
			$this->model_jadwal->getdelete($key);
		}
		redirect ('jadwal_pelajaran');
	}
	
	

}
