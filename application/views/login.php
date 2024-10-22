<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Include jQuery for AJAX handling -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <?php require('navbar.php'); ?> 
</head>
<body>
    
    <p id="error" style="color:red;"></p> 
    <div class="container overflow-hidden">
        <div class="row">
                <div class="col p-4 border border-3 border-warning rounded-1">
                
                    <form id="loginForm"><h2>Login</h2><hr>
                        <label for="username">Username:</label>
                        <input class="form-control"type="text" id="username" name="username" required><br>

                        <label for="password">Password:</label>
                        <input  class="form-control" type="password" id="password" name="password" required><br>

                        <button class="btn btn-lg btn-dark"type="submit">Login</button>
                    </form>
                
                </div>
                <div class="col">
                <div class="p-3 border bg-light">Custom column padding</div>
                </div>
        </div>
</div>

   






    <script type="text/javascript">
       
            $('#loginForm').on('submit', function(e) {
                e.preventDefault(); // Prevent form submission
                
                // Get the form data
                var username = $('#username').val();
                var password = $('#password').val();
// alert(username);
                // AJAX call to send the login details
                $.ajax({
                    url: '<?php echo base_url('Auth/login'); ?>',
                    type: 'POST',
                    data: { username: username, password: password },
                    success: function(response) {
                       
                            // If login is successful, redirect to dashboard
                     //   alert(username);
                            Swal.fire({
                            title: 'Login Successful!',
                            text: 'You will be redirected to the dashboard shortly.',
                            icon: 'success',
                            timer: 3000, // Time in milliseconds (3 seconds)
                            showConfirmButton: false // Hides the "OK" button
                        });
                            window.location.href = '<?php echo base_url('dashboard'); ?>';
                        
                    },
                    error: function() {
                        // Handle error
                        $('#error').text('An error occurred, please try again.');
                    }
                });
            });
      
    </script>
</body>
</html>


