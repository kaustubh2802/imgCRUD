
<div class="container">
<p class="bg-success text-light"><?php echo $this->session->flashdata('success_msg'); ?></p>
<p class="bg-danger text-light"><?php echo $this->session->flashdata('error_msg'); ?></p>

<form role="form" method="post" enctype="multipart/form-data">
    <div class="panel">
        <div class="panel-body">
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" name="name" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="text" name="email" />
            </div>
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" type="text" name="username" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="password" name="password" />
            </div>
            <div class="form-group">
                <label>Picture</label>
                <input class="form-control" type="file" name="picture" />
            </div>
             <div class="form-group">
                <input type="submit" class="btn btn-warning" name="userSubmit" value="Add">
            </div>
        </div>
    </div>
</form>
</div>