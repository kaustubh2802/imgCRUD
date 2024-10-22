<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php require('navbar.php'); ?> 

</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Welcome, <?php echo $this->session->userdata('username'); ?>!</h2>

        <div class="fs-3">
        <div class="text-center my-4">
             
            <?php $photo = $this->session->userdata('photo'); ?>
            <img src="<?php echo base_url('uploads/' . $photo); ?>" alt="User Photo" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
        </div>

        <p class="text-center">Email: <?php echo $this->session->userdata('email'); ?> <br>
     Password: <?php echo $this->session->userdata('password'); ?></p>
     </div>

        <div class="text-center">
            <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>  






<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    < ?php require('navbar.php'); ?> 
</head>
<body>
    <h2>Welcome, < ?php echo $this->session->userdata('name'); ?>!</h2>
    <p>Email: < ?php echo $this->session->userdata('email'); ?></p>

    <a href="< ?php echo base_url('auth/logout'); ?>">Logout</a>
</body>
</html> -->

