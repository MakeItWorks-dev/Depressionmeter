@extends('layouts.main')

@section('title', 'Index Page')

@section('content')


<section class="relative overflow-hidden md:py-36 py-24 bg-slate-50/50 dark:bg-slate-800/20 bg-[url('{{ asset('assets/images/bg1.png') }}')] bg-no-repeat bg-center bg-cover">
    <div class="container relative">
        <div class="grid md:grid-cols-2 grid-cols-1 items-center gap-[30px] relative">
            <div class="md:me-6">
                <h6 class="text-red-500 uppercase text-sm font-bold tracking-wider mb-3">DepressionMeter</h6>
                <h4 class="font-bold lg:leading-normal leading-normal text-[42px] lg:text-[54px] mb-5">Deteksi Dini Depresi Melalui Analisis Postingan Media Sosial</h4>                
                <div class="mt-6 flex items-center space-x-2">
                    
                </div>
            </div>

            <div class="relative">
                    <div class="w-full max-w-md p-8 rounded-lg">
                        <h2 class="text-2xl font-bold text-center mb-6">Register</h2>
                        @if ($errors->any())
                            <div class="bg-red-100 text-red-600 p-4 mb-4 rounded-lg">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-white">Nama</label>
                                <input type="text" name="name" id="name" required class="border border-gray-300 bg-white/30 rounded-lg px-6 py-2 lg:w-96 w-60  focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-white">Email</label>
                                <input type="email" name="email" id="email" required class="border border-gray-300 bg-white/30 rounded-lg px-6 py-2 lg:w-96 w-60  focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent">
                            </div>
                            <div class="mb-4">
                                <label for="password" class="block text-white">Password</label>
                                <input type="password" name="password" id="password" required class="border border-gray-300 bg-white/30 rounded-lg px-6 py-2 lg:w-96 w-60  focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent">
                            </div>
                            <div class="mb-4">
                                <label for="password_confirmation" class="block text-white">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" required class="border border-gray-300 bg-white/30 rounded-lg px-6 py-2 lg:w-96 w-60  focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent">
                            </div>
                            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Daftar</button>
                        </form>
                        <div class="text-center mt-4">
                            <p class="text-sm text-gray-600">Sudah punya akun? 
                                <a href="{{ route('home') }}" class="text-blue-500 hover:underline">Login di sini</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden after:content-[''] after:absolute after:size-16 after:bg-red-500/20 after:top-0 after:end-6 after:z-1 after:rounded-lg after:animate-[spin_10s_linear_infinite]"></div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection