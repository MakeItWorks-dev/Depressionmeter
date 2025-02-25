@extends('layouts.main')

@section('title', 'Profile Page')

@section('content')

@include('includes.navbar')  

<!-- Start -->
<section class="relative overflow-hidden md:py-36 py-24 bg-slate-50/50 dark:bg-slate-800/20 bg-[url('{{ asset('assets/images/bg1.png') }}')] bg-no-repeat bg-center bg-cover" id="home">
    <div class="container relative">
        <div class="grid md:grid-cols-2 grid-cols-1 items-center gap-[30px] relative">
            

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




@endsection
