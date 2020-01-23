<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_siswa extends CI_Model {

	public function tampildatasiswa()
	{
		$data = "SELECT
				siswa.nis,
				siswa.nm_siswa,
				kelas.nm_kelas,
				siswa.jenis_kelamin,
				siswa.tempat_lahir,
				siswa.tanggal_lahir,
				siswa.alamat_rumah,
				siswa.notelp_siswa,
				siswa.notelp_orangtua
				FROM
				siswa ,
				kelas
				WHERE
				kelas.kd_kelas = siswa.kd_kelas
				ORDER BY siswa.kd_kelas ASC";
		return $this->db->query($data);
	}

	public function getlistkelas()
	{
		return $this->db->get('kelas');
	}



	public function getdata($key)
	{
		$this->db->where('nis',$key);
		$hasil = $this->db->get('siswa');
		return $hasil;
	}

	public function getupdate($key,$data)
	{
		$this->db->where('nis',$key);
		$this->db->update('siswa',$data);
	}

	public function getinsert($data)
	{
		$this->db->insert('siswa',$data);
	}

	public function getdelete($key)
	{
		$this->db->where('nis',$key);
		$this->db->delete('siswa');
	}


}
