<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php require('navbar.php');?>
    
</head>
<body>
    <!-- <h2>Login</h2>
    < ?php if(isset($error)) { echo '<p style="color:red;">' . $error . '</p>'; } ?>

    <form action="< ?php echo base_url('auth/login'); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" name="submit" value="Login">
    </form> -->
<!-- </body>
</html> -->


<div class="container mt-3 p-5 bg-warning">
    <form action="<?php echo base_url('auth/login'); ?>" method="post"> 
    <div class="mb-3">
    <h2>Login</h2>
    <?php if(isset($error)) { echo '<p style="color:red;">' . $error . '</p>'; } ?>

        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary" name="submit" value="Login">Submit</button>
    </form>
</div>

</body>
</html>