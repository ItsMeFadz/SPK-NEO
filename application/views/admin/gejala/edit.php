<div class="col-md-12 mb-4 mb-md-0">
    <div class="card">
        <h5 class="card-header">Edit Data</h5>
        <div class="card-body">
            <form class="browser-default-validation row" method="post" action="<?= base_url('gejala/update/' . $gejala->id) ?>">
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-name">Kode</label>
                    <input type="text" name="kode" class="form-control" placeholder="G01" value="<?= html_escape($gejala->kode) ?>" required />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-name">Nama Gejala</label>
                    <input type="text" name="name" class="form-control" placeholder="Demam" value="<?= html_escape($gejala->name) ?>" required />
                </div>
                <div class="row">
                    <div class="col-12 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?= base_url('gejala') ?>" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
