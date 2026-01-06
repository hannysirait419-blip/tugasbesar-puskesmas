<x-app-layout>
    <div class="puskesmas-bg min-h-screen">
        <div class="max-w-6xl mx-auto px-4 py-8">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-emerald-900">Dashboard Admin</h1>
                    <p class="text-sm text-emerald-800/70">Halo, {{ auth()->user()->name }} • role: ADMIN</p>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="puskesmas-btn bg-white text-emerald-900 border border-emerald-100 hover:bg-emerald-50">
                        Logout
                    </button>
                </form>
            </div>

            <div class="grid md:grid-cols-3 gap-4">
                <div class="p-6 puskesmas-card">
                    <div class="text-sm text-emerald-800/70">Total Pengguna</div>
                    <div class="text-3xl font-bold text-emerald-900 mt-1">{{ \App\Models\User::count() }}</div>
                    <div class="text-xs text-emerald-800/60 mt-2">Ringkasan cepat untuk admin.</div>
                </div>

                <div class="p-6 puskesmas-card">
                    <div class="text-sm text-emerald-800/70">Status Sistem</div>
                    <div class="mt-2 inline-flex items-center gap-2 px-3 py-2 rounded-2xl bg-emerald-50 border border-emerald-100">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-600"></span>
                        <span class="text-sm font-semibold text-emerald-900">Aktif</span>
                    </div>
                </div>

                <div class="p-6 puskesmas-card">
                    <div class="text-sm text-emerald-800/70">Akses</div>
                    <div class="mt-2 text-sm text-emerald-900 font-semibold">ADMIN</div>
                    <div class="text-xs text-emerald-800/60">Dilindungi middleware role.</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
