<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pesan extends CI_Model {

	public function tampildatapesan()
	{
		$data = "SELECT
				pesan.kd_pesan,
				pesan.nomor,
				pesan.pesan
				FROM
				pesan
				ORDER BY kd_pesan ASC";
		return $this->db->query($data);
	}

	public function getdata($key)
	{
		$this->db->where('kd_pesan',$key);
		$hasil = $this->db->get('pesan');
		return $hasil;
	}

	public function getinsert($data)
	{
		$this->db->insert('pesan',$data);
	}

	public function getdelete($key)
	{
		$this->db->where('kd_pesan',$key);
		$this->db->delete('pesan');
	}

	public function gethapussemua()
	{
		$this->db->empty_table('pesan');
	}

}