<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phonebook_m extends CI_Model {
var $table='phonebook';

	public function tampil()
    {
    	$this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('group','group.group_id=phonebook.groupid');
        $result=$this->db->get();
        return $result->result();
    }
    public function jumlahdata ()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $getid=$this->db->get();
        return $getid->num_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }
    public function getid($phonebook_id)
    {
    	$this->db->from($this->table);
    	$this->db->where('phonebook_id',$phonebook_id);
    	$getid=$this->db->get();
    	return $getid->row();
    }
    public function groupid($groupid)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('groupid',$groupid);
        $getid=$this->db->get();
        return $getid->result();
    }
    public function kontaknama($kontaknama)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('groupid',$kontaknama);
        $getid=$this->db->get();
        return $getid->result();
    }
    public function getidbyphone($no_hp)
    {

    	$this->db->from($this->table);
    	$this->db->where('no_hp',$no_hp);
    	$getid=$this->db->get();
    	return $getid->row();
    }


    public function actionupdate($where,$data)
    {
    	$this->db->update($this->table,$data,$where);
    	return $this->db->affected_rows();
    }
    public function hapus($phonebook_id)
    {
    	$this->db->where('phonebook_id',$phonebook_id);
    	$this->db->delete($this->table);
    }
    public function getno_hp()
    {
        $this->db->order_by('no_hp','asc');
        $result=$this->db->get($this->table)->result();
        return $result;
    }
}

/* End of file phonebook_m.php */
/* Location: ./application/models/phonebook_m.php */
