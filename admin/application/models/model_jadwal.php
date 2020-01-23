<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_jadwal extends CI_Model {

	public function tampildatajadwal()
	{
		$data = "SELECT
				jadwal_pelajaran.kd_jadwal,
				mata_pelajaran.nm_pelajaran,
				guru.nm_guru,
				kelas.nm_kelas,
				jadwal_pelajaran.hari,
				jadwal_pelajaran.waktu
				FROM
				guru ,
				jadwal_pelajaran ,
				kelas ,
				mata_pelajaran
				WHERE
				jadwal_pelajaran.kd_kelas = kelas.kd_kelas AND
				jadwal_pelajaran.kd_pelajaran = mata_pelajaran.kd_pelajaran AND
				jadwal_pelajaran.nip = guru.nip
				ORDER BY nm_kelas ASC";
		return $this->db->query($data);
	}

	public function getlistjadwal()
	{
		return $this->db->get('jadwal_pelajaran');
	}



	public function getdata($key)
	{
		$this->db->where('kd_jadwal',$key);
		$hasil = $this->db->get('jadwal_pelajaran');
		return $hasil;
	}

	public function getupdate($key,$data)
	{
		$this->db->where('kd_jadwal',$key);
		$this->db->update('jadwal_pelajaran',$data);
	}

	public function getinsert($data)
	{
		$this->db->insert('jadwal_pelajaran',$data);
	}

	public function getdelete($key)
	{
		$this->db->where('kd_jadwal',$key);
		$this->db->delete('jadwal_pelajaran');
	}


}
