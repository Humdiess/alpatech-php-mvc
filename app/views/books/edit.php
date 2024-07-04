<?php include_once __DIR__ . '/../layouts/header.html'; ?>
<div class="container mt-5">
    <h1 class="mb-4"><?php echo $data['title']; ?></h1>
    <form action="<?php echo base_url('book/update'); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $data['book']['id']; ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Book Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['book']['name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="author_id" class="form-label">Author</label>
            <select class="form-select" id="author_id" name="author_id" required>
                <?php foreach ($data['authors'] as $author) : ?>
                    <option value="<?php echo $author['id']; ?>" <?php echo ($author['id'] == $data['book']['author_id']) ? 'selected' : ''; ?>><?php echo $author['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="publisher_id" class="form-label">Publisher</label>
            <select class="form-select" id="publisher_id" name="publisher_id" required>
                <?php foreach ($data['publishers'] as $publisher) : ?>
                    <option value="<?php echo $publisher['id']; ?>" <?php echo ($publisher['id'] == $data['book']['publisher_id']) ? 'selected' : ''; ?>><?php echo $publisher['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Book</button>
    </form>
    <a href="<?php echo base_url('book/detail/' . $data['book']['id']); ?>" class="btn btn-secondary mt-3">Back to Detail</a>
</div>
<?php include_once __DIR__ . '/../layouts/footer.html'; ?>
