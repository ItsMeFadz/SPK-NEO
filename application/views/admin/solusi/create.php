<div class="col-md-12 mb-4 mb-md-0">
    <div class="card">
        <h5 class="card-header">Tambah Data</h5>
        <div class="card-body">
            <form class="browser-default-validation row" method="post" action="<?= base_url('solusi/store') ?>">
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-name">Kode</label>
                    <input type="text" name="kode" class="form-control" placeholder="S01" required />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-name">Keterangan</label>
                    <textarea type="text" name="keterangan" class="form-control" placeholder="Keterangan solusi" rows="1"></textarea>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-name">Solusi 1</label>
                    <input type="text" name="solusi_1" class="form-control" />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-name">Solusi 2</label>
                    <input type="text" name="solusi_2" class="form-control" />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-name">Solusi 3</label>
                    <input type="text" name="solusi_3" class="form-control" />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-name">Solusi 4</label>
                    <input type="text" name="solusi_4" class="form-control" />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-name">Solusi 5</label>
                    <input type="text" name="solusi_5" class="form-control" />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-name">Solusi 6</label>
                    <input type="text" name="solusi_6" class="form-control" />
                </div>
                <div class="row">
                    <div class="col-12 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('solusi') ?>" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>