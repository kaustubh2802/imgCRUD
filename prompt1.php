this is view
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>    
        <title>Client Management System</title>    
        <?php require(__DIR__ . '/../navbar.php'); ?> 
    </head>
        <body>
            <div class="container">
                <h1 class="mt-5">Client Management System</h1>
                <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addModal">Add Student</button>
                <div id="clientTable" class="mt-3"></div>
            </div>
        <!-- Add Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">New Client</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addForm"> 
                            <div class="mb-3">
                                <label for="username" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <!-- Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editForm">  
        
                                <input type="hidden" id="editId" name="id">
                                <div class="mb-3">
                                    <label for="editUserame" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="editUserame" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="editPassword" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="editEmail" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editPhoto" class="form-label">Upload New Photo (Optional)</label>
                                    <input type="file" class="form-control" id="editPhoto" name="photo">
                                </div>
                                <div class="mb-3">
                                    <label for="editPhoto" class="form-label">Current Photo</label><br>
                                    <img id="editPhotoPreview" src="" alt="Current photo" width="100">
                                </div>  
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  
            <script>
                $(document).ready(function() {
                    loadStudents();
                    // Load students function
                    function loadStudents() {
                        $.ajax({
                            url: '<?= base_url("client/fetch_clients") ?>',
                            type: 'GET',
                            success: function(data) {
                                const client = JSON.parse(data);
                                let rows = '';
                                client.forEach(cli => {
                                    // <button class="btn btn-danger deleteBtn" data-id="$ {cli.id}">Delete</button>
                                    rows += `
                                        <tr>
                                            <td>${cli.id}</td>
                                            <td>${cli.username}</td>
                                            <td>${cli.password}</td>
                                            <td>${cli.email}</td>
                                            <td><img src="<?= base_url('uploads/') ?>${cli.photo}" width="50" alt="photo"></td>
                                            <td>
                                                <button class="btn btn-warning editBtn" data-id="${cli.id}">Edit</button>
                                                <button class="btn btn-danger deleteBtn" data-id="${cli.id}" data-name="${cli.username}">Delete</button>
                                            </td>
                                        </tr>
                                    `;
                                });
                                $('#clientTable').html(`
                                <table class="table table-bordered table-hover">
                                <thead>
                                <tr><th>ID</th><th>User Name</th><th>Password</th><th>Email</th><th>Photo</th><th>Actions</th></tr>
                                </thead><tbody>${rows}</tbody></table>`); 
                            }
                        });
                    }
                    // Add Student AJAX
                    $('#addForm').on('submit', function(e) {
                        e.preventDefault();
                        let formData = new FormData(this);
                        $.ajax({
                            url: '<?= base_url("client/insert_client") ?>',
                            type: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                loadStudents();
                                alert('client added successfully!');
                                $('#username').val(''); 
                                $('#password').val(''); 
                                $('#email').val('');
                                $('#photo').val('');
                                $('#addModal').modal('hide');

                                //startOf-sweetAlert
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: "top-end",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.onmouseenter = Swal.stopTimer;
                                        toast.onmouseleave = Swal.resumeTimer;
                                    }
                                    });
                                    Toast.fire({
                                    icon: "success",
                                    title: "Signed in successfully"
                                    });
                                    // EndOf-sweetAlert
                            }
                        });
                    }); 
                    // Edit Student AJAX
                    $(document).on('click', '.editBtn', function() {
                        const cliID = $(this).data('id');
                        $.ajax({
                            url: '<?= base_url("client/get_client/") ?>' + cliID,
                            type: 'GET',
                            success: function(data) {
                                const cc = JSON.parse(data);
                                $('#editId').val(cc.id);
                                $('#editUserame').val(cc.username);
                                $('#editPassword').val(cc.password);
                                $('#editEmail').val(cc.email);  
                                $('#editPhotoPreview').attr('src', '<?= base_url("uploads/") ?>' + cc.photo); // Display the current photo
                                $('#editModal').modal('show');
                            }
                        });
                    });

                    $('#editForm').on('submit', function(e) {
                        e.preventDefault();
                        let formData = new FormData(this);
                        $.ajax({
                            url: '<?= base_url("client/update_client") ?>',
                            type: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                $('#editModal').modal('hide');
                                loadStudents();
                                //    sweetalert2                        
                                Swal.fire("Data Updated Successfully!");
                                alert('client updated successfully!');
                            }
                        });
                    });

                    // Delete client AJAX
                    $(document).on('click', '.deleteBtn', function() {
                        const cliId = $(this).data('id');
                        const cliName = $(this).data('name'); // Get the client name from the data attribute
                        if (confirm('Are you sure you want to delete this client?')) {
                            $.ajax({
                                url: '<?= base_url("client/delete_client/") ?>' + cliId,
                                type: 'GET',
                                success: function(response) {
                                    loadStudents();
                                    Swal.fire({
                                            title: "Good job!",
                                            text: `${cliName} has been successfully deleted!`,
                                            icon: "success"
                                            });
                                            alert(`${cliName} has been successfully deleted!`);
                                }
                            });
                        }
                    });
                });
            </script>
        </body>
</html>
view end;

this is controller
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
    public function update_client() {
        $id = $this->input->post('id');
        $data = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'email' => $this->input->post('email'),
        ];    
        if (!empty($_FILES['photo']['name']))     
        {   $data['photo'] = $this->upload_image();    }   
        $this->client_model->update_client($id, $data);
        echo json_encode(['status' => true]);
    }  
    public function delete_client($id) {
        $this->client_model->delete_client($id);
        echo json_encode(['status' => true]);
    } 
    private function upload_image() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048; // 2MB
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('photo')) {
            return $this->upload->data('file_name'); 
        } else {            return 'default.jpg';      }
    }  
    }

controller end;

this is model
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Client_model extends CI_Model {
    public function __construct() {        parent::__construct();    }
    public function get_clients() {        return $this->db->get('client')->result();    }
    public function insert_client($data) {        return $this->db->insert('client', $data);    }
    public function get_client($id) {        return $this->db->get_where('client', ['id' => $id])->row();    }
    public function update_client($id, $data) {        $this->db->where('id', $id);        return $this->db->update('client', $data);    }
    public function delete_client($id) {        return $this->db->delete('client', ['id' => $id]);    }
}
model end;

this is navbar
<!DOCTYPE html>
<html lang="en">
        <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
        </head>
        <body>

            <div class="container-fluid mt-3">
                    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
                    <div class="container-fluid">
                        <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link active" href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('users/index'); ?>">IMG_CRUD</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Student/index'); ?>">Student CRUD</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('client/index'); ?>">Client CRUD</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                        <li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a></li>
                        </ul>
                    </div>
                    </nav>
            </div>
        </body>
</html>
navbar end;

i want to make a login system, 
where we ask 3 values:
username,password,type(client,student,user);
 also i have stored password in the form varchar (not encrypted);
 match exact username and password if(matches), then go to login;

 also there is navbar,
 if client login -then show 3 list of nav items,
 if student login -then show 1 list of nav items,
 if user login -then show 4 list of nav items,
 if no one is login,  then current list show zali pahije;
_________________________________________________________________________
i want to make a login system in the same project of codeigniter3, 
where  ask username and password,
also i stores password in the varchar (not encrypted) in the table named as client(`id`, `name`, `email`, `username`, `password`,) ;
match exact username and password: if(matches), then show new pages and start session and pass all the values of table in the session ;



 







