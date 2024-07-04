<!-- /app/views/authors/edit.php -->
<h1 class="text-3xl font-bold">Edit Penulis</h1>

<form action="<?php echo base_url('author/update'); ?>" method="POST">
    <input type="hidden" name="id" value="<?php echo $author['id']; ?>">
    <label for="name">Nama Penulis:</label><br>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($author['name']); ?>"><br><br>
    <input type="submit" value="Simpan">
</form>

<a href="<?php echo base_url('author/index'); ?>">Batal</a>
