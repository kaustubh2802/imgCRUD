<div class="container">
    <h2 class="text-center">Users List</h2>
    <section> 

        <a class="btn btn-primary float-end m-3" href="<?php echo base_url('users/add'); ?>">New</a>
<button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentAddModal"> Add Student </button>
    </section>


       
    <?php if(!empty($users)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Picture</th>
                    <th>Created</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['password']; ?></td>
                        <td>
                            <?php if(!empty($user['picture'])): ?>
                                <img src="<?php echo base_url('uploads/images/'.$user['picture']); ?>" width="50">
                            <?php else: ?>
                                No picture
                            <?php endif; ?>
                        </td>
                        <td><?php echo $user['created']; ?></td>
                        <td>
                            <!-- Edit button -->
                            <a href="<?php echo base_url('users/edit/'.$user['id']); ?>" class="btn btn-info">Edit</a>
                            
                            <!-- Delete button -->
                            <form action="<?php echo base_url('users/delete/'.$user['id']); ?>" method="post" style="display:inline-block;">
                                <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure you want to delete this user?');">
                            </form>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No users found.</p>
    <?php endif; ?>
</div>
<<<<<<< HEAD

<!-- _________________ -->
<?php if($this->session->flashdata('success_msg')): ?>
    <script>
        Swal.fire({
            title: "Good job!",
            text: "<?php echo $this->session->flashdata('success_msg'); ?>",
            icon: "success"
        });
    </script>
<?php endif; ?>

<?php if($this->session->flashdata('error_msg')): ?>
    <script>
        Swal.fire({
            title: "Oops!",
            text: "<?php echo $this->session->flashdata('error_msg'); ?>",
            icon: "error"
        });
    </script>
<?php endif; ?>


























<!-- __________Add Student______________________________________________________________________________________ --> 
<div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveStudent">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Username</label>
                    <input type="text" name="Username" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Course</label>
                    <input type="password" name="password" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Picture</label>
                    <input type="file" name="picture" class="form-control" /> 
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Student</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- ________________________________________________________________________________________________ -->


<script>
        $(document).on('submit', '#saveStudent', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_student", true);
            $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('user/insert'); ?>",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Handle response
                    }
        });


            // $.ajax({
            //     type: "POST",
            //     base_url: "user/insert($data)",
            //     data: formData,
            //     processData: false,
            //     contentType: false,
            //     success: function (response) {
                    
            //         var res = jQuery.parseJSON(response);
            //         if(res.status == 422) {
            //             $('#errorMessage').removeClass('d-none');
            //             $('#errorMessage').text(res.message);

            //         }else if(res.status == 200){
            //             $('#errorMessage').addClass('d-none');
            //             $('#studentAddModal').modal('hide');
            //             $('#saveStudent')[0].reset();

            //             alertify.set('notifier','position', 'top-right');
            //             alertify.success(res.message);

            //             $('#myTable').load(location.href + " #myTable");

            //         }else if(res.status == 500) {
            //             alert(res.message);
            //         }
            //     }
            // });
        });
</script>








