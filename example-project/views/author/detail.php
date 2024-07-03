<?php $Title = "Edit Author"; ?>
<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<div class="container">
    <h1>Detail Author</h1>
    <form action="/author/update/<?= $Author['id'] ?>" method="post">
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control mt-2" id="name" name="name" value="<?= htmlspecialchars($Author['name']) ?>" required>
        </div>
        <a href="/author/edit/<?= $Author['id'] ?>" class="btn btn-primary mt-2">Edit</a>
    </form>
</div>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
