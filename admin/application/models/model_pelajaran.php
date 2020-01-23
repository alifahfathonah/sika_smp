<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pelajaran extends CI_Model {

	public function tampildatapelajaran()
	{
		$data = "SELECT
				mata_pelajaran.kd_pelajaran,
				mata_pelajaran.nm_pelajaran,
				mata_pelajaran.bobot
				FROM
				mata_pelajaran
				ORDER BY mata_pelajaran.bobot ASC";
		return $this->db->query($data);
	}

	public function getdata($key)
	{
		$this->db->where('kd_pelajaran',$key);
		$hasil = $this->db->get('mata_pelajaran');
		return $hasil;
	}

	public function getupdate($key,$data)
	{
		$this->db->where('kd_pelajaran',$key);
		$this->db->update('mata_pelajaran',$data);
	}

	public function getinsert($data)
	{
		$this->db->insert('mata_pelajaran',$data);
	}

	public function getdelete($key)
	{
		$this->db->where('kd_pelajaran',$key);
		$this->db->delete('mata_pelajaran');
	}


}
