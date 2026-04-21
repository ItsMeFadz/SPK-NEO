<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>SI-NEO | Deteksi Dini Neoplasma</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets/landing/css/core.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/custom.css') ?>">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="text-gray-700 antialiased selection:bg-pink-200 selection:text-pink-900">

    <!-- Toast Notifications Container -->
    <ul class="notifications"></ul>

    <div class="bg-blobs">
        <div class="blob w-96 h-96 top-0 -left-20 bg-purple-300 mix-blend-multiply animate-blob"></div>
        <div class="blob w-96 h-96 top-0 -right-20 bg-pink-300 mix-blend-multiply animate-blob animation-delay-2000">
        </div>
        <div
            class="blob w-80 h-80 -bottom-20 left-20 bg-yellow-200 mix-blend-multiply animate-blob animation-delay-4000">
        </div>
    </div>

    <header id="main-header"
        class="fixed w-full z-50 transition-all duration-500 top-0 bg-white/90 backdrop-blur-lg border-b border-pink-50">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center relative">
            <a href="#" class="group flex items-center space-x-3 focus:outline-none z-[60]">
                <div
                    class="relative w-11 h-11 bg-gradient-to-br from-pink-500 to-purple-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-ribbon text-xl"></i>
                    <span
                        class="absolute inline-flex h-full w-full rounded-xl bg-pink-400 opacity-30 animate-ping"></span>
                </div>
                <div class="flex flex-col">
                    <span
                        class="text-xl font-black tracking-tighter bg-clip-text text-transparent bg-gradient-to-r from-pink-600 to-purple-700 leading-none">SI-NEO</span>
                    <span class="text-[10px] font-bold text-pink-400 tracking-[0.2em] uppercase mt-1">Sistem
                        Edukasi</span>
                </div>
            </a>

            <button id="menu-btn" type="button" aria-controls="side-nav" aria-expanded="false" aria-label="Buka menu"
                class="p-2 rounded-xl text-pink-600 hover:bg-pink-50 focus:outline-none transition-all duration-300 z-[60] border border-pink-100 shadow-sm bg-white">
                <i class="fas fa-bars-staggered text-2xl transition-transform duration-300" id="menu-icon"></i>
            </button>

            <div id="side-nav"
                class="fixed inset-0 w-full h-screen bg-white/80 backdrop-blur-2xl z-50 flex flex-col items-center justify-center">
                <div class="absolute top-20 left-10 w-64 h-64 bg-pink-200/30 blur-3xl rounded-full -z-10 animate-blob">
                </div>
                <div
                    class="absolute bottom-20 right-10 w-64 h-64 bg-purple-200/30 blur-3xl rounded-full -z-10 animate-blob animation-delay-2000">
                </div>

                <div class="flex flex-col items-center space-y-8 w-full max-w-md px-10">
                    <p class="text-[12px] font-black text-pink-400 uppercase tracking-[0.5em] mb-4">Navigasi Menu</p>

                    <nav class="flex flex-col space-y-6 text-center">
                        <a href="#pengertian"
                            class="nav-link text-4xl font-black text-gray-800 hover:text-pink-600 transition-all hover:scale-110 flex flex-col items-center">
                            <span class="text-pink-200 text-sm mb-1">01.</span> Pengertian
                        </a>
                        <a href="#risiko"
                            class="nav-link text-4xl font-black text-gray-800 hover:text-pink-600 transition-all hover:scale-110 flex flex-col items-center">
                            <span class="text-pink-200 text-sm mb-1">02.</span> Risiko
                        </a>
                        <a href="#gejala"
                            class="nav-link text-4xl font-black text-gray-800 hover:text-pink-600 transition-all hover:scale-110 flex flex-col items-center">
                            <span class="text-pink-200 text-sm mb-1">03.</span> Gejala
                        </a>
                    </nav>

                    <div class="w-full pt-10 border-t border-pink-100 flex flex-col gap-4">
                        <a href="#auth-container"
                            class="nav-link block text-center py-4 text-gray-700 font-extrabold hover:bg-pink-50 transition-all tracking-widest border-2 border-pink-100 rounded-2xl">
                            MASUK
                        </a>
                        <a href="#auth-container"
                            class="nav-link block text-center py-4 bg-gradient-to-r from-pink-600 to-purple-600 text-white font-black rounded-2xl shadow-xl transition-transform active:scale-95 uppercase tracking-wider">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-6 pt-10 pb-20 max-w-7xl relative z-10">

        <section class="relative pt-32 pb-16 overflow-hidden w-full">

            <div class="container mx-auto px-6 flex flex-col lg:flex-row items-center gap-12">
                <div class="w-full lg:w-3/5 space-y-8 text-center lg:text-left">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 bg-white border-2 border-pink-100 rounded-full shadow-sm transform hover:scale-105 transition-transform cursor-default">
                        <span class="relative flex h-3 w-3">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-pink-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-600"></span>
                        </span>
                        <span class="text-xs font-black text-pink-700 uppercase tracking-widest">Selamat Datang di
                            SI-NEO</span>
                    </div>

                    <h1 class="text-5xl md:text-7xl font-black text-gray-900 leading-[1.1]">
                        Kepedulian Anda Adalah <br>
                        <span class="text-pink-600">Harapan Terbaik.</span>
                    </h1>

                    <p class="text-xl text-gray-600 font-medium max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                        Platform edukasi digital yang menyajikan informasi untuk meningkatkan kesadaran deteksi dini,
                        analisis faktor risiko, dan upaya preventif terhadap neoplasma payudara.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-4">
                        <a href="#pengertian"
                            class="group px-10 py-4 bg-pink-600 text-white font-black rounded-2xl shadow-[0_6px_0_0_#be185d] hover:shadow-[0_2px_0_0_#be185d] hover:translate-y-[4px] transition-all flex items-center gap-3">
                            Mulai Eksplorasi
                            <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <div class="w-full lg:w-2/5 relative lg:-mr-10">
                    <div class="absolute -bottom-6 -left-6 w-full h-full bg-purple-600 rounded-[3rem] -rotate-3 -z-10">
                    </div>

                    <div
                        class="relative bg-white/80 backdrop-blur-lg p-4 rounded-[3rem] shadow-xl border border-gray-200 group overflow-hidden">
                        <img src="assets/landing/images/hero.jpg" alt="Ilustrasi Edukasi Payudara"
                            class="w-full h-auto rounded-[2.5rem] transition-transform duration-700 group-hover:scale-110">
                    </div>
                </div>
            </div>
        </section>

        <section
            class="mb-24 relative overflow-hidden rounded-[2.5rem] bg-white border border-gray-100 shadow-2xl shadow-pink-100/50"
            id="pengertian">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-pink-50 rounded-full opacity-60"></div>
            <div class="absolute -bottom-10 left-10 w-32 h-32 bg-purple-50 rounded-full opacity-60"></div>

            <div class="flex flex-col lg:flex-row items-center gap-16 p-8 md:p-16 relative z-10">
                <div class="w-full lg:w-1/2 relative group">
                    <div
                        class="absolute -inset-4 border-2 border-pink-200 rounded-[2rem] transform -rotate-3 group-hover:rotate-0 transition-transform duration-500">
                    </div>

                    <div class="relative rounded-[2rem] overflow-hidden shadow-2xl bg-gray-100">
                        <img alt="Ilustrasi Neoplasma"
                            class="w-full h-[450px] object-cover transform transition duration-700 group-hover:scale-110"
                            src="assets/landing/images/neo.jpg"
                            onerror="this.src='https://img.freepik.com/free-vector/mammography-concept-illustration_114360-3180.jpg'" />

                        <div
                            class="absolute bottom-0 inset-x-0 bg-pink-600/90 backdrop-blur-sm p-6 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                            <p class="text-white text-sm font-bold flex items-center">
                                <i class="fas fa-info-circle mr-2"></i> Visualisasi Deteksi Dini Neoplasma
                            </p>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/2 space-y-8 text-left">
                    <div class="inline-block px-4 py-1.5 bg-pink-100 rounded-full">
                        <span class="text-pink-700 text-xs font-black uppercase tracking-[0.2em]">Edukasi Dasar</span>
                    </div>

                    <h2 class="text-4xl md:text-6xl font-black text-gray-900 leading-[1.1]">
                        Mengenal <br>
                        <span class="text-pink-600">Tumor Payudara</span>
                    </h2>

                    <p class="text-xl text-gray-600 leading-relaxed font-medium">
                        Tumor payudara atau <span class="text-purple-700 font-bold italic">Neoplasma</span> adalah
                        pertumbuhan sel abnormal yang membentuk benjolan. Jangan panik, namun tetap waspada: deteksi
                        dini adalah <span class="underline decoration-pink-500 decoration-4">langkah penyelamatan
                            pertama</span> Anda.
                    </p>

                </div>
            </div>
            <div class="col-span-full mt-12 flex justify-center">
                <a href="<?= base_url('referensi') ?>">
                    <button
                        class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-2xl group bg-gradient-to-br from-pink-500 to-purple-500 group-hover:from-pink-500 group-hover:to-purple-500 hover:text-white focus:outline-none">
                        <span
                            class="relative px-8 py-4 transition-all ease-in duration-75 bg-white rounded-2xl group-hover:bg-opacity-0 font-bold flex items-center gap-2">
                            <i class="fas fa-file-pdf"></i>
                            Lihat Referensi Jurnal Medis
                        </span>
                    </button>
                </a>
            </div>

        </section>

        <section class="mb-24" id="risiko">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-extrabold text-gray-800">Kenali <span class="gradient-text">Faktor
                        Risiko</span></h2>
                <p class="text-gray-500 mt-2">Pahami pemicunya untuk kewaspadaan lebih dini.</p>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $risks = [
                    ['icon' => 'fa-users', 'color' => 'bg-blue-600', 'title' => 'Genetik', 'desc' => 'Riwayat kesehatan keluarga inti.'],
                    ['icon' => 'fa-venus', 'color' => 'bg-pink-600', 'title' => 'Menstruasi', 'desc' => 'Siklus menstruasi dini (< 12 thn).'],
                    ['icon' => 'fa-baby', 'color' => 'bg-purple-600', 'title' => 'Reproduksi', 'desc' => 'Kaitan kehamilan & masa menyusui.'],
                    ['icon' => 'fa-burger', 'color' => 'bg-orange-500', 'title' => 'Pola Makan', 'desc' => 'Konsumsi lemak & junk food berlebih.'],
                    ['icon' => 'fa-wine-glass', 'color' => 'bg-red-600', 'title' => 'Toksin', 'desc' => 'Paparan alkohol & asap rokok aktif.'],
                    ['icon' => 'fa-hourglass-half', 'color' => 'bg-indigo-600', 'title' => 'Usia', 'desc' => 'Risiko meningkat pasca menopause.'],
                ];
                foreach ($risks as $risk): ?>
                    <div
                        class="group relative bg-white p-8 rounded-[2rem] border-2 border-transparent hover:border-pink-100 hover:shadow-2xl transition-all duration-300 text-left">
                        <div
                            class="w-14 h-14 <?php echo $risk['color']; ?> text-white rounded-2xl flex items-center justify-center shadow-lg transform -rotate-6 group-hover:rotate-0 transition-transform mb-6">
                            <i class="fas <?php echo $risk['icon']; ?> text-2xl"></i>
                        </div>

                        <h3 class="text-xl font-black text-gray-800 mb-2"><?php echo $risk['title']; ?></h3>
                        <p class="text-gray-500 font-medium leading-relaxed"><?php echo $risk['desc']; ?></p>

                        <div class="absolute bottom-6 right-8 opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="fas fa-plus-circle text-pink-500 text-xl"></i>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="col-span-full mt-12 flex justify-center">
                    <a href="<?= base_url('referensi') ?>">
                        <button
                            class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-2xl group bg-gradient-to-br from-pink-500 to-purple-500 group-hover:from-pink-500 group-hover:to-purple-500 hover:text-white focus:outline-none">
                            <span
                                class="relative px-8 py-4 transition-all ease-in duration-75 bg-white rounded-2xl group-hover:bg-opacity-0 font-bold flex items-center gap-2">
                                <i class="fas fa-file-pdf"></i>
                                Lihat Referensi Jurnal Faktor Risiko
                            </span>
                        </button>
                    </a>
                </div>

            </div>
        </section>

        <section class="mb-24" id="gejala">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-extrabold text-gray-800">Kenali <span class="gradient-text">Gejala Awal</span>
                </h2>
                <p class="text-gray-500 mt-2">Jangan abaikan perubahan sekecil apapun pada tubuh Anda.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-4">
                <?php
                $symptoms = [
                    ['title' => 'Benjolan', 'desc' => 'Massa tidak biasa di payudara/ketiak.', 'img' => 'assets/landing/images/benjolan.jpg'],
                    ['title' => 'Perubahan Kulit', 'desc' => 'Kemerahan, berkerut, seperti kulit jeruk.', 'img' => 'assets/landing/images/perubahan_kulit.jpg'],
                    ['title' => 'Cairan Puting', 'desc' => 'Keluar cairan (darah/nanah).', 'img' => 'assets/landing/images/cairan_puting.jpg'],
                    ['title' => 'Nyeri Menetap', 'desc' => 'Rasa sakit yang tidak hilang.', 'img' => 'assets/landing/images/nyeri_menetap.jpg'],
                    ['title' => 'Puting Tertarik', 'desc' => 'Puting masuk ke dalam (retraksi).', 'img' => 'assets/landing/images/puting_tertarik.jpg'],
                    ['title' => 'Pembengkakan', 'desc' => 'Payudara membesar sebelah tidak wajar.', 'img' => 'assets/landing/images/pembengkakan.jpg'],

                ];
                foreach ($symptoms as $sym): ?>
                    <div
                        class="bg-white rounded-3xl p-6 shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-2 text-center border border-gray-100 relative overflow-hidden group">
                        <div
                            class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-pink-400 to-purple-500 transform scale-x-0 group-hover:scale-x-100 transition duration-500 origin-left">
                        </div>
                        <div
                            class="relative w-24 h-24 mx-auto mb-4 rounded-full p-1 bg-gradient-to-br from-pink-300 to-purple-300">
                            <img alt="<?php echo $sym['title']; ?>"
                                class="w-full h-full object-cover rounded-full border-4 border-white"
                                src="<?php echo $sym['img']; ?>" loading="lazy" />
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-800 group-hover:text-pink-600 transition">
                            <?php echo $sym['title']; ?>
                        </h3>
                        <p class="text-sm text-gray-500"><?php echo $sym['desc']; ?></p>
                    </div>
                <?php endforeach; ?>
                <div class="col-span-full mt-12 flex justify-center">
                    <a href="<?= base_url('referensi') ?>"
                        class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-2xl group bg-gradient-to-br from-pink-500 to-purple-500 group-hover:from-pink-500 group-hover:to-purple-500 hover:text-white focus:outline-none">
                        <span
                            class="relative px-8 py-4 transition-all ease-in duration-75 bg-white rounded-2xl group-hover:bg-opacity-0 font-bold flex items-center gap-2">
                            <i class="fas fa-file-pdf"></i>
                            Lihat Referensi Jurnal Gejala
                        </span>
                    </a>
                </div>
            </div>
        </section>

        <section class="flex items-center justify-center w-full min-h-[500px]" id="auth-container">
            <div class="max-w-md w-full glass-card rounded-3xl p-8 relative z-20 overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-pink-500 to-purple-600"></div>

                <div class="text-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-800">Selamat Datang</h3>
                    <p class="text-gray-500 text-sm">Silakan masuk atau daftar akun baru</p>
                </div>

                <div class="flex mb-6 bg-gray-100 p-1 rounded-xl relative">
                    <div id="tab-indicator"
                        class="absolute w-1/2 h-[calc(100%-8px)] bg-white rounded-lg shadow-sm top-1 left-1 transition-all duration-300">
                    </div>
                    <button id="tab-login" type="button"
                        class="flex-1 py-2 text-sm font-bold z-10 transition-colors duration-300 text-pink-600">LOGIN</button>
                    <button id="tab-register" type="button"
                        class="flex-1 py-2 text-sm font-bold z-10 transition-colors duration-300 text-gray-500">DAFTAR</button>
                </div>

                <section>
                    <form id="login-form" method="post" action="<?= base_url('auth/process') ?>" class="space-y-5">
                        <div>
                            <label class="block font-bold mb-1 text-xs uppercase text-gray-500 tracking-wider">Nama
                                Pengguna</label>
                            <div class="relative">
                                <i class="fas fa-user absolute left-3 top-3.5 text-gray-400"></i>
                                <input type="text" name="username" placeholder="Nama Pengguna"
                                    class="w-full pl-10 pr-4 py-3 rounded-xl input-modern text-sm font-semibold"
                                    required>
                            </div>
                        </div>
                        <div>
                            <label class="block font-bold mb-1 text-xs uppercase text-gray-500 tracking-wider">Kata
                                Sandi</label>
                            <div class="relative">
                                <i class="fas fa-lock absolute left-3 top-3.5 text-gray-400"></i>
                                <input type="password" name="password" placeholder="••••••••"
                                    class="w-full pl-10 pr-4 py-3 rounded-xl input-modern text-sm font-semibold"
                                    required>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full bg-gradient-to-r from-pink-500 to-purple-600 text-white font-bold py-3.5 rounded-xl hover:shadow-lg hover:shadow-pink-500/40 transition transform hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-pink-300 mt-2">
                            MASUK SEKARANG
                        </button>
                    </form>
                </section>

                <section id="register-form" class="hidden">
                    <form action="<?= base_url('auth/register') ?>" method="POST" class="space-y-4">

                        <div>
                            <label class="block font-bold mb-1 text-xs uppercase text-gray-500 tracking-wider">Nama
                                Pengguna (Pasien)</label>
                            <div class="relative">
                                <i class="fas fa-user-plus absolute left-3 top-3.5 text-gray-400"></i>
                                <input type="text" name="name" placeholder="BUAT NAMA PENGGUNA"
                                    class="w-full pl-10 pr-4 py-3 rounded-xl input-modern text-sm font-semibold"
                                    required>
                            </div>
                        </div>

                        <div>
                            <label class="block font-bold mb-1 text-xs uppercase text-gray-500 tracking-wider">Tanggal
                                Lahir</label>
                            <div class="relative">
                                <i class="fas fa-calendar-day absolute left-3 top-3.5 text-gray-400"></i>
                                <input type="date" name="tgl_lahir" id="tgl_lahir"
                                    class="w-full pl-10 pr-4 py-3 rounded-xl input-modern text-sm font-semibold text-gray-600 focus:text-gray-900"
                                    required>
                            </div>
                        </div>

                        <div>
                            <label
                                class="block font-bold mb-1 text-xs uppercase text-gray-500 tracking-wider">Usia</label>
                            <div class="relative">
                                <i class="fas fa-user-clock absolute left-3 top-3.5 text-gray-400"></i>
                                <input type="number" name="usia" id="usia" placeholder="Terisi Otomatis" readonly
                                    class="w-full pl-10 pr-4 py-3 rounded-xl input-modern text-sm font-semibold bg-gray-100 text-gray-500 cursor-not-allowed"
                                    required>
                            </div>
                        </div>

                        <div>
                            <label class="block font-bold mb-1 text-xs uppercase text-gray-500 tracking-wider">Alamat
                                Lengkap</label>
                            <div class="relative">
                                <i class="fas fa-map-marker-alt absolute left-3 top-3.5 text-gray-400"></i>
                                <textarea name="alamat" placeholder="Masukkan alamat lengkap tempat tinggal Anda"
                                    rows="2"
                                    class="w-full pl-10 pr-4 py-3 rounded-xl input-modern text-sm font-semibold resize-none"
                                    required></textarea>
                            </div>
                        </div>

                        <div>
                            <label class="block font-bold mb-1 text-xs uppercase text-gray-500 tracking-wider">Kata
                                Sandi</label>
                            <div class="relative">
                                <i class="fas fa-key absolute left-3 top-3.5 text-gray-400"></i>
                                <input type="password" name="password" placeholder="Min. 8 Karakter"
                                    class="w-full pl-10 pr-4 py-3 rounded-xl input-modern text-sm font-semibold"
                                    required minlength="8">
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full bg-gradient-to-r from-gray-800 to-gray-900 text-white font-bold py-3.5 rounded-xl hover:shadow-lg hover:shadow-gray-500/40 transition transform hover:-translate-y-0.5 focus:outline-none mt-2">
                            DAFTAR AKUN BARU
                        </button>
                    </form>
                </section>
            </div>
        </section>
    </main>

    <footer class="text-center py-6 text-gray-400 text-sm glass relative z-10">
        &copy; <?php echo date('Y'); ?> SI-NEO System. All rights reserved.
    </footer>

    <script src="<?= base_url('assets/landing/js/main.js') ?>"></script>
    <script src="<?= base_url('assets/admin/js/toasts-custom.js') ?>"></script>
    <script>
        <?php if ($this->session->flashdata('error')): ?>
            window.toastDetails.error.text = '<?= addslashes($this->session->flashdata('error')) ?>';
            createToast('error');
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')): ?>
            window.toastDetails.success.text = '<?= addslashes($this->session->flashdata('success')) ?>';
            createToast('success');
        <?php endif; ?>
    </script>

</body>

</html>