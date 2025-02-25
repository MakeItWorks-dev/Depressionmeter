@extends('layouts.main')

@section('title', 'Index Page')

@section('content')

@include('includes.navbar')  

<!-- Start -->
<section class="relative overflow-hidden md:py-36 py-24 bg-slate-50/50 dark:bg-slate-800/20 bg-[url('{{ asset('assets/images/bg1.png') }}')] bg-no-repeat bg-center bg-cover" id="home">
    <div class="container relative">
        <div class="grid md:grid-cols-2 grid-cols-1 items-center gap-[30px] relative">
            <div class="md:me-6">
                <h6 class="text-red-500 uppercase text-sm font-bold tracking-wider mb-3">DepressionMeter</h6>
                <h4 class="font-bold lg:leading-normal leading-normal text-[42px] lg:text-[54px] mb-5">Deteksi Dini Depresi Melalui Analisis Postingan Media Sosial</h4>
                <p class="text-lg max-w-xl">Silahkan masukan text pada kolom input dibawah ini untuk melakukan analisa apakah termasuk ke dalam orang dengan potensi depresi atau gangguan mental atau tidak.</p>
                
                <div class="mt-6 flex items-center space-x-2">
                    <form action="">
                        @csrf
                        <input type="text" name="input_field" placeholder="Masukkan teks..." class="border border-gray-300 bg-white/30 rounded-lg px-6 py-2 lg:w-96 w-60  focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent">
                        <button type="button" id="submitBtn" class="bg-blue-400/50 text-white px-4 py-2 rounded-lg hover:bg-blue-500">Submit</button>  
                    </form>
                </div>
            </div>

            <div class="relative">
                <img src="{{ asset('assets/images/b.png') }}" class="mx-auto w-98 relative z-2" alt="">
                <div class="overflow-hidden absolute md:w-[500px] md:h-[400px] w-[400px] rotate-12 h-[350px] bg-gradient-to-tl to-red-500/20 via-red-500/70 from-red-500 bottom-1/2 translate-y-1/2 md:start-0 start-1/2 ltr:md:translate-x-0 ltr:-translate-x-1/2 rtl:md:translate-x-0 rtl:translate-x-1/2 z-1 shadow-md shadow-red-500/10 rounded-[60%]"></div>

                <div class="overflow-hidden after:content-[''] after:absolute after:size-16 after:bg-red-500/20 after:top-0 after:end-6 after:z-1 after:rounded-lg after:animate-[spin_10s_linear_infinite]"></div>
            </div>
            </div>
        </div>
    </div>
</section>
<!-- End -->

<!-- Modal -->
<div id="resultModal" class="hidden fixed inset-0 bg-black bg-opacity-80 flex justify-center items-center backdrop-blur-sm z-50">
    <div class="bg-white/80 p-8 rounded-lg shadow-xl text-center max-w-lg w-full">
        <p class="text-black text-lg font-semibold">Berdasarkan hasil analisis diperoleh bahwa kamu:</p>
        <h2 class="text-red-500 text-4xl font-bold mt-2">80%</h2>
        <p class=" text-red-500">Depresi</p>
        <p class="text-black mt-4">Berikut merupakan analisa detail mengenai text yang sudah kamu submit</p>
        <div class="flex justify-center space-x-4 mt-4">
            <div class="bg-red-100 text-red-500 p-6 rounded-lg">
                <p class="text-2xl font-bold">30</p>
                <p class="">Sentimen Negatif</p>
            </div>
            <div class="bg-blue-100 text-blue-500 p-6 rounded-lg">
                <p class="text-2xl font-bold">12</p>
                <p class="">Sentimen Positif</p>
            </div>
            <div class="bg-gray-100 text-gray-700 p-6 rounded-lg">
                <p class="text-2xl font-bold">2</p>
                <p class="">Sentimen Netral</p>
            </div>
        </div>
        <button id="closeModal" class="mt-6 bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">Tutup</button>
    </div>
</div>

<script>
    document.getElementById('submitBtn').addEventListener('click', function() {
        document.getElementById('resultModal').classList.remove('hidden');
    });
    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('resultModal').classList.add('hidden');
    });
</script>

@endsection
