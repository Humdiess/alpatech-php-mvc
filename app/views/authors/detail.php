<?php include_once __DIR__ . '/../layouts/header.html'; ?>
    <div class="container mt-5">
        <h1><?php echo $data['title']; ?></h1>
        <div class="card my-3" style="width: 18rem;">
            <div class="card-body">
                <p class="card-text">ID: <?php echo $data['author']['id']; ?></p>
                <p class="card-text">Name: <?php echo $data['author']['name']; ?></p>
            </div>
        </div>
        <div class="d-flex">
            <a href="<?php echo base_url('author/edit/' . $data['author']['id']); ?>" class="btn btn-warning btn-sm me-2">Edit</a>
            <a href="<?php echo base_url('author/delete/' . $data['author']['id']); ?>" class="btn btn-danger btn-sm me-2">Delete</a>
            <a href="<?php echo base_url('author'); ?>" class="btn btn-secondary btn-sm">Back to List</a>
        </div>
    </div>
<?php include_once __DIR__ . '/../layouts/footer.html'; ?>
