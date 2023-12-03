@props(['products','user'])

<x-head></x-head>

<div class="min-h-screen min-w-screen bg-white text-black">
    <div class="grid grid-cols-12">
        <div class="col-span-3 px-2 py-3">
            <div class="text-black flex gap-3 items-end">
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
                <a href="/"><i class="fa-solid fa-arrow-right-from-bracket rotate-180 text-xl"></i></a>
                <div class="profile flex items-center gap-1">
                    <img src="{{ $user->image }}" width="40" alt="dashboardprofileimg">
                    <p>{{$user->email}}</p>
                </div>
            </div>
            <div class="mt-5 flex justify-between items-center">
                <div class="p-2 bg-white flex justify-between items-center w-[270px] rounded-sm">
                    <input type="text" class="bg-transparent outline-none w-full me-2" placeholder="Search products">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="flex gap-3 items-center">
                    <p>Sort by: <span class="text-blue-500 me-1 cursor-pointer"><a href="/admin/sortByName">Product Name</a></span><i class="fa-solid fa-chevron-down"></i></p>
                    <p>Sort by: <span class="text-blue-500 me-1 cursor-pointer"><a href="/admin/sortByDate">Created_at</a></span><i class="fa-solid fa-chevron-down"></i></p>
                    
                </div>
            </div>

            <!-- data -->
            <div class="relative overflow-x-auto mt-5">
                <table class="w-full text-sm text-left rtl:text-right  text-gray-400">
                    <thead class="text-xsuppercase bg-slate-400 text-gray-600">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                               Product Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created_at
                            </th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($products as $product)    
                            <tr class=" border-b bg-slate-200 hover:bg-slate-300 duration-150 border-gray-300">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-gray-500">
                                    {{ $product->name }}
                                </th>
                                <td class="px-6 py-4" >
                                    ${{ $product->price }}
                                </td>
                                <td class="px-6 py-4">
                                    <img src="{{ asset('storage/'.$product->image) }}" alt="card1" class="w-1/6 rounded max-h-[100px] h-full object-cover">
                                </td>
                                <td class="px-6 py-4">
                                    {{ $product->created_at }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<x-footer></x-footer>