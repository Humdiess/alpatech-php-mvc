<!-- /app/views/authors/add.php -->
<h1 class="text-3xl font-bold">Tambah Penulis Baru</h1>

<form action="<?php echo base_url('author/add'); ?>" method="POST">
    <label for="name">Nama Penulis:</label><br>
    <input type="text" id="name" name="name"><br><br>
    <input type="submit" value="Simpan">
</form>

<a href="<?php echo base_url('author/index'); ?>">Batal</a>
