{{-- Navbar Smart: Fokus SKM --}}
<header 
    x-data="{ scrolled: false, mobileMenuOpen: false, showModal: false }" 
    x-init="scrolled = window.pageYOffset > 20"
    @scroll.window="scrolled = window.pageYOffset > 20"
    :class="(scrolled || mobileMenuOpen || !{{ request()->is('/') ? 'true' : 'false' }}) 
            ? 'bg-slate-900/95 backdrop-blur-md shadow-2xl border-b border-white/10 py-3' 
            : 'bg-transparent border-transparent py-5'"
    class="fixed top-0 w-full z-[9999] transition-all duration-500 ease-in-out"
>
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-14">
            
            {{-- Logo --}}
            <a href="/" class="flex items-center gap-4 group">
                <div class="bg-white p-2 rounded-2xl shadow-lg transition-transform group-hover:scale-105">
                    <img src="{{ asset('images/logo-pustaka.png') }}" alt="Logo" class="w-10 h-10 object-cover">
                </div>
                <div class="text-white">
                    <span class="text-xl font-black uppercase leading-none block tracking-tighter">Pustaka Cendil</span>
                    <span class="text-[10px] text-blue-400 font-bold uppercase tracking-[0.2em]">Tige Kubok</span>
                </div>
            </a>

            {{-- Navigasi Desktop --}}
            <nav class="hidden lg:flex items-center gap-8 text-sm font-bold uppercase tracking-widest text-white">
                <a href="/" class="{{ request()->is('/') ? 'text-blue-400' : 'hover:text-blue-400' }} transition-colors">Beranda</a>
                <a href="/profil" class="{{ request()->is('profil*') ? 'text-blue-400' : 'hover:text-blue-400' }} transition-colors">Profil</a>
                <a href="/kegiatan" class="{{ request()->is('kegiatan*') ? 'text-blue-400' : 'hover:text-blue-400' }} transition-colors">Kegiatan</a>
                <a href="/galeri" class="{{ request()->is('galeri*') ? 'text-blue-400' : 'hover:text-blue-400' }} transition-colors">Galeri</a>
                <a href="/kontak" class="{{ request()->is('kontak*') ? 'text-blue-400' : 'hover:text-blue-400' }} transition-colors">Kontak</a>
                
                {{-- Tombol Survey SKM --}}
                <button @click="showModal = true" class="bg-emerald-600 hover:bg-emerald-500 text-white px-6 py-3 rounded-full shadow-lg shadow-emerald-900/20 transition-all active:scale-95 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    Survey SKM
                </button>
            </nav>

            {{-- Hamburger Mobile --}}
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden p-2 text-white bg-slate-800/50 rounded-xl outline-none">
                <svg x-show="!mobileMenuOpen" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                <svg x-show="mobileMenuOpen" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
    </div>

    {{-- MODAL POP-UP (Fokus SKM) --}}
    <div x-show="showModal" class="fixed inset-0 z-[10000] flex items-center justify-center px-6" x-cloak>
        <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" @click="showModal = false" class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm"></div>

        <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90 translate-y-4" x-transition:enter-end="opacity-100 scale-100 translate-y-0" class="relative bg-white rounded-[2.5rem] w-full max-w-lg p-10 shadow-2xl text-center">
            
            <div class="w-20 h-20 bg-emerald-100 text-emerald-600 rounded-3xl flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>

            <h3 class="text-2xl font-black text-slate-800 mb-2 tracking-tight uppercase">Survey SKM</h3>
            <p class="text-slate-500 text-sm font-medium leading-relaxed mb-8 italic">
                "Bantu kami meningkatkan kualitas pelayanan Pustaka Cendil melalui Survey Kepuasan Masyarakat."
            </p>

            {{-- Tombol Pilihan --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <a href="{{ route('skm.index') }}" class="py-4 bg-emerald-600 text-white rounded-2xl font-black uppercase tracking-widest text-[10px] shadow-xl shadow-emerald-200 hover:bg-emerald-500 transition-all active:scale-95 flex items-center justify-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg> Isi Survey SKM
                </a>
                <a href="{{ route('skm.hasil') }}" class="py-4 bg-slate-100 text-slate-600 rounded-2xl font-black uppercase tracking-widest text-[10px] hover:bg-slate-200 transition-all flex items-center justify-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg> Hasil SKM
                </a>
            </div>

            <button @click="showModal = false" class="mt-6 text-slate-400 text-[10px] font-bold uppercase tracking-widest hover:text-slate-600">Nanti Saja</button>
        </div>
    </div>

    {{-- Menu Mobile --}}
    <div x-show="mobileMenuOpen" class="lg:hidden bg-slate-900 border-t border-white/10 shadow-2xl overflow-hidden">
        <div class="px-6 py-8 space-y-6 text-white text-xs font-black uppercase tracking-[0.2em]">
            <a href="/" class="block">Beranda</a>
            <a href="/profil" class="block">Profil</a>
            <a href="/kegiatan" class="block">Kegiatan</a>
            <a href="/galeri" class="block">Galeri</a>
            <button @click="showModal = true; mobileMenuOpen = false" class="w-full bg-emerald-600 text-center py-4 rounded-2xl font-black">Survey SKM</button>
        </div>
    </div>
</header>