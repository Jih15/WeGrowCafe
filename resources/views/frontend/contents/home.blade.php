@extends('frontend.mainFrontend')

@section('content')

    <div class="space-y-8 mt-[20vh] p-12">
        <h1 class="text-6xl montserrat-bold">Web <br>Reservasi</h1>
        <p class="text-xl w-[80rem] inter-regular">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
            officia deserunt mollit anim id est laborum.</p>
        <a href="/reserve"><button class="mt-16 text-md text-white bg-black rounded-lg w-35 h-12 p-3 duration-150 transform hover:scale-105">
            <span>Reserve Now</span></button>
        </a>
    </div>

@endsection
