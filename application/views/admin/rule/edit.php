<div class="col-md-12 mb-4 mb-md-0">

    <div class="card">
        <!-- Notifications -->
        <h5 class="card-header pb-1">Tambah Basis Rule</h5>
        <form method="post" action="<?= base_url('rule/update/' . $rule->id) ?>">
            <div class="card-body">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Risiko</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="id_risiko">
                            <?php foreach ($risiko as $r): ?>
                                <option value="<?= $r->id ?>" <?= $r->id == $rule->id_risiko ? 'selected' : '' ?>>
                                    <?= $r->kode ?> - <?= $r->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped border-top">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-nowrap">Tipe</th>
                            <th class="text-nowrap text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($gejala as $g): ?>
                            <tr>
                                <td>
                                    <strong><?= $g->kode ?></strong> - <?= $g->name ?>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input" name="gejala[]" value="<?= $g->id ?>" <?= in_array($g->id, $selected_gejala) ? 'checked' : '' ?>>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 d-flex justify-content-start">
                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        <a href="<?= base_url('rule') ?>" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </div>
            </div>
        </form>
        <!-- /Notifications -->
    </div>
</div>