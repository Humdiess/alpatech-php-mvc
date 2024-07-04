<?php include_once __DIR__ . '/../layouts/header.html'; ?>
    <div class="container mt-5">
        <h1 class="mb-4"><?php echo $data['title']; ?></h1>
        <a href="<?php echo base_url('publisher/add'); ?>" class="btn btn-primary mb-3">Add New Publisher</a>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['publishers'] as $publisher) : ?>
                    <tr>
                        <td><?php echo $publisher['id']; ?></td>
                        <td><?php echo $publisher['name']; ?></td>
                        <td>
                            <a href="<?php echo base_url('publisher/detail/' . $publisher['id']); ?>" class="btn btn-info btn-sm me-2">Detail</a>
                            <a href="<?php echo base_url('publisher/edit/' . $publisher['id']); ?>" class="btn btn-warning btn-sm me-2">Edit</a>
                            <a href="<?php echo base_url('publisher/delete/' . $publisher['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php include_once __DIR__ . '/../layouts/footer.html'; ?>