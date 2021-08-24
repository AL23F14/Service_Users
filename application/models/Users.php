<?php

class Users extends CI_Model{
    public $table ='usuarios';
    public $table_id = 'id_usuario';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function findAll(){
        $this->db->select();
        $this->db->from($this->table);
        $query = $this->db->get();

        return $query->result();
    }
}


?>