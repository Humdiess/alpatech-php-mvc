<?php include_once __DIR__ . '/../layouts/header.html'; ?>
    <div class="container mt-5">
        <h1><?php echo $data['title']; ?></h1>
        <div class="card my-3" style="width: 18rem;">
            <div class="card-body">
                <p>ID: <?php echo $data['publisher']['id']; ?></p>
                <p>Name: <?php echo $data['publisher']['name']; ?></p>
            </div>
        </div>
        <div class="d-flex">
            <a href="<?php echo base_url('publisher/edit/' . $data['publisher']['id']); ?>" class="btn btn-warning me-2">Edit</a>
            <a href="<?php echo base_url('publisher/delete/' . $data['publisher']['id']); ?>" class="btn btn-danger">Delete</a>
            <a href="<?php echo base_url('publisher'); ?>" class="btn btn-secondary ms-2">Back to List</a>
        </div>
    </div>
<?php include_once __DIR__ . '/../layouts/footer.html'; ?>

