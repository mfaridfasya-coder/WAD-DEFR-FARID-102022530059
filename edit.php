<?php include 'koneksi.php';
$id = (int) $_GET['id'];
if (isset($_POST['update'])) {
  $stmt = mysqli_prepare($conn, "UPDATE ruang_poli SET nama_ruang=?, jenis_poli=?, lokasi_gedung=?, inventaris_alat=? WHERE id=?");
  mysqli_stmt_bind_param($stmt, "ssssi", $_POST['nama_ruang'], $_POST['jenis_poli'], $_POST['lokasi_gedung'], $_POST['inventaris_alat'], $id);
  mysqli_stmt_execute($stmt);
  header("Location: index.php");
  exit;
}
$r = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM ruang_poli WHERE id=$id"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Ruang Poliklinik</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container"><a class="navbar-brand" href="index.php">Klinik Rawat Jalan</a></div>
  </nav>
  <div class="hero text-center"><h1>Edit Ruang Poliklinik</h1></div>
  <div class="container">
    <div class="card"><div class="card-body">
      <form method="post">
        <div class="mb-3"><label class="form-label">Nama Ruang</label>
          <input type="text" name="nama_ruang" class="form-control" value="<?= htmlspecialchars($r['nama_ruang']) ?>" required></div>
        <div class="mb-3"><label class="form-label">Jenis Poli</label>
          <select name="jenis_poli" class="form-select">
            <option <?= $r['jenis_poli']=='Poli Umum' ? 'selected' : '' ?>>Poli Umum</option>
            <option <?= $r['jenis_poli']=='Poli Gigi' ? 'selected' : '' ?>>Poli Gigi</option>
          </select></div>
        <div class="mb-3"><label class="form-label">Lokasi Gedung</label>
          <input type="text" name="lokasi_gedung" class="form-control" value="<?= htmlspecialchars($r['lokasi_gedung']) ?>" required></div>
        <div class="mb-3"><label class="form-label">Inventaris Alat Medis</label>
          <textarea name="inventaris_alat" class="form-control" rows="3"><?= htmlspecialchars($r['inventaris_alat']) ?></textarea></div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
      </form>
    </div></div>
  </div>
</body>
</html>