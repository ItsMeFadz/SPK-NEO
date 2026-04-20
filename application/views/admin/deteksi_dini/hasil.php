<!-- Hasil Diagnosis -->
<div class="card card-action mb-4 overflow-hidden shadow">
    <div class="card-header d-flex align-items-center justify-content-between flex-wrap">
        <div class="d-flex align-items-center">
            <span class="text-primary me-2">
                <img src="http://localhost/SPK-NEO/assets/admin/img/icons/brands/cancer-HD.png"
                    style="height: 33px; width: 33px;">
            </span>
            <h3 class="mb-0">Hasil Diagnosis</h3>
        </div>

        <!-- kanan -->
        <div class="d-flex gap-2 mt-2 mt-md-0">
            <a href="<?= base_url('deteksiDini/unduh/' . $diagnosa->id) ?>" class="btn btn-primary">
                <i class="ti ti-download ti-xs me-1"></i>Unduh Hasil
            </a>
            <a href="<?= base_url('deteksiDini') ?>" class="btn btn-label-dark">
                <i class="ti ti-refresh ti-xs me-1"></i>
                <span class="d-none d-md-inline ms-1">Diagnosis Ulang</span>
            </a>
        </div>

    </div>
    <div class="card-body">
        <div class="alert alert-primary alert-dismissible d-flex align-items-baseline mb-3" role="alert">
            <span class="alert-icon alert-icon-lg text-primary me-2">
                <i class="ti ti-alert-triangle ti-sm"></i>
            </span>
            <div class="d-flex flex-column ps-1">
                <h5 class="alert-heading mb-2">Peringatan Penting!</h5>
                <p class="mb-0">
                    Hasil deteksi ini merupakan <span class="fw-bold">Sistem Pakar Berbasis Algoritma</span> dan hanya
                    bersifat sebagai <span class="fw-bold">panduan
                        awal/skrining mandiri</span>. Hasil ini <span class="text-decoration-underline">bukan</span>
                    merupakan diagnosa medis final. Apapun hasil yang tertera di
                    bawah ini, Anda sangat disarankan untuk melakukan pemeriksaan lebih lanjut ke <span
                        class="fw-bold">Fasilitas Pelayanan
                        Kesehatan (Fasyankes)</span>, Puskesmas, atau Rumah Sakit terdekat untuk mendapatkan diagnosa
                    klinis yang
                    akurat dari dokter spesialis.
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <div class="added-cards">
            <div class="list-group">
                <div class="list-group-item">
                    <span class="d-flex flex-column justify-content-center align-items-center mt-3 mb-3">
                        <!-- <img src="http://localhost/SPK-NEO/assets/admin/img/icons/brands/alert-success.png" alt=""
                            style="height: 100px; width: 100px; shadow: 0 4px 6px rgba(0, 0, 0, 0.1);" class="mb-2"> -->
                        <!-- <h3 class="text-uppercase text-success fw-bold">TIDAK Terindikasi Resiko</h3> -->
                        <img src="<?= base_url('assets/admin/img/icons/brands/' . $icon) ?>"
                            style="height: 100px; width: 100px;" class="mb-2">
                        <h3 class="text-uppercase text-center fw-bold <?= str_replace('btn-', 'text-', $class) ?>">
                            <?= isset($head_name) ? $head_name : 'Hasil deteksi dini berhasil dihitung.'; ?>
                        </h3>
                        <h5 class="text-muted text-center">
                            <?= isset($message) ? $message : 'Hasil deteksi dini berhasil dihitung.'; ?>
                        </h5>
                    </span>
                </div>
                <div class="list-group-item">
                    <div class="row text-center mt-3 gap-3">
                        <div class="col">
                            <p class="text-light fw-bold">SKOR RISIKO</p>
                            <h3><?= round($diagnosa->persen, 2); ?>%</h3>
                        </div>
                        <div class="col">
                            <p class="text-light fw-bold">TINGKAT RISIKO</p>
                            <span class="btn <?= $class ?> fw-bold">
                                <?= strtoupper($diagnosa->name); ?>
                            </span>
                        </div>
                        <div class="col">
                            <p class="text-light fw-bold">TANGGAL PERIKSA</p>
                            <h3>
                                <?= date('d F Y', strtotime($diagnosa->created_at)); ?>
                            </h3>
                        </div>
                    </div>
                    <div class="d-flex mt-3 flex-sm-row flex-column">
                        <div class="card-information w-100">
                            <div class="d-flex align-items-center gap-2 mb-2 pt-1">
                                <span class="btn btn-icon btn-sm btn-label-primary">
                                    01
                                </span>
                                <h6 class="mb-0 me-3">
                                    Biodata
                                </h6>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="basic-default-name">Nama
                                            Lengkap</label>
                                        <input type="text" name="name" class="form-control"
                                            value="<?= html_escape($users->name) ?>" disabled />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="basic-default-name">Tanggal
                                            Lahir</label>
                                        <input type="date" name="tgl_lahir" class="form-control"
                                            value="<?= html_escape($users->tgl_lahir) ?>" disabled />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="basic-default-name">Usia (Tahun)</label>
                                        <input type="number" name="usia" class="form-control"
                                            value="<?= html_escape($users->usia) ?>" disabled />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="basic-default-name">Alamat
                                            Lengkap</label>
                                        <textarea type="text" name="alamat" class="form-control" rows="1"
                                            disabled><?= html_escape($users->alamat) ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Rekomendasi Tindakan -->
<div class="card card-action mb-4 overflow-hidden shadow">
    <div class="card-header" id="vertical-example">
        <span class="text-primary me-2">
            <img src="http://localhost/SPK-NEO/assets/admin/img/icons/brands/lamp.png" alt=""
                style="height: 33px; width: 33px;">
        </span>
        <h4 class="card-action-title mb-0">Rekomendasi Tindakan</h4>
    </div>
    <div class="card-body">
        <div class="col-md-12">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <div class="alert alert-primary alert-dismissible d-flex align-items-baseline mb-3" role="alert">
                        <span class="alert-icon alert-icon-lg text-primary me-2">
                            <i class="ti ti-circle-check ti-sm"></i>
                        </span>
                        <div class="d-flex flex-column ps-1">
                            <h5 class="alert-heading mb-2">Pemeriksaan Payudara Sendiri (SADARI)</h5>
                            <p class="mb-0 fw-light">
                                Melakukan pemeriksaan payudara sendiri setiap bulan untuk mendeteksi perubahan dini.
                                Dilakukan 7-10 hari setelah menstruasi.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <div class="alert alert-primary alert-dismissible d-flex align-items-baseline mb-3" role="alert">
                        <span class="alert-icon alert-icon-lg text-primary me-2">
                            <i class="ti ti-circle-check ti-sm"></i>
                        </span>
                        <div class="d-flex flex-column ps-1">
                            <h5 class="alert-heading mb-2">Konseling Nutrisi</h5>
                            <p class="mb-0 fw-light">
                                Panduan diet sehat untuk mengurangi risiko dan mendukung pemulihan, termasuk mengurangi
                                lemak jenuh.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <div class="alert alert-primary alert-dismissible d-flex align-items-baseline mb-3" role="alert">
                        <span class="alert-icon alert-icon-lg text-primary me-2">
                            <i class="ti ti-circle-check ti-sm"></i>
                        </span>
                        <div class="d-flex flex-column ps-1">
                            <h5 class="alert-heading mb-2">Mammogram Rutin</h5>
                            <p class="mb-0 fw-light">
                                Melakukan mammogram setiap 1-2 tahun untuk wanita di atas 40 tahun atau sesuai
                                rekomendasi dokter.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <div class="alert alert-primary alert-dismissible d-flex align-items-baseline mb-3" role="alert">
                        <span class="alert-icon alert-icon-lg text-primary me-2">
                            <i class="ti ti-circle-check ti-sm"></i>
                        </span>
                        <div class="d-flex flex-column ps-1">
                            <h5 class="alert-heading mb-2">USG Payudara</h5>
                            <p class="mb-0 fw-light">
                                Pemeriksaan ultrasonografi payudara untuk evaluasi lebih lanjut jika ditemukan kelainan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <div class="alert alert-primary alert-dismissible d-flex align-items-baseline mb-3" role="alert">
                        <span class="alert-icon alert-icon-lg text-primary me-2">
                            <i class="ti ti-circle-check ti-sm"></i>
                        </span>
                        <div class="d-flex flex-column ps-1">
                            <h5 class="alert-heading mb-2">Konseling Genetik</h5>
                            <p class="mb-0 fw-light">
                                Konseling untuk memahami risiko genetik dan pilihan pencegahan jika memiliki mutasi gen
                                BRCA.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <div class="alert alert-primary alert-dismissible d-flex align-items-baseline mb-3" role="alert">
                        <span class="alert-icon alert-icon-lg text-primary me-2">
                            <i class="ti ti-circle-check ti-sm"></i>
                        </span>
                        <div class="d-flex flex-column ps-1">
                            <h5 class="alert-heading mb-2">Program Olahraga Teratur</h5>
                            <p class="mb-0 fw-light">
                                Aktivitas fisik teratur minimal 150 menit per minggu untuk menjaga berat badan ideal dan
                                mengurangi risiko.</p>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <div class="alert alert-primary alert-dismissible d-flex align-items-baseline mb-3" role="alert">
                        <span class="alert-icon alert-icon-lg text-primary me-2">
                            <i class="ti ti-circle-check ti-sm"></i>
                        </span>
                        <div class="d-flex flex-column ps-1">
                            <h5 class="alert-heading mb-2">Manajemen Berat Badan</h5>
                            <p class="mb-0 fw-light">
                                Program untuk mencapai dan mempertahankan berat badan ideal melalui diet dan olahraga.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <div class="alert alert-primary alert-dismissible d-flex align-items-baseline mb-3" role="alert">
                        <span class="alert-icon alert-icon-lg text-primary me-2">
                            <i class="ti ti-circle-check ti-sm"></i>
                        </span>
                        <div class="d-flex flex-column ps-1">
                            <h5 class="alert-heading mb-2">Hindari Alkohol</h5>
                            <p class="mb-0 fw-light">
                                Membatasi atau menghindari konsumsi alkohol untuk mengurangi risiko kanker payudara.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <div class="alert alert-primary alert-dismissible d-flex align-items-baseline mb-3" role="alert">
                        <span class="alert-icon alert-icon-lg text-primary me-2">
                            <i class="ti ti-circle-check ti-sm"></i>
                        </span>
                        <div class="d-flex flex-column ps-1">
                            <h5 class="alert-heading mb-2">Berhenti Merokok</h5>
                            <p class="mb-0 fw-light">
                                Program berhenti merokok untuk mengurangi risiko berbagai jenis kanker termasuk
                                payudara.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <div class="alert alert-primary alert-dismissible d-flex align-items-baseline mb-3" role="alert">
                        <span class="alert-icon alert-icon-lg text-primary me-2">
                            <i class="ti ti-circle-check ti-sm"></i>
                        </span>
                        <div class="d-flex flex-column ps-1">
                            <h5 class="alert-heading mb-2">Edukasi Kanker Payudara</h5>
                            <p class="mb-0 fw-light">
                                Program edukasi tentang faktor risiko, tanda-tanda dini, dan langkah pencegahan kanker
                                payudara.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
