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
<div class="max-w-3xl mx-auto py-6">
    <h2 class="text-2xl font-bold text-green-700 mb-6">CRUD Berita</h2>
    <form method="post" enctype="multipart/form-data" class="bg-white rounded shadow p-4 mb-8 space-y-4">
        <input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
        <input type="hidden" name="gambar_lama" value="<?= $edit['gambar'] ?? '' ?>">
        <div>
            <label class="block mb-1 font-semibold">Gambar</label>
            <input type="file" name="gambar" accept="image/*" class="block w-full text-sm">
            <?php if (!empty($edit['gambar'])): ?>
                <img src="../admin/<?= $edit['gambar'] ?>" alt="Gambar" class="w-24 mt-2 rounded">
            <?php endif; ?>
        </div>
        <div>
            <label class="block mb-1 font-semibold">Judul</label>
            <input type="text" name="judul" placeholder="Judul" value="<?= $edit['judul'] ?? '' ?>" required class="w-full border rounded px-3 py-2">
        </div>
        <div>
            <label class="block mb-1 font-semibold">Isi</label>
            <textarea name="isi" placeholder="Isi" required class="w-full border rounded px-3 py-2 min-h-[100px]"><?= $edit['isi'] ?? '' ?></textarea>
        </div>
        <div>
            <button type="submit" name="<?= $edit ? 'update' : 'tambah' ?>" class="bg-green-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                <?= $edit ? 'Update' : 'Tambah' ?>
            </button>
                <?php if ($edit): ?>
                    <a href="dashboard.php?page=berita" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded shadow">Batal</a>
                <?php endif; ?>
        </div>
    </form>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow text-sm">
            <thead>
                <tr class="bg-green-100 text-green-800">
                    <th class="py-2 px-4">Gambar</th>
                    <th class="py-2 px-4">Judul</th>
                    <th class="py-2 px-4">Isi</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($berita)): ?>
                <tr class="border-b">
                    <td class="py-2 px-4 text-center">
                        <?php if ($row['gambar']) echo '<img src="../admin/'.$row['gambar'].'" class="w-16 h-16 object-cover rounded mx-auto">'; ?>
                    </td>
                    <td class="py-2 px-4"><?= htmlspecialchars($row['judul']) ?></td>
                    <td class="py-2 px-4 max-w-xs break-words"><?= htmlspecialchars($row['isi']) ?></td>
                    <td class="py-2 px-4">
                        <a href="?page=berita&edit=<?= $row['id'] ?>" class="text-blue-600 hover:underline">Edit</a> |
                        <a href="?page=berita&hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus berita ini?')" class="text-red-600 hover:underline">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
