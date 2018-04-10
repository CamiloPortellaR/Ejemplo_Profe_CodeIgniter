<?php
if(!defined('BASEPATH')) exit('No esta permitido acceder directamente');
class Mensaje extends CI_Model{
	#====================
	function getRows($id=""){
		if(!empty($id)){
			$query=$this->db->get_where('mensajes',array('id'=>$id));
			return $query->row_array();
		}else{
			$query=$this->db->get('mensajes');
			return $query->result_array();
		}
	}
	#====================
	public function insert($data=array()){
		$insert=$this->db->insert('mensajes',$data);
		if($insert){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}
	#====================
	public function update($data,$id){
		if(!empty($data) && !empty($id)){
			$update=$this->db->update('mensajes',$data,array('id'=>$id));
			return $update?true:false;
		}else{
			return false;
		}
	}
	#====================
	public function delete($id){
		$delete = $this->db->delete('mensajes',array('id'=>$id));
		return $delete?true:false;
	}
}

?>