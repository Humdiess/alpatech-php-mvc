<?php $Title = "Edit Author"; ?>
<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<div class="container">
    <h1>Edit Author</h1>
    <form action="/author/update/<?= $Author['id'] ?>" method="post">
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control mt-2" id="name" name="name" value="<?= htmlspecialchars($Author['name']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
    </form>
</div>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
