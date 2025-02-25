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
                        <p class="text-lg text-white font-semibold">{{ $user->name }}</p>
                    </div>
                    <div class="mt-2">
                        <p class="text-white">Email : </p>
                        <p class="text-lg text-white font-semibold">{{ $user->email }}</p>
                    </div>
                </div>

                <div class="max-w-lg mx-auto mt-5 bg-gray-700/50 p-6 rounded-lg shadow-md">
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
                    <div class="flex justify-between -mt-2 space-x-2">
                        <h2 class="text-4xl font-extrabold text-white mb-4">Riwayat Analisa</h2>
                        <a href="{{ route('exportpdf', ['id' => $user->id]) }}" 
                            class="size-10 flex items-center justify-center rounded-xl bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white">
                             <i data-feather="file-text" class="size-4"></i>
                         </a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full rounded-lg border-collapse">
                            <thead>
                                <tr class="border-white text-white uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-center font-bold border-b border-white">No</th>
                                    <th class="py-3 px-6 text-center font-bold border-l border-white">Tanggal Hasil</th>
                                    <th class="py-3 px-6 text-center font-bold border-l border-white">Hasil</th>
                                    <th class="py-3 px-6 text-center font-bold border-l border-white">Positif</th>
                                    <th class="py-3 px-6 text-center font-bold border-l border-white">Negatif</th>
                                    <th class="py-3 px-6 text-center font-bold border-l border-b border-white">Netral</th>
                                </tr>
                            </thead>
                        
                            @php
                                $totalData = 30;
                                $perPage = 10;
                                $totalPages = ceil($totalData / $perPage);
                            @endphp
                        
                            @for ($page = 0; $page < $totalPages; $page++)
                                <tbody class="text-center text-sm text-white page" data-page="{{ $page }}" style="{{ $page > 0 ? 'display: none;' : '' }}">
                                    @for ($i = $page * $perPage + 1; $i <= min(($page + 1) * $perPage, $totalData); $i++)
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
                            @endfor
                        </table>
                        
                        <div class="flex justify-center mt-4 space-x-2">
                            <button id="prev-btn" class="w-8 h-8 rounded-full bg-gray-600 text-white hidden" onclick="prevPage()">‹</button>
                        
                            <div id="pagination-container" class="flex space-x-2"></div>
                        
                            <button id="next-btn" class="w-8 h-8 rounded-full bg-gray-600 text-white hidden" onclick="nextPage()">›</button>
                        </div>

                    </div>
                </div>
            </div>
    
        </div>
    </div>
    
</section>

<script>
    let currentPage = 0;
    const totalPages = {{ $totalPages }};
    const maxVisibleButtons = 9;

    function renderPagination() {
        let container = document.getElementById("pagination-container");
        container.innerHTML = "";

        let startPage = Math.max(0, Math.min(currentPage - 4, totalPages - maxVisibleButtons));
        let endPage = Math.min(totalPages, startPage + maxVisibleButtons);

        for (let i = startPage; i < endPage; i++) {
            let btn = document.createElement("button");
            btn.className = "pagination-btn w-8 h-8 rounded-full bg-gray-600 text-white";
            btn.textContent = i + 1;
            btn.onclick = () => changePage(i);
            if (i === currentPage) btn.classList.add("bg-gray-900");
            container.appendChild(btn);
        }

        document.getElementById("prev-btn").style.display = currentPage > 0 ? "block" : "none";
        document.getElementById("next-btn").style.display = currentPage < totalPages - 1 ? "block" : "none";
    }

    function changePage(page) {
        document.querySelectorAll('.page').forEach(tbody => {
            tbody.style.display = tbody.getAttribute('data-page') == page ? '' : 'none';
        });
        currentPage = page;
        renderPagination();
    }

    function prevPage() {
        if (currentPage > 0) changePage(currentPage - 1);
    }

    function nextPage() {
        if (currentPage < totalPages - 1) changePage(currentPage + 1);
    }

    renderPagination();
</script>
@endsection
