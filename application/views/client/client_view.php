<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css"> -->
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
                        <!-- ___________________________________________ -->
                        <!-- <div class="mb-3">
                            <label for="editPhoto" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="editPhoto" name="photo">
                        </div> -->
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
                           // Set the photo field with the filename (if you have it stored)
                            // if (cc.photo) {
                            //     $('#editPhoto').after(`<p>Current photo: ${cc.photo}</p>`);
                            // }
                            // ------------------------
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

