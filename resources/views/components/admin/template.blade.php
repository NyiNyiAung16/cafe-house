<x-head></x-head>

<div class="min-h-screen min-w-screen bg-slate-50 text-black">
    <div class="grid grid-cols-12">
        <div class="col-span-3 px-2 py-3">
            <div class="text-black flex gap-3 items-end ">
                <img src="/logo/logo3.png" width="40" alt="dashboardImg">
                <span class="text-xl font-semibold">Coffee Shop</span>
            </div>
            <div class="mt-5 flex flex-col">
                <div class="flex gap-2 items-center px-3 py-4 hover:bg-gray-600 hover:text-white duration-150 rounded-sm">
                    <i class="fa-solid fa-house"></i>
                    <a href="/admin/dashboard">Dashboard</a>
                </div>
                <div class="flex gap-2 items-center px-3 py-4 hover:bg-gray-600 hover:text-white duration-150 rounded-sm">
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
                <a href="/"><i class="fa-solid fa-arrow-right-from-bracket rotate-180 text-xl hover:scale-110 duration-200"></i></a>
                <div class="profile flex items-center gap-1">
                    <img src="{{ $user->image }}" width="40" alt="dashboardprofileimg">
                    <p>{{$user->email}}</p>
                </div>
            </div>
        
            {{ $slot }}

        </div>
    </div>
</div>

<x-footer></x-footer>