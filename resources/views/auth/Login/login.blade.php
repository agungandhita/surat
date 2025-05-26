@extends('auth.layouts.main')

@section('container')
<div class="min-h-screen bg-gradient-to-br from-[#0C1B31] to-[#1A374D] font-[sans-serif] py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full mx-auto space-y-8">
        <!-- Header with Logo -->
        <div class="flex flex-col items-center">
            <img src="/img/pln.png" alt="PLN Logo" class="w-24 h-24 mb-4" />
            <h1 class="text-3xl font-bold text-white text-center">
                Sistem Manajemen Arsip PLN
            </h1>
            <p class="mt-2 text-sm text-gray-300 text-center">
                Silakan masuk untuk melanjutkan
            </p>
        </div>

        <!-- Login Form Card -->
        <div class="bg-white/10 backdrop-blur-lg rounded-2xl shadow-xl overflow-hidden border border-white/20">
            <div class="px-6 py-8 sm:px-8">
                <h2 class="mb-8 text-2xl font-bold text-center text-white">Login</h2>
                
                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <!-- Email Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-200 mb-2">Email</label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input name="email" type="email" required class="block w-full pl-10 pr-3 py-3 border border-white/10 rounded-lg bg-white/5 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#00A0E3] focus:border-transparent sm:text-sm" placeholder="Masukkan email Anda" />
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-200 mb-2">Password</label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input name="password" type="password" required class="block w-full pl-10 pr-3 py-3 border border-white/10 rounded-lg bg-white/5 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#00A0E3] focus:border-transparent sm:text-sm" placeholder="Masukkan password" />
                        </div>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-[#00A0E3] focus:ring-[#00A0E3] border-gray-300 rounded" />
                            <label for="remember-me" class="ml-2 block text-sm text-gray-300">
                                Ingat Saya
                            </label>
                        </div>
                        <div class="text-sm">
                            <a href="#" class="font-medium text-[#00A0E3] hover:text-[#0077B6]">
                                Lupa Password?
                            </a>
                        </div>
                    </div>

                    <!-- Login Button -->
                    <div>
                        <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent rounded-lg text-sm font-medium text-white bg-[#00A0E3] hover:bg-[#0077B6] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#00A0E3] transition-colors duration-200">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-[#0077B6] group-hover:text-[#00A0E3]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                            </span>
                            Masuk
                        </button>
                    </div>

                    <!-- Register Link -->
                    <p class="text-center text-sm text-gray-300">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="font-medium text-[#00A0E3] hover:text-[#0077B6]">
                            Daftar di sini
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
