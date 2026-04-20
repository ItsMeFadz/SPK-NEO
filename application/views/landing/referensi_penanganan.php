<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>Referensi Jurnal Penanganan | SI-NEO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] }
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
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #ec4899; border-radius: 10px; }
    </style>
</head>
<body class="bg-pink-50 text-gray-700 antialiased min-h-screen flex flex-col">

    <header class="fixed w-full z-50 top-0 glass-header shadow-sm">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <a href="<?= base_url('edukasi') ?>" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-pink-600 shadow-md hover:bg-pink-600 hover:text-white transition-all duration-300 group">
                    <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                </a>
                <div>
                    <h1 class="text-xl font-black text-gray-800">Referensi Penanganan</h1>
                    <p class="text-xs font-bold text-pink-500 uppercase tracking-widest">Pencegahan & Pengobatan</p>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow container mx-auto px-4 md:px-6 pt-28 pb-16 flex flex-col gap-10">
        
        <div class="w-full bg-white rounded-3xl shadow-xl border-4 border-white overflow-hidden relative flex flex-col" style="height: 70vh;">
            <div class="bg-gradient-to-r from-emerald-400 to-green-500 p-3 text-white font-bold flex justify-between items-center">
                <span><i class="fas fa-book-medical mr-2"></i> Jurnal Referensi 1</span>
                <a href="assets/landing/dokumen/jurnal1.pdf" download class="text-xs bg-white text-green-600 px-3 py-1.5 rounded-lg hover:scale-105 transition"><i class="fas fa-download"></i> Unduh</a>
            </div>
            <div class="flex-grow relative bg-gray-50">
                <iframe src="assets/landing/dokumen/jurnal1.pdf" class="absolute inset-0 w-full h-full z-10" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>

        <div class="w-full bg-white rounded-3xl shadow-xl border-4 border-white overflow-hidden relative flex flex-col" style="height: 70vh;">
            <div class="bg-gradient-to-r from-blue-400 to-indigo-500 p-3 text-white font-bold flex justify-between items-center">
                <span><i class="fas fa-book-medical mr-2"></i> Jurnal Referensi 2</span>
                <a href="assets/landing/dokumen/jurnal2.pdf" download class="text-xs bg-white text-blue-600 px-3 py-1.5 rounded-lg hover:scale-105 transition"><i class="fas fa-download"></i> Unduh</a>
            </div>
            <div class="flex-grow relative bg-gray-50">
                <iframe src="assets/landing/dokumen/jurnal2.pdf" class="absolute inset-0 w-full h-full z-10" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>

        <div class="w-full bg-white rounded-3xl shadow-xl border-4 border-white overflow-hidden relative flex flex-col" style="height: 70vh;">
            <div class="bg-gradient-to-r from-purple-400 to-pink-500 p-3 text-white font-bold flex justify-between items-center">
                <span><i class="fas fa-book-medical mr-2"></i> Jurnal Referensi 3</span>
                <a href="assets/landing/dokumen/jurnal3.pdf" download class="text-xs bg-white text-pink-600 px-3 py-1.5 rounded-lg hover:scale-105 transition"><i class="fas fa-download"></i> Unduh</a>
            </div>
            <div class="flex-grow relative bg-gray-50">
                <iframe src="assets/landing/dokumen/jurnal3.pdf" class="absolute inset-0 w-full h-full z-10" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>

    </main>

</body>
</html>