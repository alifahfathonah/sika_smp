<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kelas extends CI_Model {

	public function tampildatakelas()
	{
		$data = "SELECT
					kelas.kd_kelas,
					kelas.nm_kelas,
					guru.nm_guru
					FROM
					guru ,
					kelas
					WHERE
					guru.nip = kelas.nip";
		return $this->db->query($data);
	}

	public function getlistguru()
	{
		return $this->db->get('guru');
	}

	public function getdata($key)
	{
		$this->db->where('kd_kelas',$key);
		$hasil = $this->db->get('kelas');
		return $hasil;
	}

	public function getupdate($key,$data)
	{
		$this->db->where('kd_kelas',$key);
		$this->db->update('kelas',$data);
	}

	public function getinsert($data)
	{
		$this->db->insert('kelas',$data);
	}

	public function getdelete($key)
	{
		$this->db->where('kd_kelas',$key);
		$this->db->delete('kelas');
	}


}
