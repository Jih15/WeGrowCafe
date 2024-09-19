@extends('frontend.mainFrontend')

@section('content')
    <div class="flex flex-col w-full h-auto overflow-hidden">
        {{-- background --}}
        <div class="bg-slate-400 h-[80vh] w-screen">
            {{-- Image Contain --}}
        </div>

        {{-- About --}}
        <div class="flex w-full h-[80vh]">
            <!-- Div pertama (About Section) -->
            <div class="flex-[0.42] h-full p-24 flex justify-center items-center">
                <div class="text-left">
                    <h1 class="inter-bold text-5xl mb-4">About</h1>
                    <p class="inter-regular w-[25em] mt-12">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                        deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>

            <!-- Div kedua -->
            <div class="flex-[0.58] h-full bg-white flex justify-center items-center">
                <p class="text-black">Content on the right</p>
            </div>
        </div>


        {{-- Tables --}}
        <div class="flex w-full h-[80vh]">
            <div class="flex-col flex-[0.5] h-full bg-white flex justify-center items-center p-8">
                <div class="bg-slate-500 w-full h-full">

                </div>
                <p class="text-black">Content on the left</p>
            </div>
            <div class="flex-col flex-[0.5] h-full bg-white flex justify-center items-center p-8">
                <div class="bg-slate-500 w-full h-full">

                </div>
                <p class="text-black">Content on the right</p>
            </div>
        </div>

        {{-- More Information --}}
        <div>
            <h1 class="inter-bold text-5xl mb-4">More Information</h1>
            <div></div>
        </div>
    </div>
@endsection
