<?php
class Api_model extends CI_Model
{
 function fetch_all()
 {
  $this->db->order_by('id', 'DESC');
  return $this->db->get('usuarios');
 }

 function insert_api($data)
 {
  $this->db->insert('usuarios', $data);
  if($this->db->affected_rows() > 0)
  {
   return true;
  }
  else
  {
   return false;
  }
 }

 function fetch_single_user($user_id)
 {
  $this->db->where("id", $user_id);
  $query = $this->db->get('usuarios');
  return $query->result_array();
 }
 function update_api($user_id, $data)
 {
  $this->db->where("id", $user_id);
  $this->db->update("usuarios", $data);
 }
 
 function delete_single_user($user_id)
 {
  $this->db->where("id", $user_id);
  $this->db->delete("usuarios");
  if($this->db->affected_rows() > 0)
  {
   return true;
  }
  else
  {
   return false;
  }
 }
}