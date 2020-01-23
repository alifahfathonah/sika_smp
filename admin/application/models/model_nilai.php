<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_nilai extends CI_Model {

	public function tampildatanilai()
	{
		$data = "SELECT
				nilai.kd_nilai,
				siswa.nm_siswa,
				kelas.nm_kelas,
				mata_pelajaran.nm_pelajaran,
				mata_pelajaran.bobot,
				guru.nm_guru,
				nilai.tugas,
				nilai.uts,
				nilai.uas
				FROM
				nilai ,
				mata_pelajaran ,
				siswa ,
				guru ,
				kelas
				WHERE
				nilai.kd_pelajaran = mata_pelajaran.kd_pelajaran AND
				nilai.nis = siswa.nis AND
				siswa.kd_kelas = kelas.kd_kelas AND
				nilai.nip = guru.nip
				ORDER BY siswa.kd_kelas ASC, nilai.kd_pelajaran ASC";
		return $this->db->query($data);
	}

	public function getlistnilai()
	{
		return $this->db->get('nilai');
	}

	public function getdata($key)
	{
		$this->db->where('kd_nilai',$key);
		$hasil = $this->db->get('nilai');
		return $hasil;
	}

	public function getupdate($key,$data)
	{
		$this->db->where('kd_nilai',$key);
		$this->db->update('nilai',$data);
	}

	public function getinsert($data)
	{
		$this->db->insert('nilai',$data);
	}

	public function getdelete($key)
	{
		$this->db->where('kd_nilai',$key);
		$this->db->delete('nilai');
	}

	function manualQuery($q)
	{
		return $this->db->query($q);
	}

	public function tampildatatranskip()
	{
		$data = "SELECT
						siswa.nm_siswa,
						kelas.nm_kelas,
						mata_pelajaran.nm_pelajaran,
						mata_pelajaran.bobot,
						guru.nm_guru,
						nilai.tugas,
						nilai.uts,
						nilai.uas
						FROM
						nilai ,
						mata_pelajaran ,
						siswa ,
						guru ,
						kelas
						WHERE
						nilai.kd_pelajaran = mata_pelajaran.kd_pelajaran AND
						nilai.nis = siswa.nis AND
						siswa.kd_kelas = kelas.kd_kelas AND
						nilai.nip = guru.nip AND
						nilai.nis = ".$_POST['nis'];
		return $this->db->query($data);
	}

	public function ratarata()
	{
		 $rata  = "SELECT (tugas+uts+uas)/3 as rata from nilai where nis = ".$_POST['nis'];
		 return $this->db->query($rata);
	}

}
