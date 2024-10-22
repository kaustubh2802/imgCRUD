<!-- < ?php
class Auth_model extends CI_Model {

    public function check_login($username, $password) {
        // Query to find a matching username and password in the database
        $this->db->where('username', $username);
        $this->db->where('password', $password); // Not encrypted
        $query = $this->db->get('client');

        // If a row is found, return the client data, else return false
        if($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
} -->
<?php
class Auth_model extends CI_Model {

    public function check_login($username, $password) {
        // Query to find a matching username and password in the database
        $this->db->where('username', $username);
        $this->db->where('password', $password); // Not encrypted
        $query = $this->db->get('client');

        // If a row is found, return the client data, else return false
        if($query->num_rows() == 1) {
            // print_r("WE ARE IN THE MODEL");
            // exit;
            return $query->row();
        } else {
            return false;
        }
    }
}

