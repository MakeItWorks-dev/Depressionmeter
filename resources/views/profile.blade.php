@extends('layouts.main')

@section('title', 'Profile Page')

@section('content')

@include('includes.navbar')  

<section class="relative overflow-hidden md:py-36 py-24 bg-slate-50/50 dark:bg-slate-800/20 bg-[url('{{ asset('assets/images/bg1.png') }}')] bg-no-repeat bg-center bg-cover">    <div class="p-6">

    <div class="p-6">
        <div class="grid grid-cols-12 gap-6">

            <div class="col-span-12 md:col-span-3">
                <div class="p-4 rounded-lg ">
                    <h2 class="text-4xl font-extrabold text-white mb-4">Profile</h2>
                    <div class="mt-2">
                        <p class="text-white">Nama</p>
                        <p class="text-lg text-white font-semibold">{{ Auth::user()->name }}</p>
                    </div>
                    <div class="mt-2">
                        <p class="text-white">Email</p>
                        <p class="text-lg text-white font-semibold">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
    
            <div class="col-span-12 md:col-span-9">
                <div class="p-6 rounded-lg ">
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
                                <tr class="hover:bg-gray-700">
                                    <td class="py-3 px-6 border-b border-white">1</td>
                                    <td class="py-3 px-6 border border-white">2 Februari 2025</td>
                                    <td class="py-3 px-6 border border-white">80% Depresi</td>
                                    <td class="py-3 px-6 border border-white">80</td>
                                    <td class="py-3 px-6 border border-white">10</td>
                                    <td class="py-3 px-6 border-b border-white">10</td>
                                </tr>
                                <tr class="hover:bg-gray-700">
                                    <td class="py-3 px-6 border-b border-white">1</td>
                                    <td class="py-3 px-6 border border-white">2 Februari 2025</td>
                                    <td class="py-3 px-6 border border-white">80% Depresi</td>
                                    <td class="py-3 px-6 border border-white">80</td>
                                    <td class="py-3 px-6 border border-white">10</td>
                                    <td class="py-3 px-6 border-b border-white">10</td>
                                </tr>
                                <tr class="hover:bg-gray-700">
                                    <td class="py-3 px-6 border-b border-white">1</td>
                                    <td class="py-3 px-6 border border-white">2 Februari 2025</td>
                                    <td class="py-3 px-6 border border-white">80% Depresi</td>
                                    <td class="py-3 px-6 border border-white">80</td>
                                    <td class="py-3 px-6 border border-white">10</td>
                                    <td class="py-3 px-6 border-b border-white">10</td>
                                </tr>
                                <tr class="hover:bg-gray-700">
                                    <td class="py-3 px-6 border-b border-white">1</td>
                                    <td class="py-3 px-6 border border-white">2 Februari 2025</td>
                                    <td class="py-3 px-6 border border-white">80% Depresi</td>
                                    <td class="py-3 px-6 border border-white">80</td>
                                    <td class="py-3 px-6 border border-white">10</td>
                                    <td class="py-3 px-6 border-b border-white">10</td>
                                </tr>
                                <tr class="hover:bg-gray-700">
                                    <td class="py-3 px-6 border-b border-white">1</td>
                                    <td class="py-3 px-6 border border-white">2 Februari 2025</td>
                                    <td class="py-3 px-6 border border-white">80% Depresi</td>
                                    <td class="py-3 px-6 border border-white">80</td>
                                    <td class="py-3 px-6 border border-white">10</td>
                                    <td class="py-3 px-6 border-b border-white">10</td>
                                </tr>
                                
                                  
                            </tbody>
                        </table>                       
                    </div>
                </div>
            </div>
    
        </div>
    </div>
    
</section>

@endsection
