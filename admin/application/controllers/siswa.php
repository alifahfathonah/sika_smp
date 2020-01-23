<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function index()
	{
		$this->load->model('Model_siswa');
		$this->model_security->getsecurity();
		$isi['content'] 			= 'siswa/tampil_datasiswa';
		$isi['judul'] 				= 'Master';
		$isi['sub_judul']			= 'Siswa';
		$isi['data']				= $this->Model_siswa->tampildatasiswa();
		$this->load->view('tampilan_home', $isi);
	}

	public function tambah()
	{
		$this->model_security->getsecurity();
		$isi['content'] 			= 'siswa/form_tambahsiswa';
		$isi['judul'] 				= 'Master';
		$isi['sub_judul']			= 'Tambah Siswa';
		$isi['kode']				= '';
		$isi['nama']				= '';
		$isi['kelas']				= '';
		$isi['jk']					= '';
		$isi['tempat_l']			= '';
		$isi['tanggal_l']			= '';
		$isi['alamat']				= '';
		$isi['notelp']				= '';
		$isi['notelp_orangtua']		= '';
		$this->load->view('tampilan_home', $isi);
	}


	public function edit()
	{
		$this->model_security->getsecurity();
		$isi['content'] 			= 'siswa/form_tambahsiswa';
		$isi['judul'] 				= 'Master';
		$isi['sub_judul']			= 'Edit Siswa';

		$key = $this->uri->segment(3);
		$this->db->where('nis',$key);
		$query = $this->db->get('siswa');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$isi['kode']				= $row->nis;
				$isi['nama']				= $row->nm_siswa;
				$isi['kelas']				= $row->kd_kelas;
				$isi['jk']					= $row->jenis_kelamin;
				$isi['tempat_l']			= $row->tempat_lahir;
				$isi['tanggal_l']			= $row->tanggal_lahir;
				$isi['alamat']				= $row->alamat_rumah;
				$isi['notelp']				= $row->notelp_siswa;
				$isi['notelp_orangtua']		= $row->notelp_orangtua;

			}
		}
		else
		{
				$isi['kode']				= '';
				$isi['nama']				= '';
				$isi['kelas']				= '';
				$isi['jk']					= '';
				$isi['tempat_l']			= '';
				$isi['tanggal_l']			= '';
				$isi['alamat']				= '';
				$isi['notelp']				= '';
				$isi['notelp_orangtua']		= '';
		}


		$this->load->view('tampilan_home', $isi);
	}

	public function simpan()
	{
		$this->model_security->getsecurity();

		$key = $this->input->post('kode');
		$data['nis']					= $this->input->post('kode');
		$data['nm_siswa'] 				= $this->input->post('nama');
		$data['kd_kelas'] 				= $this->input->post('kelas');
		$data['jenis_kelamin']			= $this->input->post('jk');
		$data['tempat_lahir'] 			= $this->input->post('tempat_l');
		$data['tanggal_lahir'] 			= $this->input->post('tanggal_l');
		$data['alamat_rumah']			= $this->input->post('alamat');
		$data['notelp_siswa'] 			= $this->input->post('notelp');
		$data['notelp_orangtua'] 		= $this->input->post('notelp_orangtua');

		$this->load->model('model_siswa');
		$query = $this->model_siswa->getdata($key);
		if($query->num_rows()>0)
		{
			$this->model_siswa->getupdate($key,$data);
			$this->session->set_flashdata('info','Data Sudah Di Update');
		}
		else
		{
			$this->model_siswa->getinsert($data);
			$this->session->set_flashdata('info','Data Sudah Di Simpan');
		}
		redirect ('siswa/tambah');

	}

	public function delete()
	{
		$this->model_security->getsecurity();
		$this->load->model('model_siswa');

		$key = $this->uri->segment(3);
		$this->db->where('nis',$key);
		$query = $this->db->get('siswa');
		if($query->num_rows()>0)
		{
			$this->model_siswa->getdelete($key);
		}
		redirect ('siswa');
	}


}
