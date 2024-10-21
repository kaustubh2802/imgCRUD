<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Student_model');
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('student_view');
    }

    public function fetch_students() {
        $data = $this->Student_model->get_students();
        echo json_encode($data);
    }

    public function insert_student() {
        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'photo' => $this->upload_image()
        ];
        $this->Student_model->insert_student($data);
        echo json_encode(['status' => true]);
    }

    public function get_student($id) {
        $data = $this->Student_model->get_student($id);
        echo json_encode($data);
    }

    public function update_student() {
        $id = $this->input->post('id');
        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'photo' => $this->upload_image()
        ];
        $this->Student_model->update_student($id, $data);
        echo json_encode(['status' => true]);
    }

    public function delete_student($id) {
        $this->Student_model->delete_student($id);
        echo json_encode(['status' => true]);
    }

    // private function upload_image() {
        // Implement file upload logic here
        // Return image path if upload successful
    // }
    // private function upload_image() {
    //     $config['upload_path'] = './uploads/';
    //     $config['allowed_types'] = 'gif|jpg|png|jpeg';
    //     $config['max_size'] = 2048; // 2MB
    //     $this->load->library('upload', $config);
    
    //     if ($this->upload->do_upload('photo')) {
    //         return 'uploads/' . $this->upload->data('file_name');
    //     } else {
    //         // return 'uploads/default.jpg'; // return a default image if upload fails
    //         return 'uploads/default.jpg'; // return a default image if upload fails
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
