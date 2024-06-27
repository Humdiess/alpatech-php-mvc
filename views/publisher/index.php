<?php $Title = "Daftar Publisher"; ?>
<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<div class="container">
    <h1>Daftar Publisher</h1>
    <a href="/publisher/create" class="btn btn-primary mb-3">Tambah Publisher</a>
    <table class="table table-dark table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Publishers as $Publisher): ?>
                <tr>
                    <td><?= htmlspecialchars($Publisher['id']) ?></td>
                    <td><?= htmlspecialchars($Publisher['name']) ?></td>
                    <td>
                        <a href="/publisher/edit/<?= $Publisher['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="/publisher/delete/<?= $Publisher['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
