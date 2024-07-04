<?php include_once __DIR__ . '/../layouts/header.html'; ?>
    <div class="container mt-5">
        <h1><?php echo $data['title']; ?></h1>
        <form action="<?php echo base_url('author/update'); ?>" method="post" class="mt-3">
            <input type="hidden" name="id" value="<?php echo $data['author']['id']; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $data['author']['name']; ?>" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo base_url('author'); ?>" class="btn btn-secondary">Back to List</a>
        </form>
    </div>
<?php include_once __DIR__ . '/../layouts/footer.html'; ?>
