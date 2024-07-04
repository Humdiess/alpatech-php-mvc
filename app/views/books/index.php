<?php include_once __DIR__ . '/../layouts/header.html'; ?>
<div class="container mt-5">
    <h1 class="mb-4"><?php echo $data['title']; ?></h1>
    <a href="<?php echo base_url('book/add'); ?>" class="btn btn-primary mb-3">Add New Book</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Author</th>
                <th scope="col">Publisher</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['books'] as $book) : ?>
                <tr>
                    <td><?php echo $book['id']; ?></td>
                    <td><?php echo $book['name']; ?></td>
                    <td><?php echo $book['author_name']; ?></td>
                    <td><?php echo $book['publisher_name']; ?></td>
                    <td>
                        <a href="<?php echo base_url('book/detail/' . $book['id']); ?>" class="btn btn-info btn-sm me-2">Detail</a>
                        <a href="<?php echo base_url('book/edit/' . $book['id']); ?>" class="btn btn-warning btn-sm me-2">Edit</a>
                        <a href="<?php echo base_url('book/delete/' . $book['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include_once __DIR__ . '/../layouts/footer.html'; ?>
