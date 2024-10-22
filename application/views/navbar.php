<!DOCTYPE html>
<html lang="en">
<head>
<title>Bootstrap Example</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
</head>
<body>

    <div class="container-fluid mt-3">
            <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
            <div class="container-fluid">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo base_url(); ?>">Home</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="< ?php echo base_url('users/add'); ?>">Image CRUD</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('users/index'); ?>">IMG_CRUD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Student/index'); ?>">Student CRUD</a>
                </li>
                <li class="nav-item bg-danger">
                    <a class="nav-link text-dark" href="<?php echo base_url('auth/login'); ?>">Login</a>
                </li>
                <li class="nav-item bg-warning">
                    <a class="nav-link text-dark" href="<?php echo base_url('client/index'); ?>">Register Client</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
                </ul>
            </div>
            </nav>
    </div>

</body>
</html>

