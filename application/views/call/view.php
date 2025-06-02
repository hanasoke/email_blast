<div class="container">
    <h2>Email Blast System</h2>
    
    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    
    <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>
    
    <?php echo form_open('call/send_blast'); ?>
    
    <div class="form-group">
        <label>HRD Email (Sender)</label>
        <input type="text" name="hrd_emails" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label>Subject</label>
        <input type="text" name="subject" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label>Content</label>
        <textarea name="content" class="form-control" rows="10" required></textarea>
        <small class="text-muted">
            Gunakan placeholder: {nama} untuk nama applicant, {email} untuk email applicant
        </small>
    </div>
    
    <div class="form-group">
        <label>Recipients (<?php echo count($applicants); ?> applicants)</label>
        <ul class="list-group">
            <?php foreach($applicants as $app): ?>
                <li class="list-group-item">
                    <?php echo $app->nama; ?> &lt;<?php echo $app->email; ?>&gt;
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    
    <button type="submit" class="btn btn-primary">Send Email Blast</button>
    
    <?php echo form_close(); ?>
    
    <hr>
    
    <h3>Email Templates</h3>
    <div class="list-group">
        <?php foreach($templates as $template): ?>
            <div class="list-group-item">
                <h4><?php echo $template->subject; ?></h4>
                <p><?php echo character_limiter(strip_tags($template->content), 100); ?></p>
                <small class="text-muted">
                    Created: <?php echo date('d M Y', strtotime($template->created_date)); ?>
                </small>
            </div>
        <?php endforeach; ?>
    </div>
</div>