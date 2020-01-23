<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function index()
	{
		$this->load->model('model_guru');
		$this->model_security->getsecurity();
		$isi['content'] 			= 'guru/tampil_dataguru';
		$isi['judul'] 				= 'Master';
		$isi['sub_judul']			= 'Guru';
		$isi['data']				= $this->model_guru->tampildataguru();
		$this->load->view('tampilan_home', $isi);
	}

	public function tambah()
	{
		$this->model_security->getsecurity();
		$isi['content'] 			= 'guru/form_tambahguru';
		$isi['judul'] 				= 'Master';
		$isi['sub_judul']			= 'Tambah Guru';
		$isi['kode']				= '';
		$isi['nama']				= '';
		$isi['jabatan']				= '';
		$isi['jk']					= '';
		$isi['tempat_l']			= '';
		$isi['tanggal_l']			= '';
		$isi['alamat']				= '';
		$isi['notelp']				= '';
		$this->load->view('tampilan_home', $isi);
	}


	public function edit()
	{
		$this->model_security->getsecurity();
		$isi['content'] 			= 'guru/form_tambahguru';
		$isi['judul'] 				= 'Master';
		$isi['sub_judul']			= 'Edit Guru';

		$key = $this->uri->segment(3);
		$this->db->where('nip',$key);
		$query = $this->db->get('guru');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$isi['kode']				= $row->nip;
				$isi['nama']				= $row->nm_guru;
				$isi['jabatan']				= $row->jabatan;
				$isi['jk']					= $row->jenis_kelamin;
				$isi['tempat_l']			= $row->tempat_lahir;
				$isi['tanggal_l']			= $row->tanggal_lahir;
				$isi['alamat']				= $row->alamat_rumah;
				$isi['notelp']				= $row->notelp_guru;
			}
		}
		else
		{
				$isi['kode']				= '';
				$isi['nama']				= '';
				$isi['jabatan']				= '';
				$isi['jk']					= '';
				$isi['tempat_l']			= '';
				$isi['tanggal_l']			= '';
				$isi['alamat']				= '';
				$isi['notelp']				= '';
		}


		$this->load->view('tampilan_home', $isi);
	}

	public function simpan()
	{
		$this->model_security->getsecurity();

		$key = $this->input->post('kode');
		$data['nip']					= $this->input->post('kode');
		$data['nm_guru'] 				= $this->input->post('nama');
		$data['jabatan'] 				= $this->input->post('jabatan');
		$data['jenis_kelamin']			= $this->input->post('jk');
		$data['tempat_lahir'] 			= $this->input->post('tempat_l');
		$data['tanggal_lahir'] 			= $this->input->post('tanggal_l');
		$data['alamat_rumah']			= $this->input->post('alamat');
		$data['notelp_guru'] 			= $this->input->post('notelp');

		$this->load->model('model_guru');
		$query = $this->model_guru->getdata($key);
		if($query->num_rows()>0)
		{
			$this->model_guru->getupdate($key,$data);
			$this->session->set_flashdata('info','Data Sudah Di Update');
		}
		else
		{
			$this->model_guru->getinsert($data);
			$this->session->set_flashdata('info','Data Sudah Di Simpan');
		}
		redirect ('guru/tambah');

	}

	public function delete()
	{
		$this->model_security->getsecurity();
		$this->load->model('model_guru');

		$key = $this->uri->segment(3);
		$this->db->where('nip',$key);
		$query = $this->db->get('guru');
		if($query->num_rows()>0)
		{
			$this->model_guru->getdelete($key);
		}
		redirect ('guru');
	}

}
