<?php include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM ruang_poli ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modul Ruang Poliklinik</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">Klinik Rawat Jalan</a>
      <div class="navbar-nav">
        <a class="nav-link active" href="index.php">Daftar Ruang</a>
        <a class="nav-link" href="tambah.php">Tambah Ruang</a>
      </div>
    </div>
  </nav>
  <div class="hero text-center">
    <h1>Modul Ruang Poliklinik</h1>
    <p>Pengelolaan master ruangan poli, lokasi gedung, dan inventaris alat medis</p>
  </div>
  <div class="container">
    <div class="card"><div class="card-body">
      <div class="d-flex justify-content-between mb-3">
        <h5 class="mb-0">Data Ruang Poliklinik</h5>
        <a href="tambah.php" class="btn btn-primary btn-sm">+ Tambah Ruang</a>
      </div>
      <table class="table table-striped table-bordered">
        <thead class="table-dark">
          <tr><th>No</th><th>Nama Ruang</th><th>Jenis Poli</th><th>Lokasi Gedung</th><th>Inventaris Alat Medis</th><th>Aksi</th></tr>
        </thead>
        <tbody>
        <?php $no = 1; while ($r = mysqli_fetch_assoc($data)) { ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($r['nama_ruang']) ?></td>
            <td><?= htmlspecialchars($r['jenis_poli']) ?></td>
            <td><?= htmlspecialchars($r['lokasi_gedung']) ?></td>
            <td><?= htmlspecialchars($r['inventaris_alat']) ?></td>
            <td>
              <a href="edit.php?id=<?= $r['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="hapus.php?id=<?= $r['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div></div>
  </div>
  <footer>&copy; 2026 Klinik Rawat Jalan - Modul Ruang Poliklinik</footer>
</body>
</html>