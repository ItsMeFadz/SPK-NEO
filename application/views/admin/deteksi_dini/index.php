<div class="card card-action mb-4 overflow-hidden shadow">
    <div class="card-header" id="vertical-example">
        <span class="alert-icon text-primary me-2">
            <i class="ti ti-list-check"></i>
        </span>
        <h5 class="card-action-title mb-0">Analisis Gejala Klinis</h5>
    </div>
    <form method="post" action="<?= base_url('deteksiDini/proses') ?>">
        <div class="card-body">

            <div class="alert alert-primary d-flex align-items-center flex-wrap" role="alert">
                <span class="alert-icon text-primary me-2">
                    <i class="ti ti-info-circle ti-xs"></i>
                </span>
                Apakah Anda mengalami gejala berikut? Pilih <span class="fw-bold mx-1">Ya</span> jika mengalaminya, atau
                <span class="fw-bold mx-1">Tidak</span> jika tidak. Semua pertanyaan wajib diisi.
            </div>
            <div class="added-cards">
                <?php $no = 1;
                foreach ($gejala as $g): ?>
                    <div class="cardMaster border p-3 rounded mb-3">
                        <div class="d-flex justify-content-between flex-sm-row flex-column">

                            <!-- KIRI -->
                            <div class="card-information">
                                <div class="d-flex align-items-center gap-2 mb-2 pt-1">
                                    <button type="button" class="btn btn-icon btn-sm btn-label-primary">
                                        <?= str_pad($no, 2, '0', STR_PAD_LEFT); ?>
                                    </button>
                                    <h6 class="mb-0 me-3">
                                        <?= $g->name; ?> ?
                                    </h6>
                                </div>
                                <span class="fw-light fs-6">
                                    <?= $g->deskripsi; ?>
                                </span>
                            </div>

                            <!-- KANAN -->
                            <div class="d-flex flex-column text-start text-lg-end">
                                <div class="d-flex gap-2 mt-3">

                                    <!-- YA -->
                                    <input type="radio" class="btn-check-custom ya" name="jawaban[<?= $g->id; ?>]"
                                        id="ya<?= $g->id; ?>" value="1">

                                    <label class="btn btn-label-primary" for="ya<?= $g->id; ?>">
                                        Ya
                                    </label>

                                    <!-- TIDAK -->
                                    <input type="radio" class="btn-check-custom tidak" name="jawaban[<?= $g->id; ?>]"
                                        id="tidak<?= $g->id; ?>" value="0">

                                    <label class="btn btn-label-secondary" for="tidak<?= $g->id; ?>">
                                        Tidak
                                    </label>

                                </div>
                            </div>

                        </div>
                    </div>
                    <?php $no++; endforeach; ?>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <div class="d-flex justify-content-end">
                <a href="<?= base_url('deteksiDini') ?>" class="btn btn-label-secondary me-2">Reset</a>
                <button type="submit" class="btn btn-primary"><i class="ti ti-stethoscope me-2"></i>Analisis</button>
            </div>
        </div>
    </form>
</div>
