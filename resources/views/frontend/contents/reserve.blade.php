@extends('frontend.mainFrontend')

@section('content')

<div id="reservasi" class="pt-[20vh] p-12 pb-0">
    <h1 class="text-5xl font-semibold text-center mb-8">Outlet</h1>
    <div id="item" class="flex justify-center">
        <ul class="grid grid-cols-4 gap-4">
            <li class="relative transition-transform duration-500 transform hover:scale-110">
                <a href="#" class="block w-full h-full">
                    <img src="/images/cafe/nyedot.png" alt="" class="w-full h-full object-cover">
                </a>
            </li>
            <li class="relative transition-transform duration-500 transform hover:scale-110">
                <a href="#" class="block w-full h-full">
                    <img src="/images/cafe/ottokopi.png" alt="" class="w-full h-full object-cover">
                </a>
            </li>
            <li class="relative transition-transform duration-500 transform hover:scale-110">
                <a href="#" class="block w-full h-full">
                    <img src="/images/cafe/parewa.png" alt="" class="w-full h-full object-cover">
                </a>
            </li>
            <li class="relative transition-transform duration-500 transform hover:scale-110">
                <a href="#" class="block w-full h-full">
                    <img src="/images/cafe/dapue.png" alt="" class="w-full h-full object-cover">
                </a>
            </li>
            <li class="relative transition-transform duration-500 transform hover:scale-110">
                <a href="#" class="block w-full h-full">
                    <img src="/images/cafe/darisini.png" alt="" class="w-full h-full object-cover">
                </a>
            </li>
            <li class="relative transition-transform duration-500 transform hover:scale-110">
                <a href="#" class="block w-full h-full">
                    <img src="/images/cafe/lamak.png" alt="" class="w-full h-full object-cover">
                </a>
            </li>
            <li class="relative transition-transform duration-500 transform hover:scale-110">
                <a href="#" class="block w-full h-full">
                    <img src="/images/cafe/lantai.png" alt="" class="w-full h-full object-cover">
                </a>
            </li>
            <li class="relative transition-transform duration-500 transform hover:scale-110">
                <a href="#" class="block w-full h-full">
                    <img src="/images/cafe/airo.png" alt="" class="w-full h-full object-cover">
                </a>
            </li>
        </ul>
    </div>
</div>

@endsection
