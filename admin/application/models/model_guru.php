<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_guru extends CI_Model {

	public function tampildataguru()
	{
		$data = "SELECT
		guru.nip,
		guru.nm_guru,
		guru.jenis_kelamin,
		guru.jabatan,
		guru.tempat_lahir,
		guru.tanggal_lahir,
		guru.alamat_rumah,
		guru.notelp_guru
		FROM
		guru
		ORDER BY jabatan ASC";
		return $this->db->query($data);
	}

	public function getdata($key)
	{
		$this->db->where('nip',$key);
		$hasil = $this->db->get('guru');
		return $hasil;
	}

	public function getupdate($key,$data)
	{
		$this->db->where('nip',$key);
		$this->db->update('guru',$data);
	}

	public function getinsert($data)
	{
		$this->db->insert('guru',$data);
	}

	public function getdelete($key)
	{
		$this->db->where('nip',$key);
		$this->db->delete('guru');
	}
}
