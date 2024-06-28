<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= public_dir('style.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title><?= $Title ?? "PHP simple framework " ?></title>
    <style>
      .nav-link:hover, .nav-link.active {
          background-color: #343a40;
      }

      .nav-link.active {
          color: #ffc107; /* Warna teks untuk tautan aktif */
      }
    </style>

</head>

<body class="bg-dark text-white" style="height: 100%;" data-bs-theme="dark">
    <div class="container-fluid vh-100 bg-dark">
        <div class="row">
          <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar" style="height: 100%;">
              <div class="position-sticky pt-3">
                <ul class="nav flex-column gap-2">
                  <li class="nav-logo mb-3">
                    <a class="nav-logo text-decoration-none text-white fw-bold fs-2" aria-current="page" href="/">
                      <i class="bi bi-book me-2"></i> Perpustakaan
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/buku">
                      <i class="bi bi-book-fill me-2"></i> Book
                      <span class="badge bg-secondary ms-2">New</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/publisher">
                      <i class="bi bi-building me-2"></i> Publisher
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/author">
                      <i class="bi bi-person me-2"></i> Author
                    </a>
                  </li>
                  <li class="nav-item mt-3">
                    <a class="nav-link" href="/settings">
                      <i class="bi bi-gear me-2"></i> Settings
                    </a>
                  </li>
                </ul>
                <hr class="my-2">
                <p class="text-muted small">Copyright &copy; 2024 hudi</p>
              </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-4">
