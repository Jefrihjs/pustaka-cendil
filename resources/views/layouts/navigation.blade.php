<header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8">

    <h2 class="text-lg font-semibold text-slate-800">
        @yield('title')
    </h2>

    <div class="flex items-center gap-4">

        <div class="text-sm text-slate-600">
            Halo, <span class="font-medium">{{ Auth::user()->name }}</span>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="text-sm text-red-500 hover:text-red-600 font-medium">
                Logout
            </button>
        </form>

    </div>

</header>