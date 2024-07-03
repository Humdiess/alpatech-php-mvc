<?php $Title = "Detail Publisher"; ?>
<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<div class="container">
    <h1>Detail Publisher</h1>
    <form action="/publisher/update/<?= $Publisher['id'] ?>" method="post">
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control mt-2" id="name" name="name" value="<?= htmlspecialchars($Publisher['name']) ?>" required>
        </div>
        <a href="/publisher/edit/<?= $Publisher['id'] ?>" class="btn btn-primary mt-4">Edit</a>
    </form>
</div>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
