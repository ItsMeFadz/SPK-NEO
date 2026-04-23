<div class="card">
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="card-header">Data Solusi</h5>
        <a href="<?php echo base_url('solusi/create'); ?>">
            <button type="button" class="btn btn-primary mx-3">Tambah Data</button>
        </a>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th>#</th>
                    <th>Kode</th>
                    <th>Keterangan</th>
                    <th class="table-light">Solusi 1</th>
                    <th class="table-light">Solusi 2</th>
                    <th class="table-light">Solusi 3</th>
                    <th class="table-light">Solusi 4</th>
                    <th class="table-light">Solusi 5</th>
                    <th class="table-light">Solusi 6</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="table-body" style="display: none;">
                <?php if (!empty($solusi)): ?>
                    <?php foreach ($solusi as $i => $row): ?>
                        <tr>
                            <th scope="row"><?= $i + 1 ?></th>
                            <td><?= html_escape($row->kode) ?: '-' ?></td>
                            <td class="text-wrap"><?= html_escape($row->keterangan) ?: '-' ?></td>
                            <td class="text-wrap"><?= html_escape($row->solusi_1) ?: '-' ?></td>
                            <td class="text-wrap"><?= html_escape($row->solusi_2) ?: '-' ?></td>
                            <td class="text-wrap"><?= html_escape($row->solusi_3) ?: '-' ?></td>
                            <td class="text-wrap"><?= html_escape($row->solusi_4) ?: '-' ?></td>
                            <td class="text-wrap"><?= html_escape($row->solusi_5) ?: '-' ?></td>
                            <td class="text-wrap"><?= html_escape($row->solusi_6) ?: '-' ?></td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                        <a href="<?= base_url('solusi/edit/' . $row->id) ?>" class="btn btn-sm btn-icon btn-label-info"
                                        title="Edit">
                                        <i class="tf-icons ti ti-edit"></i>
                                    </a>
                                    <form method="post" action="<?= base_url('solusi/delete/' . $row->id) ?>"
                                        class="d-inline js-delete-form m-0 p-0">
                                        <button type="button" class="btn btn-sm btn-icon btn-label-danger js-confirm-delete"
                                            title="Hapus" data-kode="<?= html_escape($row->kode) ?>">
                                            <i class="tf-icons ti ti-square-minus"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="10" class="text-center text-muted py-4">Belum ada data solusi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation" class="mt-3 d-flex justify-content-end me-3">
            <ul id="pagination" class="pagination pagination-sm"></ul>
        </nav>
    </div>
</div>
