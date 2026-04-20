<div class="card">
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="card-header">Data Pasien</h5>
    </div>
    <div class="px-3" id="dataPasienSearchSection" data-search-url="<?= base_url('dataPasien/search') ?>">
        <input type="text" id="searchInput" class="form-control form-control-sm w-100 mb-2"
            placeholder="Search by name" />
    </div>

    <!-- Date Inputs -->
    <div class="px-3">
        <div class="row g-2">
            <div class="col-12 col-md-6">
                <input type="text" id="startDate" class="form-control form-control-sm" placeholder="Tanggal Awal"
                    onfocus="this.type='date'" onblur="if(!this.value) this.type='text'" />
            </div>
            <div class="col-12 col-md-6">
                <input type="text" id="endDate" class="form-control form-control-sm" placeholder="Tanggal Akhir"
                    onfocus="this.type='date'" onblur="if(!this.value) this.type='text'" />
            </div>
        </div>
    </div>

    <!-- Button -->
    <div class="px-3 demo-inline-spacing d-flex gap-2">
        <button class="btn btn-primary btn-sm flex-grow-1 btn-section-block-overlay" type="button" id="searchDataButton">Cari<span
                class="spinner-border spinner-border-sm d-none ms-2" role="status"
                aria-hidden="true"></span></button>
        <button class="btn btn-label-dark btn-sm btn-section-block-overlay" type="button"
            id="resetSearch">Reset</button>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th>#</th>
                    <th>Nama</th>
                    <th class="text-center">Umur</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Tanggal Diagnosis</th>
                    <th class="text-center">Tingkat Risiko</th>
                    <th class="text-center">Status Risiko</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="table-body" style="display: none;">
                <?php if (!empty($riwayat)): ?>
                    <?php foreach ($riwayat as $i => $row): ?>
                        <tr>
                            <th><?= $i + 1 ?></th>
                            <td><?= html_escape($row->name) ?: '-' ?></td>
                            <td class="text-center"><?= html_escape($row->usia) ?: '-' ?></td>
                            <td class="text-center"><?= html_escape($row->alamat) ?: '-' ?></td>
                            <td class="text-center"><?= date('d-m-Y', strtotime($row->created_at)) ?></td>
                            <td class="text-center"><?= html_escape($row->persen) ?>%</td>
                            <td class="text-center">
                                <?php
                                $persen = (int) $row->persen;

                                if ($persen == 100)
                                {
                                    $class = 'badge bg-label-danger';
                                    $label = 'Tinggi';
                                }
                                elseif ($persen == 50)
                                {
                                    $class = 'badge bg-label-warning';
                                    $label = 'Sedang';
                                }
                                else
                                {
                                    $class = 'badge bg-label-success';
                                    $label = 'Rendah';
                                }
                                ?>
                                <span class="<?= $class ?>">
                                    <?= $label ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('deteksiDini/unduh/' . $row->id) ?>"
                                    class="btn btn-sm btn-icon btn-label-info">
                                    <i class="tf-icons ti ti-download"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            Belum ada data riwayat diagnosis.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation" class="mt-3 d-flex justify-content-end me-3">
            <ul id="pagination" class="pagination pagination-sm"></ul>
        </nav>
    </div>
</div>
