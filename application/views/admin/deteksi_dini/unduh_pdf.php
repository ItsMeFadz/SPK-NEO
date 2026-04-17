<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Diagnosis</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 0;
        }

        .card {
            background: #ffffff;
            border: 1px solid #dbe2ea;
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
            overflow: hidden;
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
        }

        .notice {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            border-radius: 12px;
            padding: 14px 16px;
            margin-bottom: 18px;
            line-height: 1.65;
        }

        .notice-title {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #1d4ed8;
        }

        .result-box {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 22px 18px;
            text-align: center;
            margin-bottom: 18px;
        }

        .status-icon {
            width: 90px;
            height: 90px;
            margin-bottom: 10px;
        }

        .heading-success { color: #28c76f; }
        .heading-warning { color: #d97706; }
        .heading-danger { color: #dc2626; }

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

        .badge-success { background: #28c76f; }
        .badge-warning { background: #E7E33C; }
        .badge-danger { background: #dc2626; }

        .section-title {
            font-size: 15px;
            font-weight: bold;
            color: #0f172a;
            margin: 20px 0 12px;
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
    ?>

    <div class="card">
        <div class="card-header">
            <table class="header-table">
                <tr>
                    <td>
                        <?php if (!empty($logo_path)): ?>
                            <img src="<?= $logo_path; ?>" class="logo">
                        <?php endif; ?>
                        <span class="title">HASIL DIAGNOSIS</span>
                    </td>
                    <td style="text-align: right;" class="muted">
                        Dicetak: <?= date('d F Y H:i'); ?>
                    </td>
                </tr>
            </table>
        </div>

        <div class="card-body">
            <div class="result-box">
                <?php if (!empty($status_icon_path)): ?>
                    <img src="<?= $status_icon_path; ?>" class="status-icon">
                <?php endif; ?>
                <div class="result-title <?= $headingClass; ?>"><?= strtoupper($head_name); ?></div>
                <div class="result-message"><?= $message; ?></div>
            </div>

            <div class="panel">
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

                <div class="section-title">
                    <span class="number-chip">01.</span>Biodata
                </div>

                <table class="biodata-table">
                    <tr>
                        <td style="width: 48%; padding-right: 10px; vertical-align: top;">
                            <div class="field-label">Nama Lengkap</div>
                            <div class="field-value"><?= html_escape($users->name); ?></div>
                        </td>
                        <td style="width: 48%; padding-left: 10px; vertical-align: top;">
                            <div class="field-label">Tanggal Lahir</div>
                            <div class="field-value"><?= html_escape($users->tgl_lahir); ?></div>
                        </td>
                    </tr>
                    <tr><td colspan="2" style="height: 12px;"></td></tr>
                    <tr>
                        <td style="width: 48%; padding-right: 10px; vertical-align: top;">
                            <div class="field-label">Usia (Tahun)</div>
                            <div class="field-value"><?= html_escape($users->usia); ?></div>
                        </td>
                        <td style="width: 48%; padding-left: 10px; vertical-align: top;">
                            <div class="field-label">Alamat Lengkap</div>
                            <div class="field-value"><?= nl2br(html_escape($users->alamat)); ?></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
