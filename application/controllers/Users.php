<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->view('navbar');
        $this->load->model('user');
    }
    // this is also a simple change

    //________________indexUser.php to show all records___________________________________________________________________________
    function index(){
        // Fetch all user data
        $data['users'] = $this->user->getRows();        
        // Load view to display users
        $this->load->view('users/indexUser', $data);
    }
    // ___________________________________________________________________________________________-


    
    //get data from views/users/add.php and send it to the database
    function add(){ 
        if($this->input->post('userSubmit')){
            
            //Check whether user upload picture
            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = 'uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['picture']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }
            
            //Prepare array of user data
            $userData = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'picture' => $picture
            );
            
            //Pass user data to model
            $insertUserData = $this->user->insert($userData);
            
            if ($insertUserData) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Failed to insert data']);
            }

            
            
            if($insertUserData){
                $this->session->set_flashdata('success_msg', 'User data have been added successfully.');
            }else{
                $this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
            }
      
        }
        //Form for adding user data
        $this->load->view('users/add');
    }

    // _________________________________________________________________________________________
    function edit($id){
        // Get the user data
        $data['user'] = $this->user->getRow($id);
    
        if($this->input->post('userSubmit')){
            // Update user data
            $userData = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
    
            // If a new picture is uploaded, update the picture
            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = 'uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['picture']['name'];
                
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $userData['picture'] = $uploadData['file_name'];
                }
            }
            
            $update = $this->user->update($userData, $id);
            if($update){
                $this->session->set_flashdata('success_msg', 'User data updated successfully.');
            }else{
                $this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
            }
            redirect('users');
        }
        
        // Load the edit form view
        $this->load->view('users/edit', $data);
    }
    


    
    // _________________________________________________________________________________________
    function delete($id){
        $delete = $this->user->delete($id);
        
        if($delete){
            $this->session->set_flashdata('success_msg', 'User deleted successfully.');
        }else{
            $this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
        }
        redirect('users');
    }

    
}