@extends('layouts.main')

@section('title', 'Index Page')

@section('content')

@include('includes.navbar')  

<section class="relative overflow-hidden md:py-36 py-16 bg-slate-50/50 dark:bg-slate-800/20" id="home">
    <div class="container relative px-4 md:px-0">
        <div class="grid md:grid-cols-2 grid-cols-1 items-center gap-10 md:gap-[30px] relative">
            <div class="md:me-6 text-center md:text-left">
                <h6 class="text-red-500 uppercase text-xs md:text-sm font-bold tracking-wider mb-2 md:mb-3">DepressionMeter</h6>
                <h4 class="font-bold leading-snug md:leading-normal text-2xl md:text-[42px] lg:text-[54px] mb-4 md:mb-5">
                    Deteksi Dini Depresi Melalui Analisis Postingan Media Sosial
                </h4>
                <p class="text-base md:text-lg max-w-xl mx-auto md:mx-0">
                    Silahkan masukan text pada kolom input dibawah ini untuk melakukan analisa apakah termasuk ke dalam orang dengan potensi depresi atau gangguan mental atau tidak.
                </p>

                <div class="mt-6 flex flex-col md:flex-row items-center md:space-x-2 space-y-3 md:space-y-0">
                    <form action="{{ route('getTweetUser') }}" method="POST" class="flex flex-col md:flex-row items-center space-y-3 md:space-y-0 md:space-x-3 w-full justify-center md:justify-start">
                        @csrf
                        <input type="text" name="username" id="usernameTwitter" placeholder="Masukkan Username Twitter / X"
                            class="border border-gray-300 bg-white/30 rounded-xl px-4 py-2 w-full md:w-60 lg:w-96 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent">
                        <button type="button" id="submitBtn"
                                class="bg-blue-600/20 text-white px-4 py-2 rounded-xl hover:bg-blue-700/60 w-full md:w-auto text-center">
                            Submit
                        </button>
                    </form>
                </div>
            </div>

            <div class="relative mt-8 md:mt-0">
                <img src="{{ asset('assets/images/b.png') }}" class="mx-auto w-[280px] md:w-98 relative z-2" alt="">
                <div class="overflow-hidden absolute md:w-[500px] md:h-[400px] w-[300px] h-[250px] rotate-12 bg-gradient-to-tl to-red-500/20 via-red-500/70 from-red-500 bottom-1/2 translate-y-1/2 start-1/2 -translate-x-1/2 z-1 shadow-md shadow-red-500/10 rounded-[60%]"></div>
                <div class="overflow-hidden after:content-[''] after:absolute after:w-12 after:h-12 after:bg-red-500/20 after:top-0 after:end-6 after:z-1 after:rounded-lg after:animate-[spin_10s_linear_infinite]"></div>
            </div>
        </div>
    </div>
</section>


<div id="resultModal" class="hidden fixed inset-0 bg-black bg-opacity-80 flex justify-center items-center backdrop-blur-sm z-50 p-4">
    <div class="bg-white/80 p-6 md:p-8 rounded-lg shadow-xl text-center max-w-lg w-full">
        <p class="text-black text-base md:text-lg font-semibold">Berdasarkan hasil analisis diperoleh bahwa kamu:</p>
        <h2 class="text-red-500 text-3xl md:text-4xl font-bold mt-2" id="persentaseDepresi"></h2>
        <p class="text-red-500">Depresi</p>
        <p class="text-black mt-4 text-sm md:text-base">Berikut merupakan analisa detail mengenai username Twitter atau X yang sudah kamu submit</p>

        <div class="flex flex-col md:flex-row justify-center items-center md:space-x-4 space-y-3 md:space-y-0 mt-4">
            <div class="bg-red-100 text-red-500 p-4 md:p-6 rounded-lg w-full md:w-auto">
                <p class="text-xl md:text-2xl font-bold" id="qtyNegatif"></p>
                <p>Sentimen Negatif (Depresi)</p>
            </div>
            <div class="bg-green-100 text-green-500 p-4 md:p-6 rounded-lg w-full md:w-auto">
                <p class="text-xl md:text-2xl font-bold" id="qtyPositif"></p>
                <p>Sentimen Positif (Tidak Depresi)</p>
            </div>
            <div class="bg-blue-100 text-blue-700 p-4 md:p-6 rounded-lg w-full md:w-auto">
                <p class="text-xl md:text-2xl font-bold" id="qtyNetral"></p>
                <p>Sentimen Netral</p>
            </div>
        </div>

        <p class="text-black text-xs md:text-sm text-center italic mt-4">
            "Hasil prediksi dari sistem ini tidak selalu 100% akurat. Untuk memastikan diagnosis yang tepat dan perawatan yang sesuai, sebaiknya konsultasikan langsung dengan dokter ahli."
        </p>
        <button id="closeModal" class="mt-6 bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 w-full md:w-auto">Tutup</button>
    </div>
</div>


<script>
    document.getElementById('submitBtn').addEventListener('click', function() {
        let username = $('#usernameTwitter').val();

        if (username == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Mohon masukkan username Twitter / X',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
            });
            return;
        } else {
            Swal.fire({
                title: 'Mohon tunggu...',
                text: 'Akun ' + username + ' sedang kami analis!',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: "{{ route('getTweetUser') }}",
                type: "POST",
                data: {
                    username: $('#usernameTwitter').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    Swal.close(); 

                    if (response.status == 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,
                        });
                        return;
                    } else if (response.status == 'success') {
                        let value = response.history;
        
                        $('#persentaseDepresi').text(value.persentase_depresi + '%');
                        $('#qtyNegatif').text(value.qty_negatif);
                        $('#qtyPositif').text(value.qty_positif);
                        $('#qtyNetral').text(value.qty_netral);
        
                        $('#resultModal').removeClass('hidden');
                    }
                },
                error: function(xhr, status, error) {
                    Swal.close();  
                    console.error(xhr);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: error,
                    });
                }
            });
        }

    });

    document.getElementById('closeModal').addEventListener('click', function() {
        $('#resultModal').addClass('hidden');
    });

</script>

@endsection
