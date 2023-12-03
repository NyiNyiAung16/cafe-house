<x-head></x-head>
@if (session()->has('flashMessage'))
    <p class="absolute bg-green-500 text-slate-50 px-2 py-3 text-xl rounded-sm right-0 bottom-0">{{ session()->get('flashMessage')}}</p>
@endif
<div class="min-h-screen min-w-screen bg-white text-black">
    <div class="grid grid-cols-12">
        <div class="col-span-3 px-2 py-3">
            <div class="text-black flex gap-3 items-end">
                <img src="/logo/logo3.png" width="40" alt="dashboardImg">
                <span class="text-xl font-semibold">Coffee Shop</span>
            </div>
            <div class="mt-5 flex flex-col">
                <div class="flex gap-2 items-center px-3 py-4 hover:bg-gray-600 hover:text-white duration-150">
                    <i class="fa-solid fa-house"></i>
                    <a href="/admin/dashboard">Dashboard</a>
                </div>
                <div class="flex gap-2 items-center px-3 py-4 hover:bg-gray-600 hover:text-white duration-150">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <a href="/admin/create">Create Product</a>
                </div>
                <div class="flex gap-2 items-center px-3 py-4 hover:bg-gray-600 hover:text-white duration-150 rounded-sm">
                    <i class="fa-solid fa-pen-clip"></i>
                    <a href="/admin/promotion/create">Create Promotion</a>
                </div>
            </div>
        </div>
        <div class="col-span-9 bg-slate-100 px-2 py-3">
            <div class="nav flex justify-between border-b-2 pb-4">
                <a href="/"><i class="fa-solid fa-arrow-right-from-bracket rotate-180 text-xl"></i></a>
                <div class="profile flex items-center gap-1">
                    <img src="/photos/profile/1.png" width="40" alt="dashboardprofileimg">
                    <p>mgmg@gmail.com</p>
                </div>
            </div>
            {{-- show create form --}}
            <div class="createForm s text-gray-600 mt-5 px-3 py-2">
               <div class="py-2 px-4 lg:px-0">
                    <h3 class="text-center mb-5 text-xl">Create Coffee Lists</h3>
                    <form action="/admin/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" autocomplete="off" value="{{old('name')}}">
                        </div>
                        @error('name')
                            <p class="text-red-400">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" autocomplete="off" value="{{old('price')}}">
                        </div>
                        @error('price')
                            <p class="text-red-400">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <label for="file" class="cursor-pointer mt-7 underline hover:text-gray-800 duration-200">Choose a Image</label>
                            <input type="file" name="image" id="file" class="hidden">
                        </div>
                        @error('image')
                            <p class="text-red-400">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="bg-gray-700 text-white hover:bg-gray-800 duration-150 px-3 py-2 border-0 rounded mt-3">Submit</button>
                    </form>
               </div>
            </div>

        </div>
    </div>
</div>

<x-footer></x-footer>