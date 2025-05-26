@extends('admin.layouts.main')

@section('container')
<div class="min-h-screen bg-gray-50 pb-10">
    <!-- Dashboard Header -->
    <div class="bg-white border-b p-4 sm:p-6 mb-6">
        <div class="flex items-center gap-4">
            <div class="bg-blue-100 p-3 rounded-xl">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Dashboard Admin</h1>
                <p class="text-sm text-gray-500">Sistem Manajemen Arsip PLN</p>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
        <!-- Total Arsip Card -->
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-red-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium text-red-600 bg-red-50 px-2.5 py-1 rounded-full">Arsip</span>
                </div>
                <h2 class="text-xl font-bold text-gray-800 mb-2">Total Arsip</h2>
                <div class="flex items-end gap-2">
                    <h1 class="text-4xl font-extrabold text-gray-900">{{ $totalArsip }}</h1>
                </div>
            </div>
            <div class="px-6 pb-6">
                <div class="flex items-center justify-between text-sm text-gray-600 mb-2">
                    <span>Progress</span>
                    <span class="font-medium">85%</span>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-2">
                    <div class="bg-red-500 h-2 rounded-full" style="width: 85%"></div>
                </div>
            </div>
        </div>

        <!-- Surat Masuk Card -->
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-blue-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2.5 py-1 rounded-full">Masuk</span>
                </div>
                <h2 class="text-xl font-bold text-gray-800 mb-2">Surat Masuk</h2>
                <div class="flex items-end gap-2">
                    <h1 class="text-4xl font-extrabold text-gray-900">{{ $suratMasuk }}</h1>
                </div>
            </div>
            @if($recentArsips->where('jenis_surat', 'masuk')->count() > 0)
            <div class="px-6 pb-6">
                <div class="mt-4 space-y-3">
                    @foreach($recentArsips->where('jenis_surat', 'masuk')->take(1) as $arsip)
                    <div class="flex items-start gap-3 p-3 bg-blue-50 rounded-lg">
                        <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">{{ $arsip->perihal }}</p>
                            <p class="text-xs text-gray-500">{{ $arsip->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- Surat Keluar Card -->
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-green-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium text-green-600 bg-green-50 px-2.5 py-1 rounded-full">Keluar</span>
                </div>
                <h2 class="text-xl font-bold text-gray-800 mb-2">Surat Keluar</h2>
                <div class="flex items-end gap-2">
                    <h1 class="text-4xl font-extrabold text-gray-900">{{ $suratKeluar }}</h1>
                </div>
            </div>
            @if($recentArsips->where('jenis_surat', 'keluar')->count() > 0)
            <div class="px-6 pb-6">
                <div class="mt-4 space-y-3">
                    @foreach($recentArsips->where('jenis_surat', 'keluar')->take(1) as $arsip)
                    <div class="flex items-start gap-3 p-3 bg-green-50 rounded-lg">
                        <svg class="w-5 h-5 text-green-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">{{ $arsip->perihal }}</p>
                            <p class="text-xs text-gray-500">{{ $arsip->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Activity & Statistics Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 px-6">
        <!-- Recent Activity -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div class="bg-red-100 p-2 rounded-lg">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h2 class="text-lg font-bold text-gray-800">Aktivitas Terbaru</h2>
                    </div>
                    <a href="#" class="text-red-600 hover:text-red-700 text-sm font-medium">Lihat Semua</a>
                </div>

                <div class="space-y-4">
                    @forelse($recentArsips as $arsip)
                    <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl hover:bg-white transition-colors">
                        <div class="bg-{{ $arsip->jenis_surat == 'masuk' ? 'blue' : 'green' }}-100 p-2.5 rounded-lg flex-shrink-0">
                            <svg class="w-5 h-5 text-{{ $arsip->jenis_surat == 'masuk' ? 'blue' : 'green' }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-start">
                                <h3 class="font-semibold text-gray-800 truncate">{{ $arsip->perihal }}</h3>
                                <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full ml-2 flex-shrink-0">
                                    {{ $arsip->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-600 mt-1">{{ $arsip->asal_surat }}</p>
                            <span class="inline-flex items-center mt-2 px-2.5 py-0.5 rounded-full text-xs font-medium {{ $arsip->jenis_surat == 'masuk' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                Surat {{ ucfirst($arsip->jenis_surat) }}
                            </span>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada aktivitas</h3>
                        <p class="mt-1 text-sm text-gray-500">Aktivitas terbaru akan muncul di sini.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div class="bg-blue-100 p-2 rounded-lg">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h2 class="text-lg font-bold text-gray-800">Statistik Surat</h2>
                    </div>
                    <select class="text-sm border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        <option>Bulan Ini</option>
                        <option>3 Bulan Terakhir</option>
                        <option>Tahun Ini</option>
                    </select>
                </div>

                <div class="space-y-4">
                    <!-- Surat Masuk Stats -->
                    <div class="bg-gray-50 p-4 rounded-xl">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-medium text-gray-800">Surat Masuk</h3>
                            <span class="text-xs font-semibold bg-blue-100 text-blue-800 px-2.5 py-0.5 rounded-full">
                                {{ number_format(($suratMasuk / ($totalArsip ?: 1)) * 100, 1) }}%
                            </span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: {{ ($suratMasuk / ($totalArsip ?: 1)) * 100 }}%"></div>
                        </div>
                    </div>

                    <!-- Surat Keluar Stats -->
                    <div class="bg-gray-50 p-4 rounded-xl">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-medium text-gray-800">Surat Keluar</h3>
                            <span class="text-xs font-semibold bg-green-100 text-green-800 px-2.5 py-0.5 rounded-full">
                                {{ number_format(($suratKeluar / ($totalArsip ?: 1)) * 100, 1) }}%
                            </span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-600 h-2 rounded-full" style="width: {{ ($suratKeluar / ($totalArsip ?: 1)) * 100 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
