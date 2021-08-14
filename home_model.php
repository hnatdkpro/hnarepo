<?php
class home_model extends CI_Model
{
    function check_login($username,$password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query=$this->db->get("cyslogin");
        if($query->num_rows()>0)
        {
            return true;
        }
            else
        {
            return false;
        }
    }


    function fetch_member_data()  
      {   
            //$this->make_query();
        $this->db->order_by("id","DESC");       
        $this->db->select("*");  
        $this->db->from("tbl_member");  
        $query = $this->db->get();  
        return $query;  
      } 

    function insert_data($data)  
      {  
           $this->db->insert("tbl_member", $data);  
      } 

    function delete_data($id){  
           $this->db->where("id", $id);  
           $this->db->delete("tbl_member");  

      }  

}
?>
