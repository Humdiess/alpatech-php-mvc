<?php include_once __DIR__ . '/../layouts/header.html'; ?>
    <div class="container mt-5">
        <h1 class="mb-4"><?php echo $data['title']; ?></h1>
        <a href="<?php echo base_url('author/add'); ?>" class="btn btn-primary mb-3">Add New Author</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['authors'] as $author) : ?>
                    <tr>
                        <td><?php echo $author['id']; ?></td>
                        <td><?php echo $author['name']; ?></td>
                        <td>
                            <a href="<?php echo base_url('author/detail/' . $author['id']); ?>" class="btn btn-info btn-sm me-2">Detail</a>
                            <a href="<?php echo base_url('author/edit/' . $author['id']); ?>" class="btn btn-warning btn-sm me-2">Edit</a>
                            <a href="<?php echo base_url('author/delete/' . $author['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php include_once __DIR__ . '/../layouts/footer.html'; ?>
