<?php
$role = $this->session->userdata('role');
$summary = $summary ?? [];
$risk_distribution = $risk_distribution ?? [];
$latest_diagnoses = $latest_diagnoses ?? [];
$latest_patient = $latest_patient ?? null;
$highest_risk_case = $highest_risk_case ?? null;
$current_user_name = trim((string) ($current_user_name ?? 'Pengguna'));

$totalCases = 0;
foreach ($risk_distribution as $item)
{
    $totalCases += (int) $item->total;
}

$formatRisk = function ($level, $fallbackName = '')
{
    switch ((int) $level)
    {
        case 1:
            return ['label' => 'Rendah', 'badge' => 'risk-low', 'icon' => 'ti-shield-check', 'color' => '#10b981', 'bar' => '#10b981'];
        case 2:
            return ['label' => 'Sedang', 'badge' => 'risk-mid', 'icon' => 'ti-alert-triangle', 'color' => '#f59e0b', 'bar' => '#f59e0b'];
        case 3:
            return ['label' => 'Tinggi', 'badge' => 'risk-high', 'icon' => 'ti-activity-heartbeat', 'color' => '#ec4899', 'bar' => '#ec4899'];
        default:
            return ['label' => $fallbackName ?: 'N/A', 'badge' => 'risk-none', 'icon' => 'ti-stethoscope', 'color' => '#94a3b8', 'bar' => '#94a3b8'];
    }
};
?>

<!-- ADMIN DASHBOARD  (role = 1) -->
<?php if ($role == '1'): ?>
    <div class="spk-db">

        <div class="spk-hero rounded">
            <div class="spk-hero-inner">
                <div>
                    <div class="spk-hero-tag"><i class="ti ti-heart-rate-monitor"></i> Sistem Pakar Deteksi Tumor Payudara
                    </div>
                    <h1>Monitoring <em>Sistem Pakar</em><br>Tumor Payudara secara real-time.</h1>
                    <p>Halo <?= html_escape($current_user_name) ?>, semua data pasien, diagnosis, dan distribusi risiko
                        tersaji dalam satu tampilan terpusat.</p>
                    <div class="spk-hero-btns">
                        <a href="<?= base_url('deteksiDini') ?>" class="spk-btn-pink"><i class="ti ti-stethoscope"></i>
                            Mulai Deteksi</a>
                        <a href="<?= base_url('dataPasien') ?>" class="spk-btn-ghost"><i class="ti ti-users"></i> Lihat
                            Pasien</a>
                    </div>
                </div>
                <div class="spk-hero-box">
                    <div class="spk-hero-box-title">Highlight Hari Ini</div>
                    <div class="spk-hstat">
                        <div class="spk-hstat-label">Diagnosis hari ini</div>
                        <div class="spk-hstat-val"><?= (int) ($summary['today_diagnosa'] ?? 0) ?></div>
                        <div class="spk-hstat-sub">kasus baru terdeteksi</div>
                    </div>
                    <div class="spk-hstat">
                        <div class="spk-hstat-label">7 hari terakhir</div>
                        <div class="spk-hstat-val"><?= (int) ($summary['weekly_diagnosa'] ?? 0) ?></div>
                        <div class="spk-hstat-sub">kasus dalam seminggu</div>
                    </div>
                    <div class="spk-hstat">
                        <div class="spk-hstat-label">Rata-rata skor risiko</div>
                        <div class="spk-hstat-val"><?= number_format((float) ($summary['average_persen'] ?? 0), 1) ?>%</div>
                        <div class="spk-hstat-sub">dari seluruh diagnosis</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="spk-stat-grid">
            <div class="card spk-card shadow-sm">
                <div class="card-body">
                    <div class="spk-stat-top">
                        <div class="spk-stat-icon si-pink"><i class="ti ti-users"></i></div>
                    </div>
                    <h2 class="fw-bold mb-1"><?= (int) ($summary['total_pasien'] ?? 0) ?></h2>
                    <div class="spk-stat-label">Total Pasien</div>
                    <div class="spk-stat-hint">Pengguna terdaftar dengan role pasien</div>
                </div>
            </div>
            <div class="card spk-card shadow-sm">
                <div class="card-body">
                    <div class="spk-stat-top">
                        <div class="spk-stat-icon si-teal"><i class="ti ti-report-analytics"></i></div>
                    </div>
                    <h2 class="fw-bold mb-1"><?= (int) ($summary['total_diagnosa'] ?? 0) ?></h2>
                    <div class="spk-stat-label">Total Diagnosis</div>
                    <div class="spk-stat-hint">Riwayat diagnosis tersimpan</div>
                </div>
            </div>
            <div class="card spk-card shadow-sm">
                <div class="card-body">
                    <div class="spk-stat-top">
                        <div class="spk-stat-icon si-amber"><i class="ti ti-list-details"></i></div>
                    </div>
                    <h2 class="fw-bold mb-1"><?= (int) ($summary['total_gejala'] ?? 0) ?></h2>
                    <div class="spk-stat-label">Data Gejala</div>
                    <div class="spk-stat-hint">Gejala screening</div>
                </div>
            </div>
            <div class="card spk-card shadow-sm">
                <div class="card-body">
                    <div class="spk-stat-top">
                        <div class="spk-stat-icon si-violet"><i class="ti ti-settings"></i></div>
                    </div>
                    <h2 class="fw-bold mb-1"><?= (int) ($summary['total_rule'] ?? 0) ?></h2>
                    <div class="spk-stat-label">Basis Rule</div>
                    <div class="spk-stat-hint"><?= (int) ($summary['total_risiko'] ?? 0) ?> level risiko</div>
                </div>
            </div>
        </div>

        <div class="spk-two">

            <!-- Risk Distribution -->
            <div class="card">
                <div class="spk-panel-head">
                    <div class="gap-2">
                        <h6 class="my-md-0 fw-bold">Distribusi Risiko Diagnosis</h6>
                        <p class="fs-6 my-md-0">Komposisi hasil berdasarkan level risiko tersimpan</p>
                    </div>
                    <span class="spk-chip"><span class="dot"></span><?= $totalCases ?> <span class="d-none d-md-inline">Total Kasus</span></span>
                </div>
                <div class="spk-panel-body">
                    <?php if (!empty($risk_distribution)): ?>
                        <div class="spk-risk-rows">
                            <?php foreach ($risk_distribution as $item):
                                $rm = $formatRisk($item->level, (string) $item->name);
                                $pct = $totalCases > 0 ? round(((int) $item->total / $totalCases) * 100) : 0;
                                ?>
                                <div>
                                    <div class="spk-risk-top">
                                        <div class="spk-risk-info">
                                            <div class="spk-risk-dot" style="background:<?= $rm['color'] ?>"></div>
                                            <div>
                                                <p class="my-md-0 fw-bold"><?= html_escape($item->name ?: $rm['label']) ?></p>
                                                <div class="spk-risk-lv">Level <?= (int) $item->level ?> &bull; <span
                                                        class="spk-badge <?= $rm['badge'] ?>"><?= $rm['label'] ?></span></div>
                                            </div>
                                        </div>
                                        <div style="text-align:right">
                                            <div class="spk-risk-cnt" style="color:<?= $rm['color'] ?>"><?= (int) $item->total ?>
                                                kasus</div>
                                            <div class="spk-risk-pct"><?= $pct ?>% dari total</div>
                                        </div>
                                    </div>
                                    <div class="spk-bar-wrap">
                                        <div class="spk-bar" style="width:<?= $pct ?>%;background:<?= $rm['bar'] ?>"></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="spk-empty"><i class="ti ti-chart-donut-3"></i>
                            <p>Belum ada data diagnosis untuk divisualisasikan.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Insight Panel -->
            <div class="card">
                <?php if ($highest_risk_case):
                    $tRM = $formatRisk($highest_risk_case->level, (string) $highest_risk_case->risiko_name);
                    ?>
                    <div class="spk-insight-hero rounded-top">
                        <h6 class="spk-ih-tag">Kasus Risiko Tertinggi</h6>
                        <div class="spk-ih-name"><?= html_escape($highest_risk_case->name) ?></div>
                        <div class="spk-ih-meta"><?= (int) $highest_risk_case->persen ?>% skor &bull;
                            <?= date('d M Y H:i', strtotime($highest_risk_case->created_at)) ?></div>
                        <div class="spk-ih-bdg"><span class="spk-badge <?= $tRM['badge'] ?>"><?= $tRM['label'] ?></span></div>
                    </div>
                <?php else: ?>
                    <div class="spk-insight-hero rounded-top">
                        <div class="spk-ih-tag">Kasus Risiko Tertinggi</div>
                        <div class="spk-ih-name" style="color:rgba(255,255,255,.35)">Belum ada data diagnosis.</div>
                    </div>
                <?php endif; ?>

                <div class="spk-insight-body">
                    <!-- <?php if ($latest_patient): ?>
                        <div class="card-body border rounded px-md-3 py-md-3">
                            <div class="spk-icard-label">Pasien Terbaru</div>
                            <h6 class="my-md-1 fw-bold"><?= html_escape($latest_patient->name) ?></h6>
                            <p class="my-md-0 fs-tiny">
                                <?= html_escape($latest_patient->usia) ?> tahun
                                <?php if (!empty($latest_patient->alamat)): ?>&bull;
                                    <?= html_escape($latest_patient->alamat) ?>        <?php endif; ?>
                            </p>
                            <p class="my-md-1 fs-tiny text-primary fw-bold"><i class="ti ti-calendar-check"></i>
                            Bergabung
                                <?= date('d M Y', strtotime($latest_patient->created_at)) ?></p>
                        </div>
                    <?php else: ?>
                        <div class="spk-icard">
                            <div class="spk-icard-label">Pasien Terbaru</div>
                            <div class="spk-icard-meta" style="color:var(--text-light)">Belum ada pasien terdaftar.</div>
                        </div>
                    <?php endif; ?> -->

                    <div class="d-flex flex-column gap-3">
                        <a href="<?= base_url('riwayatDiagnosis') ?>" class="text-decoration-none">
                            <div class="spk-link-card border rounded">
                                <div class="d-flex justify-content-between align-items-center px-3 py-3 px-md-3 py-md-3">
                                    <div>
                                        <h6 class="my-md-0 fw-bold">Riwayat Diagnosis</h6>
                                        <div class="small text-muted">Review hasil deteksi tersimpan</div>
                                    </div>
                                    <i class="ti ti-arrow-right"></i>
                                </div>
                            </div>
                        </a>
                        <a href="<?= base_url('edukasi') ?>" class="text-decoration-none mb-2">
                            <div class="spk-link-card border rounded">
                                <div class="d-flex justify-content-between align-items-center px-3 py-3 px-md-3 py-md-3">
                                    <div>
                                        <h6 class="my-md-0 fw-bold">Edukasi &amp; Informasi</h6>
                                        <div class="small text-muted">Materi SADARI dan pencegahan</div>
                                    </div>
                                    <i class="ti ti-arrow-right"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ── RECENT DIAGNOSES ──────────────────────────────── -->
        <div class="card">
            <div class="spk-panel-head">
                <div class="gap-2">
                    <h6 class="my-md-0 fw-bold">Aktivitas Diagnosis Terbaru</h6>
                    <p class="fs-6 my-md-0">Lima hasil deteksi terbaru yang tersimpan di sistem</p>
                </div>
                <a href="<?= base_url('dataPasien') ?>" class="spk-btn-outline"><i class="ti ti-table"></i> <span class="d-none d-md-inline">Tabel
                    Lengkap</span></a>
            </div>
            <div class="card-body">
                <?php if (!empty($latest_diagnoses)): ?>
                    <div class="spk-diag-grid">
                        <?php foreach ($latest_diagnoses as $row):
                            $rm = $formatRisk($row->level, (string) $row->risiko_name);
                            ?>
                            <div class="spk-dcard">
                                <div class="spk-dcard-top">
                                    <div>
                                        <h5 class="my-md-0 fw-bold"><?= html_escape($row->name ?: 'Pasien') ?></h5>
                                        <p class="my-md-1 fs-tiny fw-normal">
                                            <?= !empty($row->usia) ? (int) $row->usia . ' tahun' : 'Usia tidak tersedia' ?></p>
                                    </div>
                                    <span class="spk-badge <?= $rm['badge'] ?>"><?= $rm['label'] ?></span>
                                </div>
                                <div class="spk-dcard-meta">
                                    <div class="d-flex align-items-center gap-1 fs-tiny fw-normal"><i
                                            class="ti ti-calendar-event ti-xs text-primary"></i><?= date('d M Y, H:i', strtotime($row->created_at)) ?>
                                    </div>
                                    <div class="d-flex align-items-center gap-1 fs-tiny fw-normal"><i
                                            class="ti ti-chart-donut-3 ti-xs text-primary"></i><?= (int) $row->persen ?>%</div>
                                </div>
                                <div class="spk-dcard-foot">
                                    <span
                                        class="my-md-1 fs-tiny fw-normal"><?= html_escape($row->risiko_name ?: 'Risiko belum ditentukan') ?></span>
                                    <a href="<?= base_url('deteksiDini/unduh/' . $row->id) ?>" class="spk-btn-dl"><i
                                            class="ti ti-download"></i> Unduh</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="spk-empty"><i class="ti ti-report-analytics"></i>
                        <p>Belum ada aktivitas diagnosis yang bisa ditampilkan.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
<?php endif; ?>


<!-- PASIEN DASHBOARD  (role = 2) -->
<?php if ($role == '2'): ?>
    <div class="spk-db">

        <div class="spk-hero rounded">
            <div class="spk-hero-inner">
                <div>
                    <div class="spk-hero-tag"><i class="ti ti-heart-rate-monitor"></i> Deteksi Dini Tumor Payudara</div>
                    <h1>Selamat datang, <em><?= html_escape($current_user_name) ?></em></h1>
                    <p>Pantau riwayat deteksi dini kamu, lihat hasil diagnosis, dan akses materi edukasi untuk menjaga
                        kesehatan payudara kamu.</p>
                    <div class="spk-hero-btns">
                        <a href="<?= base_url('deteksiDini') ?>" class="spk-btn-pink"><i class="ti ti-stethoscope"></i>
                            Mulai Deteksi</a>
                        <a href="<?= base_url('riwayatDiagnosis') ?>" class="spk-btn-ghost"><i
                                class="ti ti-clipboard-list"></i> Riwayat Saya</a>
                    </div>
                </div>
                <div class="spk-hero-box">
                    <div class="spk-hero-box-title">Statistik Kamu</div>
                    <div class="spk-hstat">
                        <div class="spk-hstat-label">Total diagnosis saya</div>
                        <div class="spk-hstat-val"><?= (int) ($summary['my_total_diagnosa'] ?? 0) ?></div>
                        <div class="spk-hstat-sub">pemeriksaan tersimpan</div>
                    </div>
                    <div class="spk-hstat">
                        <div class="spk-hstat-label">Diagnosis bulan ini</div>
                        <div class="spk-hstat-val"><?= (int) ($summary['my_monthly_diagnosa'] ?? 0) ?></div>
                        <div class="spk-hstat-sub">kasus bulan berjalan</div>
                    </div>
                    <div class="spk-hstat">
                        <div class="spk-hstat-label">Rata-rata skor risiko</div>
                        <div class="spk-hstat-val"><?= number_format((float) ($summary['my_average_persen'] ?? 0), 1) ?>%
                        </div>
                        <div class="spk-hstat-sub">dari seluruh diagnosis kamu</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="spk-stat-grid">
            <div class="card spk-card shadow-sm">
                <div class="card-body">
                    <div class="spk-stat-top">
                        <div class="spk-stat-icon si-pink"><i class="ti ti-clipboard-list"></i></div>
                    </div>
                    <h2 class="fw-bold mb-1"><?= (int) ($summary['my_total_diagnosa'] ?? 0) ?></h2>
                    <div class="spk-stat-label">Total Diagnosis</div>
                    <div class="spk-stat-hint">Seluruh riwayat pemeriksaan kamu</div>
                </div>
            </div>
            <div class="card spk-card shadow-sm">
                <div class="card-body">
                    <div class="spk-stat-top">
                        <div class="spk-stat-icon si-teal"><i class="ti ti-shield-check"></i></div>
                    </div>
                    <h2 class="fw-bold mb-1"><?= (int) ($summary['my_low_risk'] ?? 0) ?></h2>
                    <div class="spk-stat-label">Risiko Rendah</div>
                    <div class="spk-stat-hint">Hasil deteksi level aman</div>
                </div>
            </div>
            <div class="card spk-card shadow-sm">
                <div class="card-body">
                    <div class="spk-stat-top">
                        <div class="spk-stat-icon si-amber"><i class="ti ti-alert-triangle"></i></div>
                    </div>
                    <h2 class="fw-bold mb-1"><?= (int) ($summary['my_mid_risk'] ?? 0) ?></h2>
                    <div class="spk-stat-label">Risiko Sedang</div>
                    <div class="spk-stat-hint">Perlu pemantauan lebih lanjut</div>
                </div>
            </div>
            <div class="card spk-card shadow-sm">
                <div class="card-body">
                    <div class="spk-stat-top">
                        <div class="spk-stat-icon si-violet"><i class="ti ti-activity-heartbeat"></i></div>
                    </div>
                    <h2 class="fw-bold mb-1"><?= (int) ($summary['my_high_risk'] ?? 0) ?></h2>
                    <div class="spk-stat-label">Risiko Tinggi</div>
                    <div class="spk-stat-hint">Segera konsultasi ke dokter</div>
                </div>
            </div>
        </div>

        <div class="spk-two">

            <!-- Riwayat Diagnosis Terbaru -->
            <div class="card">
                <div class="spk-panel-head">
                    <div class="gap-2">
                        <h6 class="my-md-0 fw-bold">Riwayat Diagnosis Terbaru</h6>
                        <p class="fs-6 my-md-0">Lima hasil deteksi terakhir yang tersimpan</p>
                    </div>
                    <a href="<?= base_url('riwayatDiagnosis') ?>" class="spk-btn-outline"><i class="ti ti-table"></i> 
                    <span class="d-none d-md-inline">Lihat Semua</span></a>
                </div>
                <div class="card-body">
                    <?php if (!empty($latest_diagnoses)): ?>
                        <div class="spk-diag-grid">
                            <?php foreach ($latest_diagnoses as $row):
                                $rm = $formatRisk($row->level, (string) $row->risiko_name);
                                ?>
                                <div class="spk-dcard">
                                    <div class="spk-dcard-top">
                                        <div>
                                            <h5 class="my-md-0 fw-bold"><?= html_escape($row->risiko_name ?: 'Hasil Deteksi') ?>
                                            </h5>
                                            <p class="my-md-1 fs-tiny fw-normal">
                                                <?= date('d M Y, H:i', strtotime($row->created_at)) ?></p>
                                        </div>
                                        <span class="spk-badge <?= $rm['badge'] ?>"><?= $rm['label'] ?></span>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mb-1">
                                            <span class="fs-tiny text-muted">Skor Risiko</span>
                                            <span class="fs-tiny fw-bold"
                                                style="color:<?= $rm['color'] ?>"><?= (int) $row->persen ?>%</span>
                                        </div>
                                        <div class="spk-bar-wrap">
                                            <div class="spk-bar"
                                                style="width:<?= (int) $row->persen ?>%;background:<?= $rm['color'] ?>"></div>
                                        </div>
                                    </div>
                                    <div class="spk-dcard-foot">
                                        <span class="my-md-1 fs-tiny fw-normal text-muted">
                                            <i class="ti ti-calendar-event ti-xs text-primary"></i>
                                            <?= date('d M Y', strtotime($row->created_at)) ?>
                                        </span>
                                        <a href="<?= base_url('deteksiDini/unduh/' . $row->id) ?>" class="spk-btn-dl"><i
                                                class="ti ti-download"></i> Unduh</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="spk-empty">
                            <i class="ti ti-report-analytics"></i>
                            <p>Kamu belum pernah melakukan deteksi dini.<br>Mulai sekarang untuk memantau kesehatanmu!</p>
                            <a href="<?= base_url('deteksiDini') ?>" class="spk-btn-pink mt-3 d-inline-flex"><i
                                    class="ti ti-stethoscope"></i> Mulai Deteksi Pertama</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Insight + Saran + Quick Links -->
            <div class="card">
                <?php if ($highest_risk_case):
                    $tRM = $formatRisk($highest_risk_case->level, (string) $highest_risk_case->risiko_name);
                    ?>
                    <div class="spk-insight-hero rounded-top">
                        <div class="spk-ih-tag">Diagnosis Paling Berisiko</div>
                        <div class="spk-ih-name"><?= html_escape($highest_risk_case->risiko_name ?: 'Hasil Deteksi') ?></div>
                        <div class="spk-ih-meta"><?= (int) $highest_risk_case->persen ?>% skor &bull;
                            <?= date('d M Y H:i', strtotime($highest_risk_case->created_at)) ?></div>
                        <div class="spk-ih-bdg"><span class="spk-badge <?= $tRM['badge'] ?>"><?= $tRM['label'] ?></span></div>
                    </div>
                <?php else: ?>
                    <div class="spk-insight-hero rounded-top">
                        <div class="spk-ih-tag">Diagnosis Paling Berisiko</div>
                        <div class="spk-ih-name" style="color:rgba(255,255,255,.35)">Belum ada data diagnosis.</div>
                    </div>
                <?php endif; ?>

                <div class="spk-insight-body">

                    <?php
                    $level = $highest_risk_case ? (int) $highest_risk_case->level : 0;
                    $saranMap = [
                        1 => ['icon' => 'ti-circle-check', 'color' => '#10b981', 'bg' => 'rgba(16,185,129,.08)', 'border' => '#10b98133', 'title' => 'Status Aman', 'text' => 'Hasil deteksi terakhir kamu menunjukkan risiko rendah. Tetap lakukan SADARI rutin setiap bulan.'],
                        2 => ['icon' => 'ti-alert-triangle', 'color' => '#f59e0b', 'bg' => 'rgba(245,158,11,.08)', 'border' => '#f59e0b33', 'title' => 'Perlu Perhatian', 'text' => 'Ada indikasi risiko sedang. Disarankan untuk berkonsultasi dengan tenaga medis dalam waktu dekat.'],
                        3 => ['icon' => 'ti-urgent', 'color' => '#ec4899', 'bg' => 'rgba(236,72,153,.08)', 'border' => '#ec489933', 'title' => 'Segera Konsultasi', 'text' => 'Hasil deteksi menunjukkan risiko tinggi. Segera temui dokter untuk pemeriksaan lebih lanjut.'],
                    ];
                    $saran = $saranMap[$level] ?? ['icon' => 'ti-stethoscope', 'color' => '#94a3b8', 'bg' => 'rgba(148,163,184,.08)', 'border' => '#94a3b833', 'title' => 'Mulai Deteksi', 'text' => 'Kamu belum memiliki riwayat deteksi. Lakukan deteksi dini sekarang untuk memantau kesehatanmu.'];
                    ?>
                    <div class="rounded px-3 py-3"
                        style="background:<?= $saran['bg'] ?>;border:1px solid <?= $saran['border'] ?>;">
                        <div class="d-flex align-items-start gap-2">
                            <i class="ti <?= $saran['icon'] ?> mt-1 flex-shrink-0"
                                style="color:<?= $saran['color'] ?>;font-size:1.1rem;"></i>
                            <div>
                                <div class="fw-bold mb-1" style="font-size:.82rem;color:<?= $saran['color'] ?>">
                                    <?= $saran['title'] ?></div>
                                <div class="text-muted" style="font-size:.75rem;line-height:1.5"><?= $saran['text'] ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column gap-2">
                        <a href="<?= base_url('deteksiDini') ?>" class="text-decoration-none">
                            <div class="spk-link-card border rounded">
                                <div class="d-flex justify-content-between align-items-center px-3 py-3 px-md-3 py-md-3">
                                    <div>
                                        <h6 class="my-md-0 fw-bold">Deteksi Dini Baru</h6>
                                        <div class="small text-muted">Mulai pemeriksaan sekarang</div>
                                    </div>
                                    <i class="ti ti-arrow-right"></i>
                                </div>
                            </div>
                        </a>
                        <a href="<?= base_url('riwayatDiagnosis') ?>" class="text-decoration-none">
                            <div class="spk-link-card border rounded">
                                <div class="d-flex justify-content-between align-items-center px-3 py-3 px-md-3 py-md-3">
                                    <div>
                                        <h6 class="my-md-0 fw-bold">Riwayat Diagnosis</h6>
                                        <div class="small text-muted">Lihat semua hasil deteksi</div>
                                    </div>
                                    <i class="ti ti-arrow-right"></i>
                                </div>
                            </div>
                        </a>
                        <a href="<?= base_url('edukasi') ?>" class="text-decoration-none">
                            <div class="spk-link-card border rounded">
                                <div class="d-flex justify-content-between align-items-center px-3 py-3 px-md-3 py-md-3">
                                    <div>
                                        <h6 class="my-md-0 fw-bold">Edukasi &amp; SADARI</h6>
                                        <div class="small text-muted">Materi pencegahan kanker payudara</div>
                                    </div>
                                    <i class="ti ti-arrow-right"></i>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>
<?php endif; ?>