<?php include 'koneksi.php';
if (isset($_POST['simpan'])) {
  $stmt = mysqli_prepare($conn, "INSERT INTO ruang_poli (nama_ruang, jenis_poli, lokasi_gedung, inventaris_alat) VALUES (?,?,?,?)");
  mysqli_stmt_bind_param($stmt, "ssss", $_POST['nama_ruang'], $_POST['jenis_poli'], $_POST['lokasi_gedung'], $_POST['inventaris_alat']);
  mysqli_stmt_execute($stmt);
  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Ruang Poliklinik</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">Klinik Rawat Jalan</a>
      <div class="navbar-nav">
        <a class="nav-link" href="index.php">Daftar Ruang</a>
        <a class="nav-link active" href="tambah.php">Tambah Ruang</a>
      </div>
    </div>
  </nav>
  <div class="hero text-center"><h1>Tambah Ruang Poliklinik</h1></div>
  <div class="container">
    <div class="card"><div class="card-body">
      <form method="post">
        <div class="mb-3"><label class="form-label">Nama Ruang</label>
          <input type="text" name="nama_ruang" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Jenis Poli</label>
          <select name="jenis_poli" class="form-select"><option>Poli Umum</option><option>Poli Gigi</option></select></div>
        <div class="mb-3"><label class="form-label">Lokasi Gedung</label>
          <input type="text" name="lokasi_gedung" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Inventaris Alat Medis</label>
          <textarea name="inventaris_alat" class="form-control" rows="3"></textarea></div>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
      </form>
    </div></div>
  </div>
</body>
</html>