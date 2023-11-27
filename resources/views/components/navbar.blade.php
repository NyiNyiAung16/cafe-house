<section class="navSection flex justify-between items-center shadow-sm fixed top-0 z-10 w-screen">
    <div class="flex gap-4 items-center text-slate-300">
        <h3 class="text-2xl text-white font-medium">Coffee-Shop</h3>
        <a href="#home" class="hover:text-slate-50 duration-150">Home</a>
        <a href="#" class="hover:text-slate-50 duration-150">About</a>
        <a href="#contact" class="hover:text-slate-50 duration-150">Contact</a>
        <a href="/create" class="hover:text-slate-50 duration-150">Create</a>
        <a href="/carts/me" class="hover:text-slate-50 duration-150">Carts <i class="fa-solid fa-cart-shopping text-sm"></i></i></a>
    </div>
    @if (!auth()->user())    
        <div class="navRight flex gap-2 items-center text-slate-50 hover:text-blue-400 duration-150">
            <a href="/register" class="text-lg font-medium text-slate-50 hover:text-slate-50 duration-150">Register</a>
            <i class="navicon fa-solid fa-arrow-right text-lg "></i>
        </div> 
    @endif
    @auth
        <form action="/logout" method="post" class="px-3 text-white">
            @csrf
            <button class="hover:text-gray-100 hover:underline duration-150" type="submit">Logout</button>
        </form>
    @endauth
</section>