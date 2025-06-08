<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="<?php echo site_url('users'); ?>">Email Blast</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link"  href="<?php echo site_url('users'); ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo site_url('call'); ?>">Call</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Add this to your existing view file -->
<div class="container mt-4">
    <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo $this->session->flashdata('success'); ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    <?php endif; ?>
    
    <?php if($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert"><?php echo $this->session->flashdata('error'); ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    <?php endif; ?>
    
    <form method="post" action="<?php echo site_url('call/send_blast'); ?>">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Select Users</div>
                    <div class="card-body">
                        <?php foreach($users as $user): ?>
                        <div class="form-check">
                            <input class="form-check-input <?php echo form_error('users[]') ? 'is-invalid' : ''; ?>" 
                                   type="checkbox" 
                                   name="users[]" 
                                   value="<?php echo $user['name']; ?>"
                                   <?php echo set_checkbox('users[]', $user['name']); ?>>
                            <label class="form-check-label">
                                <?php echo $user['name']; ?>
                            </label>
                        </div>
                        <?php endforeach; ?>
                        <?php echo form_error('users[]', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Email Details</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">HRD Emails</label>
                            <input type="text" class="form-control <?php echo form_error('hrd_emails') ? 'is-invalid' : ''; ?>" 
                                   name="hrd_emails" 
                                   value="<?php echo set_value('hrd_emails'); ?>"
                                   placeholder="email1@gmail.com, email2@yahoo.com">
                            <?php echo form_error('hrd_emails', '<div class="invalid-feedback">', '</div>'); ?>
                            <div class="form-text">Only Gmail and Yahoo addresses allowed</div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" name="message" rows="5" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Send Email Blast</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>