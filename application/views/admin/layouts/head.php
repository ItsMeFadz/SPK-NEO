<?php $assets_admin = isset($assets_admin) ? $assets_admin : base_url('assets/admin/'); ?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>SPK NEO</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= $assets_admin ?>img/icons/brands/cancer.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />
    
    <!-- Icons -->
    <link rel="stylesheet" href="<?= $assets_admin ?>vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?= $assets_admin ?>vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="<?= $assets_admin ?>vendor/fonts/flag-icons.css" />
    
    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= $assets_admin ?>vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= $assets_admin ?>css/custom.css"/>
    <link rel="stylesheet" href="<?= $assets_admin ?>vendor/css/rtl/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= $assets_admin ?>css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= $assets_admin ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= $assets_admin ?>vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="<?= $assets_admin ?>vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="<?= $assets_admin ?>vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="<?= $assets_admin ?>vendor/libs/swiper/swiper.css" />
    <link rel="stylesheet" href="<?= $assets_admin ?>vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="<?= $assets_admin ?>vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet"
        href="<?= $assets_admin ?>vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet" href="<?= $assets_admin ?>vendor/libs/sweetalert2/sweetalert2.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="<?= $assets_admin ?>vendor/css/pages/cards-advance.css" />
    <link rel="stylesheet" href="<?= $assets_admin ?>vendor/css/pages/page-profile.css" />
    <!-- Helpers -->
    <script src="<?= $assets_admin ?>vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="<?= $assets_admin ?>vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= $assets_admin ?>js/config.js"></script>
</head>
