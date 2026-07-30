<form action="simpan_kepsek.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?= $data['id']; ?>">

<div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control"
           value="<?= $data['nama']; ?>">
</div>

<div class="mb-3">
    <label>Jabatan</label>
    <input type="text" name="jabatan" class="form-control"
           value="<?= $data['jabatan']; ?>">
</div>

<div class="mb-3">
    <label>Sambutan</label>
    <textarea name="sambutan" class="form-control" rows="8"><?= $data['sambutan']; ?></textarea>
</div>

<div class="mb-3">
    <label>Foto</label>
    <input type="file" name="foto" class="form-control">
</div>

<button type="submit" name="simpan" class="btn btn-primary">
    Simpan
</button>

</form>