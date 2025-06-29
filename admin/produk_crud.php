<?php
include '../koneksi.php';
// Handle tambah, edit, hapus produk
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $nomor_wa = $_POST['nomor_wa'];
    $foto = '';
    if ($_FILES['foto']['name']) {
        $foto = 'uploads/' . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
    }
    $sql = "INSERT INTO produk (nama, foto, deskripsi, nomor_wa) VALUES ('$nama', '$foto', '$deskripsi', '$nomor_wa')";
    mysqli_query($conn, $sql);
    header('Location: dashboard.php?page=produk');
    exit();
}
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM produk WHERE id=$id");
    header('Location: dashboard.php?page=produk');
    exit();
}
$edit = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM produk WHERE id=$id");
    $edit = mysqli_fetch_assoc($result);
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $nomor_wa = $_POST['nomor_wa'];
    $foto = $_POST['foto_lama'];
    if ($_FILES['foto']['name']) {
        $foto = 'uploads/' . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
    }
    $sql = "UPDATE produk SET nama='$nama', foto='$foto', deskripsi='$deskripsi', nomor_wa='$nomor_wa' WHERE id=$id";
    mysqli_query($conn, $sql);
    header('Location: dashboard.php?page=produk');
    exit();
}
$produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
?>
<h2>CRUD Produk</h2>
<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
    <input type="hidden" name="foto_lama" value="<?= $edit['foto'] ?? '' ?>">
    <input type="text" name="nama" placeholder="Nama Produk" value="<?= $edit['nama'] ?? '' ?>" required><br>
    <input type="file" name="foto" accept="image/*"><br>
    <textarea name="deskripsi" placeholder="Deskripsi" required><?= $edit['deskripsi'] ?? '' ?></textarea><br>
    <input type="text" name="nomor_wa" placeholder="Nomor WA Contoh( 62822987578 )" value="<?= $edit['nomor_wa'] ?? '' ?>" required><br>
    <?php if ($edit): ?>
        <button type="submit" name="update">Update</button>
    <?php else: ?>
        <button type="submit" name="tambah">Tambah</button>
    <?php endif; ?>
</form>
<table border="1" cellpadding="5" cellspacing="0">
    <tr><th>Foto</th><th>Nama</th><th>Deskripsi</th><th>Nomor WA</th><th>Aksi</th></tr>
    <?php while ($row = mysqli_fetch_assoc($produk)): ?>
    <tr>
        <td><?php if ($row['foto']) echo '<img src="../admin/'.$row['foto'].'" width="80">'; ?></td>
        <td><?= htmlspecialchars($row['nama']) ?></td>
        <td><?= htmlspecialchars($row['deskripsi']) ?></td>
        <td><?= htmlspecialchars($row['nomor_wa']) ?></td>
        <td>
            <a href="?page=produk&edit=<?= $row['id'] ?>">Edit</a> |
            <a href="?page=produk&hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus produk ini?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
