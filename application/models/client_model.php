<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_clients() {
        return $this->db->get('client')->result();
    }

    public function insert_client($data) {
        return $this->db->insert('client', $data);
    }

    public function get_client($id) {
        return $this->db->get_where('client', ['id' => $id])->row();
    }

    public function update_client($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('client', $data);
    }

    public function delete_client($id) {
        return $this->db->delete('client', ['id' => $id]);
    }
}
