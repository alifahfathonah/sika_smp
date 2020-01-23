<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	public function index()
	{
		$this->load->model('Model_nilai');
		$this->model_security->getsecurity();
		$isi['content'] 			= 'nilai/tampil_datanilai';
		$isi['judul'] 				= 'Transaksi';
		$isi['sub_judul']			= 'Nilai Siswa';
		$isi['data']				= $this->Model_nilai->tampildatanilai();
		$this->load->view('tampilan_home', $isi);
	}

	public function tambah()
	{
		$this->model_security->getsecurity();
		$isi['content'] 			= 'nilai/form_tambahnilai';
		$isi['judul'] 				= 'Transaksi';
		$isi['sub_judul']			= 'Tambah Nilai Siswa';
		$isi['kode']					= '';
		$isi['siswa']					= '';
		$isi['pelajaran']			= '';
		$isi['guru']					= '';
		$isi['tugas']					= '';
		$isi['uts']						= '';
		$isi['uas']						= '';

		$this->load->view('tampilan_home', $isi);
	}


	public function edit()
	{
		$this->model_security->getsecurity();
		$isi['content'] 			= 'nilai/form_tambahnilai';
		$isi['judul'] 				= 'Transaksi';
		$isi['sub_judul']			= 'Edit Nilai Siswa';

		$key = $this->uri->segment(3);
		$this->db->where('kd_nilai',$key);
		$query = $this->db->get('nilai');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$isi['kode']				= $row->kd_nilai;
				$isi['siswa']				= $row->nis;
				$isi['pelajaran']			= $row->kd_pelajaran;
				$isi['guru']				= $row->nip;
				$isi['tugas']				= $row->tugas;
				$isi['uts']					= $row->uts;
				$isi['uas']					= $row->uas;
			}
		}
		else
		{
				$isi['kode']				= '';
				$isi['siswa']				= '';
				$isi['pelajaran']			= '';
				$isi['guru']				= '';
				$isi['tugas']				= '';
				$isi['uts']					= '';
				$isi['uas']					= '';
		}
		$this->load->view('tampilan_home', $isi);
	}


	public function simpan()
	{
		$this->model_security->getsecurity();

		$key = $this->input->post('kode');
		$data['kd_nilai']					= $this->input->post('kode');
		$data['nis'] 						= $this->input->post('siswa');
		$data['kd_pelajaran'] 				= $this->input->post('pelajaran');
		$data['nip']						= $this->input->post('guru');
		$data['tugas'] 						= $this->input->post('tugas');
		$data['uts'] 						= $this->input->post('uts');
		$data['uas'] 						= $this->input->post('uas');

		$this->load->model('model_nilai');
		$query = $this->model_nilai->getdata($key);
		if($query->num_rows()>0)
		{
			$this->model_nilai->getupdate($key,$data);
			$this->session->set_flashdata('info','Data Sudah Di Update');
		}
		else
		{
			$this->model_nilai->getinsert($data);
			$this->session->set_flashdata('info','Data Sudah Di Simpan');
		}
		redirect ('nilai/tambah');

	}

	public function delete()
	{
		$this->model_security->getsecurity();
		$this->load->model('model_nilai');

		$key = $this->uri->segment(3);
		$this->db->where('kd_nilai',$key);
		$query = $this->db->get('nilai');
		if($query->num_rows()>0)
		{
			$this->model_nilai->getdelete($key);
		}
		redirect ('nilai');
	}

	public function detailnilai()
	{
		$this->model_security->getsecurity();
		$isi['content'] 			= 'nilai/tampildatanilai';
		$isi['judul'] 				= 'Transaksi';
		$isi['sub_judul']			= 'Transaksi Nilai Siswa';

		$this->model_security->getsecurity();
		$this->load->model('model_nilai');

		$key = $this->uri->segment(3);
		$this->db->where('kd_nilai',$key);
		$query = $this->db->get('nilai');
		if($query->num_rows()>0)
		{
			$this->model_nilai->detailnilai($key);
		}

}
}
