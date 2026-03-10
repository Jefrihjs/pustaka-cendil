<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak QR Code Buku Tamu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700;800&display=swap" rel="stylesheet">
    <style>
        @media print {
            .no-print {
                display: none !important;
                visibility: hidden !important;
                height: 0 !important;
                margin: 0 !important;
                padding: 0 !important;
            }
            
            /* Pastikan poster mepet ke atas */
            body {
                margin: 0 !important;
                padding: 0 !important;
            }

            .print-area {
                box-shadow: none !important;
                border: none !important;
                margin: 0 auto !important;
            }
        </div>
    </style>
</head>
<body class="p-10">

    <div class="no-print fixed top-5 left-1/2 -translate-x-1/2 z-50">
        <button onclick="window.print()" class="bg-rose-600 text-white px-8 py-3 rounded-2xl font-bold shadow-2xl hover:bg-rose-700 transition-all flex items-center gap-2 transform hover:scale-105 active:scale-95">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
            Klik untuk Cetak Poster
        </button>
    </div>

    <div class="print-area max-w-2xl mx-auto bg-white border-[12px] border-rose-600 rounded-[3rem] p-12 text-center shadow-2xl relative overflow-hidden">
        
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-rose-50 rounded-full"></div>
        <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-rose-50 rounded-full"></div>

        <div class="relative">
            <h1 class="text-4xl font-black text-slate-800 uppercase tracking-tight mb-2">Selamat Datang</h1>
            <p class="text-xl text-slate-500 font-medium mb-8">DI PUSTAKA CENDIL TIGE KUBOK</p>

            <div class="bg-slate-50 p-8 rounded-[2.5rem] border-2 border-dashed border-slate-200 inline-block mb-8">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data={{ url('/hadir') }}" 
                     alt="QR Code Buku Tamu" 
                     class="w-64 h-64 mx-auto shadow-sm">
            </div>

            <div class="space-y-4">
                <h2 class="text-2xl font-extrabold text-rose-600 uppercase tracking-widest">Scan QR Code</h2>
                <p class="text-slate-600 font-medium max-w-md mx-auto leading-relaxed">
                    Silakan scan menggunakan kamera HP Anda untuk mengisi <b>Buku Tamu Digital</b> sebelum memasuki area perpustakaan.
                </p>
            </div>

            <div class="mt-12 pt-8 border-t border-slate-100 flex justify-center items-center gap-4">
                <div class="text-left">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Dikelola Oleh</p>
                    <p class="text-sm font-bold text-slate-700">Pustaka Cendil</p>
                </div>
                <div class="h-8 w-px bg-slate-200"></div>
                <div class="text-left">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Lokasi</p>
                    <p class="text-sm font-bold text-slate-700">Kec. Kelapa Kampit</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>