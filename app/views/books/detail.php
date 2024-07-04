<?php include_once __DIR__ . '/../layouts/header.html'; ?>
<div class="container mt-5">
    <h1 class="mb-4"><?php echo $data['title']; ?></h1>
    <div class="card my-3" style="width: 18rem;">
        <div class="card-body">
        <div class="mb-3">
            <label class="form-label" style="font-weight: bold">Book Name</label>
            <p><?php echo $data['book']['name']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label" style="font-weight: bold">Author</label>
            <p><?php echo $data['book']['author_name']; ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label" style="font-weight: bold">Publisher</label>
            <p><?php echo $data['book']['publisher_name']; ?></p>
        </div>
        </div>
    </div>
    <a href="<?php echo base_url('book/edit/' . $data['book']['id']); ?>" class="btn btn-warning">Edit Book</a>
    <a href="<?php echo base_url('book'); ?>" class="btn btn-secondary">Back to List</a>
</div>
<?php include_once __DIR__ . '/../layouts/footer.html'; ?>
