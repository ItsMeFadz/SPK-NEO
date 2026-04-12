<div class="col-md-12 mb-4 mb-md-0">
    <div class="card">
        <h5 class="card-header">Tambah Data</h5>
        <div class="card-body">
            <form class="browser-default-validation row" method="post" action="<?= base_url('risiko/store') ?>">
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-name">Kode</label>
                    <input type="text" name="kode" class="form-control" placeholder="R01" required />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-name">Nama Risiko</label>
                    <input type="text" name="name" class="form-control" placeholder="Tinggi" />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-name">Deskripsi</label>
                    <textarea type="text" name="deskripsi" class="form-control" placeholder="Risiko kecil"></textarea>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-name">Saran</label>
                    <textarea type="text" name="saran" class="form-control" placeholder="Tetap waspada"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Level Risiko</label>
                    <select class="form-select" id="exampleFormControlSelect1" name="level" aria-label="Default select example">
                        <option disabled selected hidden>Pilih risiko</option>
                        <option value="1">01 - Risiko Rendah</option>
                        <option value="2">02 - Risiko Sedang</option>
                        <option value="3">03 - Risiko Tinggi</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-12 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('risiko') ?>" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>