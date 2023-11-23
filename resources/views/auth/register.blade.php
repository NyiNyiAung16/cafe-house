<x-head></x-head>

<div class="createForm lg:max-w-5xl md:max-w-4xl sm:max-w-xl max-w-lg w-full bg-slate-500 text-white grid grid-cols-12 gap-5 my-10">
    <div class="hidden md:block md:col-span-5 lg:col-span-5">
        <img src="/photos/1.jpg" alt="">
    </div>
   <div class="py-2 px-4 lg:px-0 col-span-12 md:col-span-7 lg:col-span-7 md:text-md text-sm">
        <h3 class="text-center mb-5 text-2xl">Register</h3>
        <form action="/register/store" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" autocomplete="off" value="{{old('name')}}">
            </div>
            @error('name')
                <p class="text-red-400 font-thin text-sm m-0 p-0">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" autocomplete="off" value="{{old('email')}}">
            </div>
            @error('email')
                <p class="text-red-400 font-thin text-sm">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="confirmPs">Confrim Password</label>
                <input type="password" name="password_confirmation" id="confirmPs">
            </div>
            @error('password')
                <p class="text-red-400 font-thin text-sm">{{ $message }}</p>
            @enderror
            <button type="submit" class="bg-gray-700 hover:bg-gray-800 duration-200 px-2 py-2 border-0 rounded mt-3">Register</button>
            <p class="mt-4">If you have already have an account? Please <a href="/login" class="text-blue-300 underline">Login</a></p>
        </form>
   </div>
</div>

<x-footer></x-footer>