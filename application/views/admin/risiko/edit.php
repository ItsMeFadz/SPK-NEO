<div class="col-md-12 mb-4 mb-md-0">
    <div class="card">
        <h5 class="card-header">Edit Data</h5>
        <div class="card-body">
            <form class="browser-default-validation row" method="post" action="<?= base_url('risiko/update/' . $risiko->id) ?>">
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-name">Kode</label>
                    <input type="text" name="kode" class="form-control" placeholder="G01" value="<?= html_escape($risiko->kode) ?>" required />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-name">Nama Risiko</label>
                    <input type="text" name="name" class="form-control" placeholder="Demam" value="<?= html_escape($risiko->name) ?>" required />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-name">Deskripsi</label>
                    <textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi Risiko" required><?= html_escape($risiko->deskripsi) ?></textarea>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-name">Saran</label>
                    <textarea type="text" name="saran" class="form-control" placeholder="Saran" required><?= html_escape($risiko->saran) ?></textarea>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">Level Risiko</label>
                   <select name="level" class="form-select" required>
                        <option value="" disabled selected hidden>Pilih risiko</option>
                        <option value="1" <?= $risiko->level == 1 ? 'selected' : '' ?>>01 - Risiko Rendah</option>
                        <option value="2" <?= $risiko->level == 2 ? 'selected' : '' ?>>02 - Risiko Sedang</option>
                        <option value="3" <?= $risiko->level == 3 ? 'selected' : '' ?>>03 - Risiko Tinggi</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-12 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?= base_url('risiko') ?>" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
