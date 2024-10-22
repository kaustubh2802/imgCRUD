<!-- < ?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model'); // Load the Auth model
        $this->load->library('session'); // Load session library
    }

    public function login() {
        // Check if form was submitted
        if($this->input->post('submit')) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Call the model function to verify login details
            $client = $this->Auth_model->check_login($username, $password);

            if($client) {
                // If login details are correct, set session and redirect
                $this->session->set_userdata(array(
                    'id' => $client->id,
                    'username' => $client->username,
                    'password' => $client->password,
                    'email' => $client->email,
                    'photo' => $client->photo,
                ));

                // Redirect to another page (e.g. dashboard)
                redirect('dashboard');
                // base_url('dashboard');
            } else {
                // Incorrect login details, show an error message
                $data['error'] = "Invalid Username or Password";
                $this->load->view('login', $data);
            }
        } else {
            // Load the login view
            $this->load->view('login');
        }
    }

    public function logout() {
        // Destroy session and redirect to login
        $this->session->sess_destroy();
        redirect('auth/login');
    }
} -->





<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model'); // Load the Auth model
        $this->load->library('session');  // Load session library
    }

    public function login() {
        // Check if the request is AJAX
        if ($this->input->is_ajax_request()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Call the model function to verify login details
            $client = $this->Auth_model->check_login($username, $password);

            // print_r($client);
            // exit;

            if($client) {
                // If login details are correct, set session
                $this->session->set_userdata(array(
                    'id' => $client->id,
                    'username' => $client->username,
                    'email' => $client->email,
                    'password' => $client->password,
                ));

                // Return a success response
                echo json_encode(array('status' => 'success', 'message' => 'Login successful!'));
                
            } else {
                // Return an error response for invalid credentials
                echo json_encode(array('status' => 'error', 'message' => 'Invalid Username or Password'));
            }
        } else {
            // Load the login page if not an AJAX request
            $this->load->view('login');
        }
    }

    public function logout() {
        // Destroy session and redirect to login
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
