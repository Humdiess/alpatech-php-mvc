<?php $Title = "Daftar Buku"; ?>
<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<div class="container">
    <h1 class="text-light"><?= $Title ?></h1>
    <a href="/buku/create" class="btn btn-primary mb-3">Tambah Buku</a>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Publisher</th>
                <th scope="col">Author</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Buku as $B): ?>
                <tr>
                    <td><?= htmlspecialchars($B['id']) ?></td>
                    <td><?= htmlspecialchars($B['name']) ?></td>
                    <td><?= htmlspecialchars($B['publisher_name']) ?></td>
                    <td><?= htmlspecialchars($B['author_name']) ?></td>
                    <td>
                        <a href="/buku/edit/<?= $B['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="/buku/delete/<?= $B['id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <nav aria-label="Halaman">
        <ul class="pagination justify-content-center">
            <?php if ($currentPage > 1): ?>
                <li class="page-item"><a class="page-link" href="/buku?page=<?= $currentPage - 1 ?>">Sebelumnya</a></li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>"><a class="page-link" href="/buku?page=<?= $i ?>"><?= $i ?></a></li>
            <?php endfor; ?>

            <?php if ($currentPage < $totalPages): ?>
                <li class="page-item"><a class="page-link" href="/buku?page=<?= $currentPage + 1 ?>">Selanjutnya</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
