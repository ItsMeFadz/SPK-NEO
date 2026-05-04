<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Deteksi Dini</title>
    <style>
        @page {
            margin: 18mm 14mm;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 0;
            color: #0f172a;
        }

        .pdf-page {
            background: #ffffff;
            border: 1px solid #dbe2ea;
            border-radius: 14px;
            overflow: hidden;
            page-break-after: always;
        }

        .pdf-page:last-child {
            page-break-after: auto;
        }

        .card-header {
            padding: 18px 22px;
            border-bottom: 1px solid #e5e7eb;
        }

        .header-table,
        .info-table,
        .biodata-table {
            width: 100%;
            border-collapse: separate;
        }

        .logo {
            width: 34px;
            height: 34px;
            vertical-align: middle;
            margin-right: 10px;
        }

        .title {
            font-size: 22px;
            font-weight: bold;
            color: #0f172a;
            vertical-align: middle;
        }

        .card-body {
            padding: 22px;
            page-break-inside: avoid;
        }

        .panel,
        .result-box,
        .action-row {
            page-break-inside: avoid;
        }

        .result-box {
            text-align: center;
            margin-bottom: 35px;
        }

        .status-icon {
            width: 90px;
            height: 90px;
            margin-bottom: 10px;
        }

        .heading-success {
            color: #28c76f;
        }

        .heading-warning {
            color: #d97706;
        }

        .heading-danger {
            color: #dc2626;
        }

        .result-title {
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
            margin: 8px 0;
        }

        .result-message {
            color: #64748b;
            font-size: 13px;
            line-height: 1.7;
            margin: 0 auto;
            max-width: 470px;
        }

        .panel {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 18px;
        }

        .metric {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            text-align: center;
            padding: 16px 12px;
            width: 31%;
        }

        .metric-label {
            display: block;
            color: #64748b;
            font-size: 11px;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .metric-value {
            font-size: 18px;
            font-weight: bold;
            color: #0f172a;
        }

        .badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 6px;
            color: #ffffff;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .badge-success {
            background: #28c76f;
        }

        .badge-warning {
            background: #E7E33C;
        }

        .badge-danger {
            background: #dc2626;
        }

        .mb-2 {
            margin-bottom: 0.5rem !important;
        }

        .mb-4 {
            margin-bottom: 1.5rem !important;
        }

        .section-title {
            font-size: 15px;
            font-weight: bold;
            color: #0f172a;
            margin: 0 0 12px;
            text-align: left;
        }

        .section-title-center {
            text-align: center;
        }

        .number-chip {
            display: inline-block;
            width: 26px;
            height: 26px;
            line-height: 28px;
            text-align: center;
            border-radius: 50%;
            font-size: 15px;
            font-weight: bold;
            margin-right: 8px;
            vertical-align: middle;
        }

        .field-label {
            font-size: 11px;
            color: #64748b;
            margin-bottom: 6px;
        }

        .field-value {
            border: 1px solid #dbe2ea;
            border-radius: 10px;
            background: #f8fafc;
            padding: 10px 12px;
            min-height: 18px;
            color: #0f172a;
        }

        .muted {
            color: #64748b;
        }

        .action-grid {
            width: 100%;
            border-collapse: separate;
        }

        .action-column {
            width: 100%;
            display: block;
        }

        .action-list {
            margin: 0;
            padding: 0;
        }

        .action-row {
            margin-bottom: 10px;
        }

        .action-item {
            border: 1px solid #dbeafe;
            background: #eff6ff;
            border-radius: 10px;
            padding: 12px 14px;
            color: #1e3a8a;
            line-height: 1.5;
            page-break-inside: avoid;
            break-inside: avoid;
        }

        .page-subtitle {
            color: #64748b;
            font-size: 11px;
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <?php
    $headingClass = 'heading-warning';
    $badgeClass = 'badge-warning';

    if ($diagnosa->level == 1)
    {
        $headingClass = 'heading-success';
        $badgeClass = 'badge-success';
    }
    elseif ($diagnosa->level == 3)
    {
        $headingClass = 'heading-danger';
        $badgeClass = 'badge-danger';
    }

    $solusiItems = [];
    if ($solusi)
    {
        for ($counter = 1; $counter <= 10; $counter++)
        {
            $field = 'solusi_' . $counter;
            if (!isset($solusi->$field) || trim((string) $solusi->$field) === '')
            {
                continue;
            }

            $solusiItems[] = $solusi->$field;
        }
    }

    $recommendationPages = [];
    $firstPageRecommendations = [];
    $remainingRecommendations = [];
    $currentWeight = 0;
    $nextPageWeightLimit = 980;

    $messageWeight = max(80, strlen(trim(strip_tags($message))) * 1.2);
    $addressWeight = max(60, strlen(trim(strip_tags((string) $users->alamat))) * 1.1);
    $firstPageUsedWeight = 520 + $messageWeight + $addressWeight;

    // Dibuat lebih longgar agar ruang kosong halaman 1 tetap terpakai.
    $firstPageWeightLimit = max(520, 1650 - $firstPageUsedWeight);

    foreach ($solusiItems as $index => $item)
    {
        $recommendation = [
            'number' => $index + 1,
            'text' => $item,
        ];
        $itemWeight = max(180, strlen(trim(strip_tags($item))) * 2);

        if (($currentWeight + $itemWeight) <= $firstPageWeightLimit || empty($firstPageRecommendations))
        {
            $firstPageRecommendations[] = $recommendation;
            $currentWeight += $itemWeight;
            continue;
        }

        $remainingRecommendations[] = $recommendation;
    }

    $currentPage = [];
    $currentPageWeight = 0;

    foreach ($remainingRecommendations as $recommendation)
    {
        $itemWeight = max(180, strlen(trim(strip_tags($recommendation['text']))) * 2);

        if (!empty($currentPage) && ($currentPageWeight + $itemWeight) > $nextPageWeightLimit)
        {
            $recommendationPages[] = $currentPage;
            $currentPage = [];
            $currentPageWeight = 0;
        }

        $currentPage[] = $recommendation;
        $currentPageWeight += $itemWeight;
    }

    if (!empty($currentPage))
    {
        $recommendationPages[] = $currentPage;
    }
    ?>

    <div class="pdf-page">
        <div class="card-header">
            <table class="header-table">
                <tr>
                    <td>
                        <?php if (!empty($logo_path)): ?>
                            <img src="<?= $logo_path; ?>" class="logo">
                        <?php endif; ?>
                        <span class="title">SI NEO</span>
                    </td>
                    <td style="text-align: right;" class="muted">
                        Dicetak: <?= date('d F Y H:i'); ?>
                    </td>
                </tr>
            </table>
        </div>

        <div class="card-body">
            <div class="mb-4">
                <!-- <div class="section-title">
                    <span class="number-chip">01.</span>Biodata
                </div> -->

                <table class="biodata-table">
                    <tr>
                        <td style="width: 48%; padding-right: 10px; vertical-align: top;">
                            <div class="field-label">Nama Lengkap</div>
                            <div class="field-value">
                                <?= html_escape($users->name); ?>
                            </div>
                        </td>
                        <td style="width: 48%; padding-left: 10px; vertical-align: top;">
                            <div class="field-label">Tanggal Lahir</div>
                            <div class="field-value">
                                <?= html_escape($users->tgl_lahir); ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="height: 12px;"></td>
                    </tr>
                    <tr>
                        <td style="width: 48%; padding-right: 10px; vertical-align: top;">
                            <div class="field-label">Usia (Tahun)</div>
                            <div class="field-value">
                                <?= html_escape($users->usia); ?>
                            </div>
                        </td>
                        <td style="width: 48%; padding-left: 10px; vertical-align: top;">
                            <div class="field-label">Alamat Lengkap</div>
                            <div class="field-value">
                                <?= nl2br(html_escape($users->alamat)); ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="result-box">
                <?php if (!empty($status_icon_path)): ?>
                    <img src="<?= $status_icon_path; ?>" class="status-icon">
                <?php endif; ?>
                <div class="result-title <?= $headingClass; ?>"><?= strtoupper($head_name); ?></div>
                <div class="result-message mb-4"><?= $message; ?></div>

                <table class="info-table">
                    <tr>
                        <td class="metric">
                            <span class="metric-label">SKOR RISIKO</span>
                            <div class="metric-value"><?= round($diagnosa->persen, 2); ?>%</div>
                        </td>
                        <td style="width: 3%;"></td>
                        <td class="metric">
                            <span class="metric-label">TINGKAT RISIKO</span>
                            <div style="margin-top: 6px;">
                                <span class="badge <?= $badgeClass; ?>"><?= strtoupper($diagnosa->name); ?></span>
                            </div>
                        </td>
                        <td style="width: 3%;"></td>
                        <td class="metric">
                            <span class="metric-label">TANGGAL PERIKSA</span>
                            <div class="metric-value"><?= date('d F Y', strtotime($diagnosa->created_at)); ?></div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="section-title mb-2">Rekomendasi Tindakan
            </div>
            <?php if ($solusiItems): ?>
                <div class="action-grid">
                    <div class="action-list action-column">
                        <?php foreach ($firstPageRecommendations as $item): ?>
                            <div class="action-row">
                                <div class="action-item">
                                    <strong><?= $item['number']; ?>.</strong>
                                    <?= html_escape($item['text']); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="field-value">
                    Rekomendasi tindakan belum tersedia untuk hasil deteksi ini.
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php foreach ($recommendationPages as $pageIndex => $pageItems): ?>
        <div class="pdf-page">
            <div class="card-header">
                <table class="header-table">
                    <tr>
                        <td>
                            <?php if (!empty($logo_path)): ?>
                                <img src="<?= $logo_path; ?>" class="logo">
                            <?php endif; ?>
                            <span class="title">SI NEO</span>
                        </td>
                        <td style="text-align: right;" class="muted">
                            Halaman Rekomendasi <?= $pageIndex + 1; ?>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="card-body">
                <!-- <div class="section-title section-title-center mb-4">
                    Rekomendasi Tindakan
                </div> -->

                <div class="action-grid">
                    <div class="action-list action-column">
                        <?php foreach ($pageItems as $item): ?>
                            <div class="action-row">
                                <div class="action-item">
                                    <strong><?= $item['number']; ?>.</strong>
                                    <?= html_escape($item['text']); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</body>

</html>
