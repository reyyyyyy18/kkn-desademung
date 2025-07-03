<?php
include '../koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama_pelapor']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $foto = '';
    if (isset($_FILES['foto_laporan']) && $_FILES['foto_laporan']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['foto_laporan']['name'], PATHINFO_EXTENSION);
        $newname = 'elapor_' . time() . '_' . rand(1000,9999) . '.' . $ext;
        $target = '../admin/uploads/' . $newname;
        if (move_uploaded_file($_FILES['foto_laporan']['tmp_name'], $target)) {
            $foto = 'uploads/' . $newname;
        }
    }
    if ($foto) {
        $q = mysqli_query($conn, "INSERT INTO elapor (nama_pelapor, foto_laporan, deskripsi) VALUES ('$nama', '$foto', '$deskripsi')");
        if ($q) {
            echo '<script>alert("Laporan berhasil dikirim!");window.location.href="../kontak.php";</script>';
            exit;
        }
    }
    echo '<script>alert("Gagal mengirim laporan. Pastikan semua data terisi dan file gambar valid.");window.history.back();</script>';
}
