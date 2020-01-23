<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_m extends CI_Model {

	
var $table='group';
	public function insert($data)
    { 
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }
    public function jumlahdata ()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $getid=$this->db->get();
        return $getid->num_rows();
    }
    public function tampil()
    {
    	$this->db->from($this->table);
    	$tampil=$this->db->get();
    	return $tampil->result();
    }
    public function hapus($group_id)
    {
    	$this->db->where('group_id',$group_id);
    	$this->db->delete($this->table);
    }
    public function getid($group_id)
    {
    	$this->db->from($this->table);
    	$this->db->where('group_id',$group_id);
    	$getid=$this->db->get();
    	return $getid->row();
    }
    public function actionupdate($where,$data)
    {
    	$this->db->update($this->table,$data,$where);
    	return $this->db->affected_rows();
    }
    public function getgroup()
    {
        $this->db->order_by('nama','asc');
        $result=$this->db->get($this->table)->result();
        return $result;
    }
}

/* End of file group_m.php */
/* Location: ./application/models/group_m.php */