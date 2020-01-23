<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

	public function tampildatauser()
	{
		$data = "SELECT
				`user`.kd_user,
				`user`.username,
				`user`.`password`,
				`user`.nama,
				`user`.`level`
				FROM
				`user`
				ORDER BY `user`.`level` ASC";
		return $this->db->query($data);
	}

	public function getdata($key)
	{
		$this->db->where('kd_user',$key);
		$hasil = $this->db->get('user');
		return $hasil;
	}

	public function getupdate($key,$data)
	{
		$this->db->where('kd_user',$key);
		$this->db->update('user',$data);
	}

	public function getinsert($data)
	{
		$this->db->insert('user',$data);
	}

	public function getdelete($key)
	{
		$this->db->where('kd_user',$key);
		$this->db->delete('user');
	}


}
