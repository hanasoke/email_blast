<!-- Add this to your existing view file -->
<div class="container mt-4">
    <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    
    <?php if($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
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