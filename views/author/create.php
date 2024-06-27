<?php $Title = "Tambah Author"; ?>
<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<div class="container">
    <h1>Tambah Author</h1>
    <form action="/author/store" method="post">
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control mt-2" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
    </form>
</div>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
