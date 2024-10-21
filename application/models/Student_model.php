<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_students() {
        return $this->db->get('students')->result();
    }

    public function insert_student($data) {
        return $this->db->insert('students', $data);
    }

    public function get_student($id) {
        return $this->db->get_where('students', ['id' => $id])->row();
    }

    public function update_student($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('students', $data);
    }

    public function delete_student($id) {
        return $this->db->delete('students', ['id' => $id]);
    }
}
