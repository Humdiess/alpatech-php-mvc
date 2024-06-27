<?php $Title = "Daftar Author"; ?>
<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<div class="container">
    <h1>Daftar Author</h1>
    <a href="/author/create" class="btn btn-primary mb-3">Tambah Author</a>
    <table class="table table-dark table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Authors as $Author): ?>
                <tr>
                    <td><?= htmlspecialchars($Author['id']) ?></td>
                    <td><?= htmlspecialchars($Author['name']) ?></td>
                    <td>
                        <a href="/author/edit/<?= $Author['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="/author/delete/<?= $Author['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
