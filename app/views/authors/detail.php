<!-- /app/views/authors/detail.php -->
<h1 class="text-3xl font-bold">Detail Penulis</h1>

<p><strong>ID Penulis:</strong> <?php echo $author['id']; ?></p>
<p><strong>Nama Penulis:</strong> <?php echo htmlspecialchars($author['name']); ?></p>

<a href="<?php echo base_url('author/index'); ?>">Kembali ke Daftar Penulis</a>
