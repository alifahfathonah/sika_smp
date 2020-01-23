<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_m extends CI_Model {
var $table='setting';
	
	public function tampil()
    {
    	$this->db->select('*');
        $this->db->from($this->table);
        $getid=$this->db->get();
        return $getid->row();
    }
    public function insert($data)
    { 
        $this->db->update($this->table,$data);
        return $this->db->insert_id();
    }
    
}

/* End of file phonebook_m.php */
/* Location: ./application/models/phonebook_m.php */