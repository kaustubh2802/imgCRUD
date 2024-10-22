<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Include jQuery for AJAX handling -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
</head>
<body>
    <h2>Login</h2>
    <p id="error" style="color:red;"></p>

    <form id="loginForm">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>






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


