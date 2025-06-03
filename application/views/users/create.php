<h1>Create New User</h1>

<form method="post" action="<?php echo site_url('users/create'); ?>">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="<?php echo set_value('name'); ?> ">

        <?php echo form_error('name', '<div class="text-danger">', '</div>'); ?>
    </div>

    <div class="form-group">
        <label for="username">username</label>
        <input type="text" class="form-control" name="username" id="username" value="<?php echo set_value('username'); ?>">
        <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="<?php echo set_value('email');  ?>">
        <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <textarea class="form-control" name="address" id="address"><?php echo set_value('address'); ?></textarea>
        <?php echo form_error('address', '<div class="text-danger">', '</div>'); ?>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="<?php echo site_url('users'); ?>" class="btn btn-secondary">Cancel</a>
</form>