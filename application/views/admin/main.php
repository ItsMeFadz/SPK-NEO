<!-- Definisikan path untuk assets admin -->
<?php $assets_admin = base_url('assets/admin/'); ?>
<?php $this->load->vars(['assets_admin' => $assets_admin]); ?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="<?= $assets_admin ?>" data-template="vertical-menu-template">

<!-- HEAD -->
<?php $this->load->view('admin/layouts/head'); ?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php $this->load->view('admin/layouts/sidebar'); ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php $this->load->view('admin/layouts/nav'); ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <?php
                        // Tempat content halaman dinamis
                        if (isset($content)) {
                            $this->load->view($content);
                        }
                        ?>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <?php $this->load->view('admin/layouts/footer'); ?>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <?php $this->load->view('admin/layouts/javascript'); ?>
</body>

</html>
