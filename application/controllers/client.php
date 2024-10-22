<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('client_model');
        $this->load->helper('url');
    }

    public function index() { 
        
        $this->load->view('client/client_view');
        // $data['client'] = $this->user->get_clients();  
        // $this->load->view('client/client_view', $data);
    }

    public function fetch_clients() {
        $data = $this->client_model->get_clients();
        echo json_encode($data);
    }

    public function insert_client() {
        $data = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'email' => $this->input->post('email'),
            'photo' => $this->upload_image()
        ];
        $this->client_model->insert_client($data);
        echo json_encode(['status' => true]);
    }

    public function get_client($id) {
        $data = $this->client_model->get_client($id);
        echo json_encode($data);
    }

    // public function update_client() {
    //     $id = $this->input->post('id');
    //     $data = [
    //         'name' => $this->input->post('name'),
    //         'email' => $this->input->post('email'),
    //         'photo' => $this->upload_image()
    //     ];
    //     $this->Student_model->update_student($id, $data);
    //     echo json_encode(['status' => true]);
    // }
    public function update_client() {
        $id = $this->input->post('id');
        $data = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'email' => $this->input->post('email'),
        ];    
        // Check if a new photo is uploaded
        if (!empty($_FILES['photo']['name'])) // Upload new image if provided    
        {   $data['photo'] = $this->upload_image();    }        
        // Update client with new data (and possibly new image)
        $this->client_model->update_client($id, $data);
        echo json_encode(['status' => true]);
    }

    



    public function delete_client($id) {
        $this->client_model->delete_client($id);
        echo json_encode(['status' => true]);
    } 



    // private function upload_image() {
    //     $config['upload_path'] = './uploads/';
    //     $config['allowed_types'] = 'gif|jpg|png|jpeg';
    //     $config['max_size'] = 2048; // 2MB
    //     $this->load->library('upload', $config);
    
    //     if ($this->upload->do_upload('photo')) {
    //         return $this->upload->data('file_name'); // only return the filename
    //     } else {
    //         return 'default.jpg'; // return a default image if upload fails
    //     }
    // }
    private function upload_image() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048; // 2MB
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('photo')) {
            return $this->upload->data('file_name'); // only return the filename
        } else {
            return 'default.jpg'; // return a default image if upload fails
        }
    }
    
    
}
