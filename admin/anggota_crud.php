<?php
include '../koneksi.php';
// Handle tambah, edit, hapus anggota
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $foto = '';
    if ($_FILES['foto']['name']) {
        $foto = 'uploads/' . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
    }
    $sql = "INSERT INTO anggota (foto, nama, jabatan) VALUES ('$foto', '$nama', '$jabatan')";
    mysqli_query($conn, $sql);
    header('Location: dashboard.php?page=anggota');
    exit();
}
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM anggota WHERE id=$id");
    header('Location: dashboard.php?page=anggota');
    exit();
}
$edit = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM anggota WHERE id=$id");
    $edit = mysqli_fetch_assoc($result);
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $foto = $_POST['foto_lama'];
    if ($_FILES['foto']['name']) {
        $foto = 'uploads/' . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
    }
    $sql = "UPDATE anggota SET foto='$foto', nama='$nama', jabatan='$jabatan' WHERE id=$id";
    mysqli_query($conn, $sql);
    header('Location: dashboard.php?page=anggota');
    exit();
}
$anggota = mysqli_query($conn, "SELECT * FROM anggota ORDER BY id DESC");
?>
<h2>CRUD Anggota</h2>
<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
    <input type="hidden" name="foto_lama" value="<?= $edit['foto'] ?? '' ?>">
    <input type="file" name="foto" accept="image/*"><br>
    <input type="text" name="nama" placeholder="Nama" value="<?= $edit['nama'] ?? '' ?>" required><br>
    <input type="text" name="jabatan" placeholder="Jabatan" value="<?= $edit['jabatan'] ?? '' ?>" required><br>
    <?php if ($edit): ?>
        <button type="submit" name="update">Update</button>
    <?php else: ?>
        <button type="submit" name="tambah">Tambah</button>
    <?php endif; ?>
</form>
<table border="1" cellpadding="5" cellspacing="0">
    <tr><th>Foto</th><th>Nama</th><th>Jabatan</th><th>Aksi</th></tr>
    <?php while ($row = mysqli_fetch_assoc($anggota)): ?>
    <tr>
        <td><?php if ($row['foto']) echo '<img src="../admin/'.$row['foto'].'" width="80">'; ?></td>
        <td><?= htmlspecialchars($row['nama']) ?></td>
        <td><?= htmlspecialchars($row['jabatan']) ?></td>
        <td>
            <a href="?page=anggota&edit=<?= $row['id'] ?>">Edit</a> |
            <a href="?page=anggota&hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus anggota ini?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
