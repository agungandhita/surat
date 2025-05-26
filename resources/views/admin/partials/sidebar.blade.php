<div class="bg-white w-64 min-h-screen fixed left-0 top-[70px] border-r border-gray-100 z-40">
    <div class="flex flex-col h-full">
        <div class="flex-1 overflow-y-auto py-4">
            <div class="px-4 mb-6">
                <h2 class="text-xs font-medium text-gray-400 uppercase">MENU UTAMA</h2>
                <nav class="mt-4 space-y-1">
                    <a href="{{ route('admin') }}" class="flex items-center px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg group">
                        <svg class="w-5 h-5 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>
                </nav>
            </div>

            <div class="px-4 mb-6">
                <h2 class="text-xs font-medium text-gray-400 uppercase">INFORMASI</h2>
                <nav class="mt-4 space-y-1">
                    <a href="{{ route('admin.arsip.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg group">
                        <svg class="w-5 h-5 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Arsip
                    </a>
                </nav>
            </div>

            <div class="px-4">
                <h2 class="text-xs font-medium text-gray-400 uppercase">AKUN</h2>
                <nav class="mt-4 space-y-1">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="flex w-full items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg group">
                            <svg class="w-5 h-5 mr-3 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </nav>
            </div>
        </div>
    </div>
</div>
