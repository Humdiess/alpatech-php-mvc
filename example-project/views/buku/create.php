<?php $Title = "Tambah Buku"; ?>
<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<div class="container">
    <h1>Tambah Buku</h1>
    <form action="/buku/store" method="post">
        <div class="form-group mt-2">
            <label for="name">Nama:</label>
            <input type="text" class="form-control mt-2" id="name" name="name" required>
        </div>
        <div class="form-group mt-2">
            <label for="publisher_id">Publisher:</label>
            <select class="form-control mt-2" id="publisher_id" name="publisher_id" required>
                <?php foreach ($Publishers as $Publisher): ?>
                    <option value="<?= $Publisher['id'] ?>"><?= htmlspecialchars($Publisher['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="author_id">Author:</label>
            <select class="form-control mt-2" id="author_id" name="author_id" required>
                <?php foreach ($Authors as $Author): ?>
                    <option value="<?= $Author['id'] ?>"><?= htmlspecialchars($Author['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
    </form>
</div>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>