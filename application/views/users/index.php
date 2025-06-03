<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="<?php echo site_url('users'); ?>">Email Blast</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo site_url('users'); ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('call'); ?>">Call</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">

    <div class="row mb-3">
        <div class="col-6 col-md-9 col-lg-10">
          <h3>Users List</h3>
        </div>
        <div class="col-6 col-md-3 col-lg-2">
          <p class="float-end"><a href="<?php echo site_url('users/create'); ?>" class="btn btn-primary">Add New User</a></p>
        </div>
    </div>



    <div class="row">
        <div class="col">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo $this->session->flashdata('success'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Initialize counter
                    $counter = 1;
                    foreach($users as $user): ?>
                        <tr> 
                            <td><?= $counter++; ?></td>
                            <td><?= $user['name']; ?></td>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td><?= $user['address']; ?></td>
                            <td>
                                <a href="<?php echo site_url('users/edit/'.$user['user_id']); ?>" class="btn btn-warning btn-sm mb-2">Edit</a>
                                
                                <a href="<?php echo site_url('users/delete/' .$user['user_id']);  ?>" class="btn btn-danger btn-sm mb-2" onclick="return confirm('Are you sure?') " >Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    

</div>




