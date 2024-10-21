<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model{
    function __construct() {
        $this->tableName = 'users';
        $this->primaryKey = 'id';
    }

    //fetch all record 
    public function getRows(){
        $query = $this->db->get($this->tableName);
        return $query->result_array(); // Return result as an array
    }


    //fetch record of $id user
    public function getRow($id){
        $query = $this->db->get_where($this->tableName, array($this->primaryKey => $id));
        return $query->row_array(); // Return as array
    }

    //update query for $id user
    public function update($data, $id){
        $this->db->where($this->primaryKey, $id);
        $update = $this->db->update($this->tableName, $data);
        return $update ? true : false;
    } 
    

    //to delete
    public function delete($id){
        $this->db->where($this->primaryKey, $id);
        $delete = $this->db->delete($this->tableName);
        return $delete ? true : false;
    }
    
    
    
    
    public function insert($data = array()){
        if(!array_key_exists("created",$data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified",$data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }

}