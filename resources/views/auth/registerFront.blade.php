@vite(['resources/css/app.css', 'resources/js/app.js'])

<div id="register" class="flex flex-row-reverse p-4 w-full h-screen">
    <div class="flex flex-col flex-[0.5] items-center px-36 pt-[23vh]">
        <h1 class="text-5xl inter-bold">Sign-Up</h1>
        <form method="POST" action="/register" class="flex w-full flex-col pt-16 space-y-5 justify-center items-center">
            @csrf
            <input type="text" placeholder="Username" class="w-full h-14 p-2 inter-regular rounded-xl bg-[#F9E7D3] @error('username') is-invalid
        @enderror"
                value="{{ old('username') }}" name="username" id="username" required autofocus>
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <input type="text" placeholder="E-mail" class="w-full h-14 p-2 inter-regular rounded-xl bg-[#F9E7D3] @error('email') is-invalid
        @enderror"
                value="{{ old('email') }}" name="email" id="email" required autofocus>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <input class="w-full h-14 p-2 inter-regular rounded-xl bg-[#F9E7D3]" type="password" placeholder="Password" name="password" required>
            <button class="bg-[#DFB787] w-40 h-10 rounded-xl inter-bold" type="submit">Sign-Up</button>

            <h5 class="inter-regular text-gray-400">Sudah Punya Akun? <a href="/login" class="text-[#654B4B] underline">Login</a></h5>
        </form>
    </div>
    <div class="flex-[0.7] overflow-hidden rounded-2xl bg-black">
        <img src="/images/main/login.svg" alt="wegrow" class="h-auto w-full object-cover">
    </div>
</div>
