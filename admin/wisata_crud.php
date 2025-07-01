<?php
include '../koneksi.php';
// Handle tambah, edit, hapus wisata
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = '';
    if ($_FILES['gambar']['name']) {
        $gambar = 'uploads/' . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
    }
    $sql = "INSERT INTO wisata (gambar, nama, deskripsi) VALUES ('$gambar', '$nama', '$deskripsi')";
    mysqli_query($conn, $sql);
    header('Location: dashboard.php?page=wisata');
    exit();
}
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM wisata WHERE id=$id");
    header('Location: dashboard.php?page=wisata');
    exit();
}
$edit = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM wisata WHERE id=$id");
    $edit = mysqli_fetch_assoc($result);
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar_lama'];
    if ($_FILES['gambar']['name']) {
        $gambar = 'uploads/' . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
    }
    $sql = "UPDATE wisata SET gambar='$gambar', nama='$nama', deskripsi='$deskripsi' WHERE id=$id";
    mysqli_query($conn, $sql);
    header('Location: dashboard.php?page=wisata');
    exit();
}
$wisata = mysqli_query($conn, "SELECT * FROM wisata ORDER BY id DESC");
?>
<div class="max-w-3xl mx-auto py-6">
    <h2 class="text-2xl font-bold text-green-700 mb-6">CRUD Wisata</h2>
    <form method="post" enctype="multipart/form-data" class="bg-white rounded shadow p-4 mb-8 space-y-4">
        <input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
        <input type="hidden" name="gambar_lama" value="<?= $edit['gambar'] ?? '' ?>">
        <div>
            <label class="block mb-1 font-semibold">Gambar</label>
            <input type="file" name="gambar" accept="image/*" class="block w-full text-sm">
            <?php if (!empty($edit['gambar'])): ?>
                <img src="<?= $edit['gambar'] ?>" alt="Gambar" class="w-24 mt-2 rounded">
            <?php endif; ?>
        </div>
        <div>
            <label class="block mb-1 font-semibold">Nama Wisata</label>
            <input type="text" name="nama" placeholder="Nama Wisata" value="<?= $edit['nama'] ?? '' ?>" required class="w-full border rounded px-3 py-2">
        </div>
        <div>
            <label class="block mb-1 font-semibold">Deskripsi</label>
            <textarea name="deskripsi" placeholder="Deskripsi" required class="w-full border rounded px-3 py-2 min-h-[80px]"><?= $edit['deskripsi'] ?? '' ?></textarea>
        </div>
        <div>
            <?php if ($edit): ?>
                <button type="submit" name="update" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Update</button>
            <?php else: ?>
                <button type="submit" name="tambah" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Tambah</button>
            <?php endif; ?>
        </div>
    </form>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow text-sm">
            <thead>
                <tr class="bg-green-100 text-green-800">
                    <th class="py-2 px-4">Gambar</th>
                    <th class="py-2 px-4">Nama</th>
                    <th class="py-2 px-4">Deskripsi</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($wisata)): ?>
                <tr class="border-b">
                    <td class="py-2 px-4 text-center">
                        <?php if (!empty($row['gambar'])): ?>
                            <img src="<?= $row['gambar'] ?>" class="w-16 h-16 object-cover rounded mx-auto">
                        <?php endif; ?>
                    </td>
                    <td class="py-2 px-4"><?= htmlspecialchars($row['nama']) ?></td>
                    <td class="py-2 px-4 max-w-xs break-words"><?= htmlspecialchars($row['deskripsi']) ?></td>
                    <td class="py-2 px-4">
                        <a href="?page=wisata&edit=<?= $row['id'] ?>" class="text-blue-600 hover:underline">Edit</a> |
                        <a href="?page=wisata&hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus wisata ini?')" class="text-red-600 hover:underline">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
