<?php $Title = "Edit Buku"; ?>
<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<div class="container">
    <h1>Edit Buku</h1>
    <form action="/buku/update/<?= $Buku['id'] ?>" method="post">
        <div class="form-group mt-2">
            <label for="name">Nama:</label>
            <input type="text" class="form-control mt-2" id="name" name="name" value="<?= htmlspecialchars($Buku['name']) ?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="publisher_id">Publisher:</label>
            <select class="form-control mt-2" id="publisher_id" name="publisher_id" required>
                <?php foreach ($Publishers as $Publisher): ?>
                    <option value="<?= $Publisher['id'] ?>" <?= $Publisher['id'] == $Buku['publisher_id'] ? 'selected' : '' ?>><?= htmlspecialchars($Publisher['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="author_id">Author:</label>
            <select class="form-control mt-2" id="author_id" name="author_id" required>
                <?php foreach ($Authors as $Author): ?>
                    <option value="<?= $Author['id'] ?>" <?= $Author['id'] == $Buku['author_id'] ? 'selected' : '' ?>><?= htmlspecialchars($Author['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
</div>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
