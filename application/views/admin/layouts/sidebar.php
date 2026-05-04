<?php $role = $this->session->userdata('role'); ?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="<?= base_url('dashboard') ?>" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="<?= $assets_admin ?>img/icons/brands/cancer.png" alt="">
            </span>
            <span class="app-brand-text demo menu-text fw-bold">SI NEO</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item <?= ($menu == 'dashboard') ? 'active' : '' ?>">
            <a href="<?= base_url('dashboard') ?>" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <?php if ($role == '2'): ?>
            <!-- Apps & Pages -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Pasien Menu</span>
            </li>
            <li class="menu-item <?= ($menu == 'deteksiDini') ? 'active' : '' ?>">
                <a href="<?= base_url('deteksiDini') ?>" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-stethoscope"></i>
                    <div data-i18n="Deteksi Dini">Deteksi Dini</div>
                </a>
            </li>
            <li class="menu-item <?= ($menu == 'riwayatDiagnosis') ? 'active' : '' ?>">
                <a href="<?= base_url('riwayatDiagnosis') ?>" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-list-check"></i>
                    <div data-i18n="Riwayat Deteksi Dini">Riwayat Deteksi Dini </div>
                </a>
            </li>
            <li class="menu-item <?= ($menu == 'edukasi') ? 'active' : '' ?>">
                <a href="<?= base_url('edukasi') ?>" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-heart-plus"></i>
                    <div data-i18n="Edukasi & Informasi">Edukasi & Informasi</div>
                </a>
            </li>
        <?php endif; ?>

        <?php if ($role == '1'): ?>
            <!-- Admin Menu -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Admin Menu</span>
            </li>
            <!-- Cards -->
            <li class="menu-item <?= ($menu == 'dataPasien') ? 'active' : '' ?>">
                <a href="<?= base_url('dataPasien') ?>" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-user-search"></i>
                    <div data-i18n="Data Pasien">Data Pasien</div>
                    <!-- <div class="badge bg-label-primary rounded-pill ms-auto"><?= $total_hari_ini ?? 0 ?></div> -->
                </a>
            </li>
            <!-- User interface -->
            <li class="menu-item <?= ($menu == 'gejala') ? 'active' : '' ?>">
                <a href="<?= base_url('gejala') ?>" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-list-details"></i>
                    <div data-i18n="Data Gejala">Data Gejala</div>
                </a>
            </li>

            <!-- Extended components -->
            <li class="menu-item <?= ($menu == 'risiko') ? 'active' : '' ?>">
                <a href="<?= base_url('risiko') ?>" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-heart-broken"></i>
                    <div data-i18n="Data Risiko">Data Risiko</div>
                </a>
            </li>

            <!-- Extended components -->
            <li class="menu-item <?= ($menu == 'solusi') ? 'active' : '' ?>">
                <a href="<?= base_url('solusi') ?>" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-bulb"></i>
                    <div data-i18n="Data Solusi">Data Solusi</div>
                </a>
            </li>

            <!-- Icons -->
            <li class="menu-item <?= ($menu == 'rule') ? 'active' : '' ?>">
                <a href="<?= base_url('rule') ?>" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-settings"></i>
                    <div data-i18n="Basis Rule">Basis Rule</div>
                </a>
            </li>

            <!-- Forms & Tables -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Pengaturan</span>
            </li>
            <!-- Forms -->
            <li class="menu-item <?= ($menu == 'user') ? 'active' : '' ?>">
                <a href="<?= base_url('user') ?>" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="Users">Users</div>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</aside>