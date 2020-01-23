<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->load->model('model_user');
		$this->model_security->getsecurity();
		$isi['content'] 			= 'user/tampil_datauser';
		$isi['judul'] 				= 'User';
		$isi['sub_judul']			= 'User Setting';
		$isi['data']				= $this->model_user->tampildatauser();
		$this->load->view('tampilan_home', $isi);
	}
	
	public function tambah()
	{
		$this->model_security->getsecurity();
		$isi['content'] 			= 'user/form_tambahuser';
		$isi['judul'] 				= 'User';
		$isi['sub_judul']			= 'Tambah User';
		$isi['kode']				= '';
		$isi['username']			= '';
		$isi['pass']				= '';
		$isi['nama']				= '';
		$isi['level']				= '';
		$this->load->view('tampilan_home', $isi);
	}


	public function edit()
	{
		$this->model_security->getsecurity();
		$isi['content'] 			= 'user/form_tambahuser';
		$isi['judul'] 				= 'User';
		$isi['sub_judul']			= 'Edit user';

		$key = $this->uri->segment(3);
		$this->db->where('kd_user',$key);
		$query = $this->db->get('user');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['kode']				= $row->kd_user;
				$isi['username']			= $row->username;
				$isi['pass']				= $row->password;			
				$isi['nama']				= $row->nama;
				$isi['level']				= $row->level;
			}
		}
		else
		{
				$isi['kode']				= '';
				$isi['username']			= '';
				$isi['pass']				= '';
				$isi['nama']				= '';
				$isi['level']				= '';
		}


		$this->load->view('tampilan_home', $isi);
	}

	public function simpan()
	{
		$this->model_security->getsecurity();

		$key = $this->input->post('kode');
		$data['kd_user']					= $this->input->post('kode');
		$data['username'] 					= $this->input->post('username');
		$data['password'] 					= md5($this->input->post('pass'));
		$data['nama']						= $this->input->post('nama');
		$data['level'] 						= $this->input->post('level');
		
		$this->load->model('model_user');
		$query = $this->model_user->getdata($key);
		if($query->num_rows()>0)
		{
			$this->model_user->getupdate($key,$data);
			$this->session->set_flashdata('info','Data Sudah Di Update');
		}
		else
		{
			$this->model_user->getinsert($data);
			$this->session->set_flashdata('info','Data Sudah Di Simpan');
		}
		redirect ('user/tambah');

	}

	public function delete()
	{
		$this->model_security->getsecurity();
		$this->load->model('model_user');

		$key = $this->uri->segment(3);
		$this->db->where('kd_user',$key);
		$query = $this->db->get('user');
		if($query->num_rows()>0)
		{
			$this->model_user->getdelete($key);
		}
		redirect ('user');
	}


}
