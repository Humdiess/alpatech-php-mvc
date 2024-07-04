<!-- /app/views/authors/index.php -->
<h1 class="text-3xl font-bold">Daftar Penulis</h1>

<?php if (!empty($author)) : ?>
    <ul>
        <?php foreach ($author as $a) : ?>
            <li><?php echo htmlspecialchars($a['name']); ?></li>
            <!-- Tambahkan link untuk mengedit atau menghapus jika diperlukan -->
            <li>
                <a href="<?php echo base_url('author/delete/' . $author['id']); ?>">Hapus</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>Tidak ada data penulis.</p>
<?php endif; ?>

<a href="<?php echo base_url('author/add'); ?>">Tambah Penulis Baru</a>
<a href="<?php echo base_url('welcome'); ?>">Kembali ke Halaman Utama</a>
