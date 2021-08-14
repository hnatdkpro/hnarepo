<!-- This is cys apanel_model -->

<?php
class cysapanel_model extends CI_Model
{
	function test_main()
	{
		echo "This is model function";
	}

	function fetch_data()
	{
		$this->db->order_by("id","DESC");
		$this->db->select("*");
		$this->db->from("tbl_cysitems");
		$query = $this->db->get();
		return $query;
	}

	function insert_data($data)
	{
		$this->db->insert("tbl_cysitems", $data);
	}

	function fetch_single_data($id)
	{
		$this->db->where("id", $id);
		$query = $this->db->get("tbl_cysitems");
		return $query;	
	}

	function update_data($data, $id)
	{
		$this->db->where("id", $id);
		$this->db->update("tbl_cysitems", $data);
	}

	function delete_data($id)
	{
		$this->db->where("id", $id);
		$this->db->delete("tbl_cysitems");
	}


}
?>