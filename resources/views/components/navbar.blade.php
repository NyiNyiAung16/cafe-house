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
            <a href="/login" class="text-lg font-medium text-slate-50 hover:text-slate-50 duration-150">Register</a>
            <i class="navicon fa-solid fa-arrow-right text-lg "></i>
        </div> 
    @endif
    @auth
    <div class="relative">
        <div class="cursor-pointer me-3 dropdown flex items-center gap-2">
            <p class="text-slate-100 uppercase">{{ auth()->user()->name }}</p>
            <img src="{{auth()->user()->image}}" alt="defaultimg" width="40">
        </div>
        <div class="left-[200px] flex flex-col items-center absolute rounded-sm bg-slate-500 px-3 py-2 w-[240px] mt-3" id="dropdown-menu">
            {{-- change profile picture --}}
            <form action="/changeProfileImg" method="POST" class="profileImgs flex items-center gap-4 mb-4">
                @csrf
                @method('patch')
                <input type="hidden" name="image" class="Image" value="">
                <div class="flex gap-2">
                    <div>
                        <img src="/photos/profile/1.png" alt="profileimg" width="40" onclick="changeProfileImg('/photos/profile/1.png')" class="cursor-pointer mb-2">
                        <img src="/photos/profile/2.png" alt="profileimg" width="40" onclick="changeProfileImg('/photos/profile/2.png')" class="cursor-pointer mb-2">
                        <img src="/photos/profile/3.png" alt="profileimg" width="40" onclick="changeProfileImg('/photos/profile/3.png')" class="cursor-pointer">
                    </div>
                    <div>
                        <img src="/photos/profile/4.png" alt="profileimg" width="40" onclick="changeProfileImg('/photos/profile/4.png')" class="cursor-pointer mb-2">
                        <img src="/photos/profile/5.png" alt="profileimg" width="40" onclick="changeProfileImg('/photos/profile/5.png')" class="cursor-pointer mb-2">
                        <img src="/photos/profile/6.png" alt="profileimg" width="40" onclick="changeProfileImg('/photos/profile/6.png')" class="cursor-pointer">
                    </div>
                </div>
                <div class="flex flex-col gap-3 justify-center items-center">
                    <img src="{{auth()->user()->image}}"  alt="profileImg" width="80" id="defaultProfileImg">
                    <button type="submit" class="button px-2 py-1 bg-gray-700 hover:bg-gray-800 duration-200 text-white rounded" disabled='true'>Save</button>
                </div>
            </form>
            <div class="w-full border-t"></div>
            {{-- change name and email --}}
            <div class="mt-2 ">
                <form action="/changeProfile" method="POST">
                    @csrf
                    @method('patch')
                    <div class="mb-2">
                        <label class="text-white" for="name">Name</label>
                        <input type="text" name="name" class="w-full outline-none px-2 py-1 rounded-sm" value="{{ old('name',auth()->user()->name) }}" oninput="changeProfile()">
                    </div>
                    <div>
                        <label class="text-white" for="email">Email</label>
                        <input type="text" name="email" class="w-full outline-none px-2 py-1 rounded-sm" value="{{ old('email',auth()->user()->email) }}" oninput="changeProfile()">
                    </div>
                    @error('email')
                        <p class="text-sm text-red-400 my-1">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="profilebtn mt-2 text-sm p-1 rounded-sm text-white bg-gray-700 hover:bg-gray-800 duration-200" disabled='true'>Submit</button>
                </form>
            </div>
            {{-- logout --}}
            <div class="w-full border-b mt-3"></div>
            <form action="/logout" method="post" class="px-3 text-white mt-3">
                @csrf
                <button class="hover:bg-gray-800 duration-200 bg-gray-700 px-2 py-1 rounded" type="submit">Logout</button>
            </form>
        </div>
    </div>
    @endauth
</section>