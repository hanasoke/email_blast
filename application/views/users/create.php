<div class="container">
    <div class="row my-3">
        <div class="col">
            <h1>Create New User</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
        
            <form method="post" action="<?php echo site_url('users/create'); ?>">
                <div class="form-group mb-2">
                    <label for="name" class="mb-2">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo set_value('name'); ?> ">

                    <?php echo form_error('name', '<div class="text-danger">', '</div>'); ?>
                </div>

                <div class="form-group mb-2">
                    <label for="username" class="mb-2">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo set_value('username'); ?>">
                    <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
                </div>

                <div class="form-group mb-2">
                    <label for="email" class="mb-2">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo set_value('email');  ?>">
                    <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
                </div>

                <div class="form-group mb-4">
                    <label for="address" class="mb-2">Address</label>
                    <textarea class="form-control" name="address" id="address"><?php echo set_value('address'); ?></textarea>
                    <?php echo form_error('address', '<div class="text-danger">', '</div>'); ?>
                </div>

                <button type="submit" class="btn btn-primary float-end">Save</button>
                <a href="<?php echo site_url('users'); ?>" class="btn btn-secondary float-start">Back</a>
            </form>

        </div>
    </div>
</div>

