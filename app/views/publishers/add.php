<?php include_once __DIR__ . '/../layouts/header.html'; ?>
    <div class="container mt-5">
        <h1><?php echo $data['title']; ?></h1>
        <form action="<?php echo base_url('publisher/save'); ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
        <a href="<?php echo base_url('publisher'); ?>" class="btn btn-secondary mt-3">Back to List</a>
    </div>
<?php include_once __DIR__ . '/../layouts/footer.html'; ?>

