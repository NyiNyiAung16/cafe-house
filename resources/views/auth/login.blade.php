<x-head></x-head>

<div class="createForm lg:max-w-4xl md:max-w-3xl sm:max-w-xl max-w-lg bg-slate-500 text-white grid grid-cols-12 gap-5 w-full my-10">
    <div class="hidden md:block md:col-span-5 lg:col-span-5">
        <img src="/photos/1.jpg" alt="loginimg">
    </div>
   <div class="py-2 px-4 mx-2 lg:px-0 col-span-12 md:col-span-7 lg:col-span-7 md:text-md text-sm">
        <h3 class="text-center mb-5 text-2xl">Login</h3>
        <form action="/login/store" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" autocomplete="off" value="{{old('email')}}">
            </div>
            @error('email')
                <p class="text-red-400 text-sm m-0 p-0 mt-1">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" autocomplete="off" value="{{old('password')}}">
            </div>
            @error('password')
                <p class="text-red-400 text-sm m-0 p-0 mt-1">{{ $message }}</p>
            @enderror
            <button type="submit" class="bg-gray-700 hover:bg-gray-800 duration-200 px-3 py-2 border-0 rounded mt-3">Login</button>
            <p class="mt-5">If you have already have an account? Please <a href="/register" class="text-blue-300 underline">register</a></p>
        </form>
   </div>
</div>

<x-footer></x-footer>