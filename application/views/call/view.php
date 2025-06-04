<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="<?php echo site_url('users'); ?>">Email Blast</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('users'); ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active"  aria-current="page" href="<?php echo site_url('call'); ?>">Call</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<section class="container mt-4">
    <div class="row">
        <div class="col">
            <h1>Calling Users</h1>
        </div>
    </div>

    <?php if($this->session->flashdata('success')) : ?>
    <div class="row">
        <div class="col">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col">
        <form method="post" action="<?php echo site_url('call/send_blast'); ?>">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <?php foreach($users as $user): ?>
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" 
                                                   name="users[]" 
                                                   id="user_<?php echo $user['user_id']; ?>" 
                                                   value="<?php echo $user['name']; ?>">
                                            <label class="form-check-label" for="user_<?php echo $user['user_id']; ?>">
                                                <?php echo $user['name']; ?>
                                            </label>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Sent my message</h5>
                                <div class="mb-3">
                                    <label for="hrd_emails" class="form-label">HRD Emails</label>
                                    <input type="text" class="form-control" name="hrd_emails" id="hrd_emails" 
                                           placeholder="email1@example.com, email2@example.com" required>
                                    <div class="form-text">Separate multiple emails with commas</div>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Content</label>
                                    <textarea class="form-control" name="message" id="message" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-success float-end">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>