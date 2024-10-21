<div class="container">
    <h2>Edit User</h2>
    
    <form role="form" method="post" enctype="multipart/form-data">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $user['name']; ?>" />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="text" name="email" value="<?php echo $user['email']; ?>" />
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" type="text" name="username" value="<?php echo $user['username']; ?>" />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" value="<?php echo $user['password']; ?>" />
                </div>
                <div class="form-group">
                    <label>Picture</label>
                    <input class="form-control" type="file" name="picture" />
                    <?php if(!empty($user['picture'])): ?>
                        <img src="<?php echo base_url('uploads/images/'.$user['picture']); ?>" width="50">
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="userSubmit" value="Update">
                </div>
            </div>
        </div>
    </form>
</div>
