<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>Referensi Jurnal | SI-NEO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        .glass-header {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(236, 72, 153, 0.1);
        }
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #ec4899; border-radius: 10px; }
    </style>
</head>
<body class="bg-pink-50 text-gray-700 antialiased min-h-screen flex flex-col">

    <header class="fixed w-full z-50 top-0 glass-header shadow-sm">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <a href="<?= base_url() ?>" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-pink-600 shadow-md hover:bg-pink-600 hover:text-white transition-all duration-300 group">
                    <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                </a>
                <div>
                    <h1 class="text-xl font-black text-gray-800">Referensi Jurnal Medis</h1>
                    <p class="text-xs font-bold text-pink-500 uppercase tracking-widest">SI-NEO Edukasi</p>
                </div>
            </div>
            
            <a href="assets/landing/dokumen/jurnal_neoplasma_2024.pdf" download class="hidden sm:flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-pink-500 to-purple-600 text-white text-sm font-bold rounded-xl shadow-lg hover:shadow-pink-500/30 transition-all active:scale-95">
                <i class="fas fa-download"></i> Unduh PDF
            </a>
        </div>
    </header>

    <main class="flex-grow container mx-auto px-4 md:px-6 pt-28 pb-10 flex flex-col">
        
        <div class="sm:hidden mb-4 p-4 bg-white rounded-2xl shadow-sm border border-pink-100 text-center">
            <p class="text-sm font-medium text-gray-600 mb-3">Jika dokumen tidak tampil dengan baik di layar HP Anda, silakan unduh file untuk membacanya.</p>
            <a href="assets/landing/dokumen/jurnal_neoplasma_2024.pdf" download class="inline-flex items-center gap-2 px-6 py-2 bg-pink-600 text-white text-sm font-bold rounded-xl shadow-md">
                <i class="fas fa-download"></i> Unduh Jurnal
            </a>
        </div>

        <div class="w-full flex-grow bg-white rounded-3xl shadow-2xl border-4 border-white overflow-hidden relative" style="min-height: 75vh;">
            
            <div class="absolute inset-0 flex flex-col items-center justify-center bg-gray-50 z-0">
                <i class="fas fa-circle-notch fa-spin text-4xl text-pink-400 mb-3"></i>
                <p class="text-sm font-bold text-gray-500 animate-pulse">Memuat dokumen...</p>
            </div>

            <iframe 
                src="assets/landing/dokumen/jurnal_neoplasma_2024.pdf" 
                class="absolute inset-0 w-full h-full z-10 bg-white" 
                frameborder="0"
                allowfullscreen>
            </iframe>
        </div>
        
    </main>

</body>
</html>