<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Check if the user is not logged in, redirect to login page
        if(!$this->session->userdata('username')) {
            redirect('auth/login');
        }
    }

    public function index() {
        // Load dashboard view
        $this->load->view('dashboard');
    }
}
