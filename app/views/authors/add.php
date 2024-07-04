<?php include_once __DIR__ . '/../layouts/header.html'; ?>
    <div class="container mt-5">
        <h1><?php echo $data['title']; ?></h1>
        <form action="<?php echo base_url('author/save'); ?>" method="post" class="mt-3">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="<?php echo base_url('author'); ?>" class="btn btn-secondary">Back to List</a>
        </form>
    </div>
<?php include_once __DIR__ . '/../layouts/footer.html'; ?>
