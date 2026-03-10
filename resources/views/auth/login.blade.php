<x-guest-layout>
    {{-- Container Utama dengan Latar Abu-abu Sangat Muda (Senada background kartu) --}}
    <div class="min-h-screen flex flex-col justify-center items-center bg-slate-50 px-10 py-12">
        
        {{-- 1. BAGIAN LOGO PUSTAKA CENDIL (Wajib Ada & Proporsional) --}}
        <div class="mb-12 flex flex-col items-center">
            {{-- Panggil Logo Asli dari Folder Public/images --}}
            <img src="{{ asset('images/logo-pustaka.png') }}" 
                 alt="Logo Pustaka Cendil" 
                 class="h-28 w-auto mb-4 filter drop-shadow-md">
            
            <h1 class="text-4xl font-black text-slate-800 tracking-tighter">
                Pustaka <span class="text-blue-600">Cendil</span>
            </h1>
            <p class="text-sm font-bold text-slate-400 uppercase tracking-widest mt-1">Sistem Informasi Admin</p>
        </div>

        {{-- 2. KOTAK FORM LOGIN (Gaya Kartu Modern & Bersih) --}}
        <div class="w-full max-w-5xl bg-white p-10 rounded-[2.5rem] shadow-2xl border border-slate-100 transform transition-all duration-300 hover:shadow-blue-900/10">
            
            <h2 class="text-center text-2xl font-extrabold text-slate-900 mb-10 tracking-tight">
                Selamat Datang, Admin!
            </h2>

            <x-auth-session-status class="mb-6 p-4 bg-emerald-50 text-emerald-700 rounded-xl text-sm border border-emerald-100" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <x-input-label for="email" :value="__('Email Resmi')" class="text-slate-600 font-bold text-sm" />
                    <div class="relative mt-1">
                        <x-text-input id="email" 
                                      class="block w-full p-4 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-inner bg-slate-50 text-slate-800 placeholder:text-slate-300 transition" 
                                      type="email" 
                                      name="email" 
                                      :value="old('email')" 
                                      required autofocus autocomplete="username" 
                                      placeholder="contoh: admin@cendil.desa.id" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs" />
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <x-input-label for="password" :value="__('Kata Sandi')" class="text-slate-600 font-bold text-sm" />
                        
                        @if (Route::has('password.request'))
                            <a class="text-xs text-blue-600 hover:text-blue-800 font-medium transition" href="{{ route('password.request') }}">
                                {{ __('Lupa kata sandi?') }}
                            </a>
                        @endif
                    </div>
                    
                    <div class="relative mt-1">
                        <x-text-input id="password" 
                                      class="block w-full p-4 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-inner bg-slate-50 text-slate-800 placeholder:text-slate-300 transition"
                                      type="password"
                                      name="password"
                                      required autocomplete="current-password" 
                                      placeholder="••••••••" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs" />
                </div>

                <div class="flex items-center justify-between mt-6">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-blue-600 shadow-sm focus:ring-blue-500 focus:ring-offset-2 transition" name="remember">
                        <span class="ms-2 text-sm text-slate-600 font-medium">{{ __('Ingat saya di perangkat ini') }}</span>
                    </label>
                </div>

                {{-- 3. TOMBOL LOG IN (Warna Biru Khas Pustaka Cendil) --}}
                <div class="flex items-center justify-center mt-10">
                    <x-primary-button class="w-full py-5 text-center justify-center bg-blue-600 hover:bg-blue-500 active:bg-blue-700 rounded-2xl text-lg font-black uppercase tracking-widest shadow-lg shadow-blue-900/20 transform transition-all hover:-translate-y-1 active:scale-95">
                        {{ __('Masuk ke Dashboard') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        {{-- Footer Kecil --}}
        <p class="mt-16 text-center text-xs text-slate-400 font-medium">
            &copy; {{ date('Y') }} Pustaka Cendil. Desa Cendil, Belitung Timur.
        </p>
    </div>
</x-guest-layout>