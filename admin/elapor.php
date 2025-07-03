<?php
include '../koneksi.php';
// Tambah kolom status jika belum ada di database: ALTER TABLE elapor ADD status ENUM('belum','teratasi') DEFAULT 'belum';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['atasi_id'])) {
    $id = intval($_POST['atasi_id']);
    mysqli_query($conn, "UPDATE elapor SET status='teratasi' WHERE id=$id");
    echo "<script>alert('Laporan sudah ditandai teratasi!');window.location='dashboard.php?page=elapor';</script>";
    exit;
}
$elapor = mysqli_query($conn, "SELECT * FROM elapor ORDER BY created_at DESC");
?>
<div class="mb-8">
    <h1 class="text-2xl font-bold text-green-700 mb-4">Daftar Laporan Masuk</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow">
            <thead class="bg-green-700 text-white">
                <tr>
                    <th class="py-2 px-4">No</th>
                    <th class="py-2 px-4">Nama Pelapor</th>
                    <th class="py-2 px-4">Foto Laporan</th>
                    <th class="py-2 px-4">Deskripsi</th>
                    <th class="py-2 px-4">Tanggal</th>
                    <th class="py-2 px-4">Status</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; while($row = mysqli_fetch_assoc($elapor)): ?>
                <tr class="border-b hover:bg-green-50">
                    <td class="py-2 px-4 text-center"><?= $no++ ?></td>
                    <td class="py-2 px-4 text-center"><?= htmlspecialchars($row['nama_pelapor']) ?></td>
                    <td class="py-2 px-4 text-center">
                        <?php if($row['foto_laporan']): ?>
                        <img src="../admin/<?= htmlspecialchars($row['foto_laporan']) ?>" class="h-16 w-24 object-cover rounded shadow mx-auto cursor-pointer preview-img" data-img="../admin/<?= htmlspecialchars($row['foto_laporan']) ?>">
                        <?php endif; ?>
                    </td>
                    <td class="py-2 px-4 text-center"><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></td>
                    <td class="py-2 px-4 text-center"><?= date('d-m-Y H:i', strtotime($row['created_at'])) ?></td>
                    <td class="py-2 px-4 text-center">
                        <span class="px-2 py-1 rounded text-xs font-semibold ".($row['status']==='teratasi'?'bg-green-200 text-green-800':'bg-yellow-100 text-yellow-800')."">
                            <?= $row['status']==='teratasi'?'Teratasi':'Belum' ?>
                        </span>
                    </td>
                    <td class="py-2 px-4 text-center">
                        <?php if($row['status']!=='teratasi'): ?>
                        <form method="post" style="display:inline">
                            <input type="hidden" name="atasi_id" value="<?= $row['id'] ?>">
                            <button type="submit" onclick="return confirm('Apakah laporan sudah teratasi?')" class="bg-green-600 text-white p-4 rounded hover:bg-green-700">Teratasi</button>
                        </form>
                        <?php else: ?>
                        <span class="text-green-600 font-bold">✓</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal Preview Gambar -->
<div id="imgModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 hidden">
    <span class="absolute top-4 right-8 text-white text-3xl cursor-pointer" id="closeImgModal">&times;</span>
    <img id="imgModalSrc" src="" class="max-h-[80vh] max-w-[90vw] rounded shadow-lg border-4 border-white">
</div>
<script>
document.querySelectorAll('.preview-img').forEach(img => {
    img.onclick = function() {
        document.getElementById('imgModalSrc').src = this.dataset.img;
        document.getElementById('imgModal').classList.remove('hidden');
    }
});
document.getElementById('closeImgModal').onclick = function() {
    document.getElementById('imgModal').classList.add('hidden');
}
document.getElementById('imgModal').onclick = function(e) {
    if(e.target === this) this.classList.add('hidden');
}
</script>
