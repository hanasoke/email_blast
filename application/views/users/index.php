<h1>Users List</h1>
<a href="<?php echo site_url('users/create'); ?>" class="btn btn-primary mb-3" >Add New User</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user['user_id']; ?></td>
                <td><?= $user['name']; ?></td>
                <td><?= $user['username']; ?></td>
                <td><?= $user['email']; ?></td>
                <td>
                    <a href="<?php echo site_url('users/edit/'.$user['user_id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                    
                    <a href="<?php echo site_url('users/delete/' .$user['user_id']);  ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?') " >Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>