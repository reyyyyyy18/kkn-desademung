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
<div class="max-w-3xl mx-auto py-6">
    <h2 class="text-2xl font-bold text-green-700 mb-6">CRUD Anggota</h2>
    <form method="post" enctype="multipart/form-data" class="bg-white rounded shadow p-4 mb-8 space-y-4">
        <input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
        <input type="hidden" name="foto_lama" value="<?= $edit['foto'] ?? '' ?>">
        <div>
            <label class="block mb-1 font-semibold">Foto</label>
            <input type="file" name="foto" accept="image/*" class="block w-full text-sm">
            <?php if (!empty($edit['foto'])): ?>
                <img src="../admin/<?= $edit['foto'] ?>" alt="Foto" class="w-20 mt-2 rounded">
            <?php endif; ?>
        </div>
        <div>
            <label class="block mb-1 font-semibold">Nama</label>
            <input type="text" name="nama" placeholder="Nama" value="<?= $edit['nama'] ?? '' ?>" required class="w-full border rounded px-3 py-2">
        </div>
        <div>
            <label class="block mb-1 font-semibold">Jabatan</label>
            <input type="text" name="jabatan" placeholder="Jabatan" value="<?= $edit['jabatan'] ?? '' ?>" required class="w-full border rounded px-3 py-2">
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
                    <th class="py-2 px-4">Foto</th>
                    <th class="py-2 px-4">Nama</th>
                    <th class="py-2 px-4">Jabatan</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($anggota)): ?>
                <tr class="border-b">
                    <td class="py-2 px-4 text-center">
                        <?php if ($row['foto']) echo '<img src="../admin/'.$row['foto'].'" class="w-16 h-16 object-cover rounded mx-auto">'; ?>
                    </td>
                    <td class="py-2 px-4"><?= htmlspecialchars($row['nama']) ?></td>
                    <td class="py-2 px-4"><?= htmlspecialchars($row['jabatan']) ?></td>
                    <td class="py-2 px-4">
                        <a href="?page=anggota&edit=<?= $row['id'] ?>" class="text-blue-600 hover:underline">Edit</a> |
                        <a href="?page=anggota&hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus anggota ini?')" class="text-red-600 hover:underline">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
