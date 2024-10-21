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
    
    <title>Student Management System</title>
    <?php require('navbar.php');?>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Student Management System</h1>
        <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addModal">Add Student</button>
        <div id="studentTable" class="mt-3"></div>
    </div>

    <!-- Add Modal -->
<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm"> 
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
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
                            <label for="editName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPhoto" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="editPhoto" name="photo">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script> -->
    <script>
        $(document).ready(function() {
            loadStudents();

            // Load students function
            function loadStudents() {
                $.ajax({
                    url: '<?= base_url("student/fetch_students") ?>',
                    type: 'GET',
                    success: function(data) {
                        const students = JSON.parse(data);
                        let rows = '';
                        students.forEach(student => {
                            rows += `
                                <tr>
                                    <td>${student.id}</td>
                                    <td>${student.name}</td>
                                    <td>${student.email}</td>
                                    <td><img src="<?= base_url('uploads/') ?>${student.photo}" width="50" alt="photo"></td>
                                    <td>
                                        <button class="btn btn-warning editBtn" data-id="${student.id}">Edit</button>
                                        <button class="btn btn-danger deleteBtn" data-id="${student.id}">Delete</button>
                                    </td>
                                </tr>
                            `;
                        });
                        $('#studentTable').html(`
                        <table class="table table-bordered table-hover">
                        <thead>
                        <tr><th>ID</th><th>Name</th><th>Email</th><th>Photo</th><th>Actions</th></tr>
                        </thead><tbody>${rows}</tbody></table>`); 
                    }
                });
            }

                         // Add Student AJAX
             $('#addForm').on('submit', function(e) {
                   e.preventDefault();
                   let formData = new FormData(this);
                   $.ajax({
                       url: '<?= base_url("student/insert_student") ?>',
                       type: 'POST',
                       data: formData,
                       contentType: false,
                       processData: false,
                       success: function(response) {
                        //    loadStudents();
                           alert('Student added successfully!');
                           $('#addModal').modal('hide');
                           $('editName').val('');
                           $('editEmail').val('');
                           $('editPhoto').val('');

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
                   const studentId = $(this).data('id');
                   $.ajax({
                       url: '<?= base_url("student/get_student/") ?>' + studentId,
                       type: 'GET',
                       success: function(data) {
                           const student = JSON.parse(data);
                           $('#editId').val(student.id);
                           $('#editName').val(student.name);
                           $('#editEmail').val(student.email);
                           $('#editPhoto').val('');
                           $('#editModal').modal('show');
                       }
                   });
               });

               $('#editForm').on('submit', function(e) {
                   e.preventDefault();
                   let formData = new FormData(this);
                   $.ajax({
                       url: '<?= base_url("student/update_student") ?>',
                       type: 'POST',
                       data: formData,
                       contentType: false,
                       processData: false,
                       success: function(response) {
                           $('#editModal').modal('hide');
                           loadStudents();
                        //    sweetalert2
                        Swal.fire("Data Updated Successfully!");

                           alert('Student updated successfully!');
                       }
                   });
               });

               // Delete Student AJAX
               $(document).on('click', '.deleteBtn', function() {
                   const studentId = $(this).data('id');
                   if (confirm('Are you sure you want to delete this student?')) {
                       $.ajax({
                           url: '<?= base_url("student/delete_student/") ?>' + studentId,
                           type: 'GET',
                           success: function(response) {
                               loadStudents();

                               Swal.fire({
                                    title: "Good job!",
                                    text: "You clicked the button!",
                                    icon: "success"
                                    });
                               alert('Student deleted successfully!');
                           }
                       });
                   }
               });
           });
       </script>
   </body>
   </html>

