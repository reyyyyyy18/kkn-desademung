<?php
include '../koneksi.php';
// Handle tambah, edit, hapus berita
if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $gambar = '';
    if ($_FILES['gambar']['name']) {
        $gambar = 'uploads/' . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
    }
    $sql = "INSERT INTO berita (gambar, judul, isi) VALUES ('$gambar', '$judul', '$isi')";
    mysqli_query($conn, $sql);
    header('Location: dashboard.php?page=berita');
    exit();
}
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM berita WHERE id=$id");
    header('Location: dashboard.php?page=berita');
    exit();
}
$edit = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM berita WHERE id=$id");
    $edit = mysqli_fetch_assoc($result);
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $gambar = $_POST['gambar_lama'];
    if ($_FILES['gambar']['name']) {
        $gambar = 'uploads/' . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
    }
    $sql = "UPDATE berita SET gambar='$gambar', judul='$judul', isi='$isi' WHERE id=$id";
    mysqli_query($conn, $sql);
    header('Location: dashboard.php?page=berita');
    exit();
}
$berita = mysqli_query($conn, "SELECT * FROM berita ORDER BY id DESC");
?>
<h2>CRUD Berita</h2>
<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
    <input type="hidden" name="gambar_lama" value="<?= $edit['gambar'] ?? '' ?>">
    <input type="file" name="gambar" accept="image/*"><br>
    <input type="text" name="judul" placeholder="Judul" value="<?= $edit['judul'] ?? '' ?>" required><br>
    <textarea name="isi" placeholder="Isi" required><?= $edit['isi'] ?? '' ?></textarea><br>
    <?php if ($edit): ?>
        <button type="submit" name="update">Update</button>
    <?php else: ?>
        <button type="submit" name="tambah">Tambah</button>
    <?php endif; ?>
</form>
<table border="1" cellpadding="5" cellspacing="0">
    <tr><th>Gambar</th><th>Judul</th><th>Isi</th><th>Aksi</th></tr>
    <?php while ($row = mysqli_fetch_assoc($berita)): ?>
    <tr>
        <td><?php if ($row['gambar']) echo '<img src="../admin/'.$row['gambar'].'" width="80">'; ?></td>
        <td><?= htmlspecialchars($row['judul']) ?></td>
        <td><?= htmlspecialchars($row['isi']) ?></td>
        <td>
            <a href="?page=berita&edit=<?= $row['id'] ?>">Edit</a> |
            <a href="?page=berita&hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus berita ini?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
