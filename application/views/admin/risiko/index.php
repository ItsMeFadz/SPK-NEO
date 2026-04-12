<div class="card">
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="card-header">Data Risiko</h5>
        <a href="<?php echo base_url('risiko/create'); ?>">
            <button type="button" class="btn btn-primary mx-3">Tambah Data</button>
        </a>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th>#</th>
                    <th>Kode</th>
                    <th>Nama Risiko</th>
                    <th>Deskripsi</th>
                    <th>Saran</th>
                    <th>Level Risiko</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="table-body" style="display: none;">
                <?php if (!empty($risiko)): ?>
                    <?php foreach ($risiko as $i => $row): ?>
                        <tr>
                            <th scope="row"><?= $i + 1 ?></th>
                            <td><?= html_escape($row->kode) ?></td>
                            <td><?= html_escape($row->name) ?></td>
                            <td><?= html_escape($row->deskripsi) ?></td>
                            <td><?= html_escape($row->saran) ?></td>
                            <td>
                                <?php if ($row->level == 1): ?>
                                    <span class="badge bg-label-success">Rendah</span>
                                <?php elseif ($row->level == 2): ?>
                                    <span class="badge bg-label-warning">Sedang</span>
                                <?php elseif ($row->level == 3): ?>
                                    <span class="badge bg-label-danger">Tinggi</span>
                                <?php else: ?>
                                    <span class="badge bg-label-secondary">Tidak diketahui</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                        <a href="<?= base_url('risiko/edit/' . $row->id) ?>" class="btn btn-sm btn-icon btn-label-info"
                                        title="Edit">
                                            <i class="tf-icons ti ti-edit"></i>
                                        </a>
                                        <form method="post" action="<?= base_url('risiko/delete/' . $row->id) ?>"
                                            class="d-inline js-delete-form m-0 p-0">
                                        <button type="button" class="btn btn-sm btn-icon btn-label-danger js-confirm-delete"
                                            title="Hapus" data-kode="<?= html_escape($row->kode) ?>"
                                            data-name="<?= html_escape($row->name) ?>">
                                            <i class="tf-icons ti ti-square-minus"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">Belum ada data risiko.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation" class="mt-3 d-flex justify-content-end me-3">
        <ul id="pagination" class="pagination pagination-sm"></ul>
    </nav>
</div>
