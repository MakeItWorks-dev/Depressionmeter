@extends('layouts.main')

@section('title', 'Profile Page')

@section('content')

@include('includes.navbar')  

<section class="relative overflow-hidden md:py-36 py-24 bg-slate-50/50 dark:bg-slate-800/20 bg-[url('{{ asset('assets/images/bg1.png') }}')] bg-no-repeat bg-center bg-cover">    <div class="p-6">

    <div class="p-6">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 md:col-span-3 ">

                <div class="p-4 rounded-lg bg-gray-700/50">
                    <h2 class="text-4xl font-extrabold text-white mb-4">Profile</h2>
                    <div class="mt-2">
                        <p class="text-white">Nama : </p>
                        <p class="text-lg text-white font-semibold">{{ Auth::user()->name }}</p>
                    </div>
                    <div class="mt-2">
                        <p class="text-white">Email : </p>
                        <p class="text-lg text-white font-semibold">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <div class="max-w-lg mx-auto mt-10 bg-gray-700/50 p-6 rounded-lg shadow-md">
                    <h2 class="text-3xl font-extrabold text-white mb-4">Change Password</h2>
                
                    @if(session('success'))
                        <div class="bg-green-500/30 text-white p-2 rounded-lg mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                
                    @if(session('error'))
                        <div class="bg-red-500/30 text-white p-2 rounded-lg mb-4">
                            {{ session('error') }}
                        </div>
                    @endif
                
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                
                        <div class="mb-4">
                            <label class="block text-white text-sm font-semibold mb-2">Current Password</label>
                            <input type="password" name="current_password" class="w-full p-2 rounded-xl bg-gray-800 text-white border border-gray-600 focus:ring-2 focus:ring-blue-500" required>
                            @error('current_password')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="mb-4">
                            <label class="block text-white text-sm font-semibold mb-2">New Password</label>
                            <input type="password" name="new_password" class="w-full p-2 rounded-xl bg-gray-800 text-white border border-gray-600 focus:ring-2 focus:ring-blue-500" required>
                            @error('new_password')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="mb-4">
                            <label class="block text-white text-sm font-semibold mb-2">Confirm New Password</label>
                            <input type="password" name="new_password_confirmation" class="w-full p-2 rounded-xl bg-gray-800 text-white border border-gray-600 focus:ring-2 focus:ring-blue-500" required>
                            @error('new_password_confirmation')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <button type="submit" class="w-full bg-blue-600/20 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl">
                            Update Password
                        </button>
                    </form>
                </div>
               
            </div>
    
            <div class="col-span-12 md:col-span-9">
                <div class="p-6 rounded-lg bg-gray-700/50">
                    <h2 class="text-4xl font-extrabold text-white mb-4">Riwayat Analisa</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full rounded-lg border-collapse">
                            <thead>
                                <tr class="border-white text-white uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-center font-bold border-b border-white ">No</th>
                                    <th class="py-3 px-6 text-center font-bold border-l border-white">Tanggal Hasil</th>
                                    <th class="py-3 px-6 text-center font-bold border-l border-white">Hasil</th>
                                    <th class="py-3 px-6 text-center font-bold border-l border-white">Positif</th>
                                    <th class="py-3 px-6 text-center font-bold border-l border-white">Negatif</th>
                                    <th class="py-3 px-6 text-center font-bold border-l border-b border-white">Netral</th>
                                </tr>
                            </thead>
                            <tbody class="text-center text-sm text-white">
                                @for ($i = 1; $i <= 26; $i++)
                                    <tr class="hover:bg-gray-700">
                                        <td class="py-3 px-6 border-b border-white">{{ $i }}</td>
                                        <td class="py-3 px-6 border border-white">2 Februari 2025</td>
                                        <td class="py-3 px-6 border border-white">80% Depresi</td>
                                        <td class="py-3 px-6 border border-white">80</td>
                                        <td class="py-3 px-6 border border-white">10</td>
                                        <td class="py-3 px-6 border-b border-white">10</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>                       
                    </div>
                </div>
            </div>
    
        </div>
    </div>
    
</section>

@endsection
