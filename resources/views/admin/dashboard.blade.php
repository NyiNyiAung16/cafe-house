@props(['products','user'])

<x-admin.template :user="$user">
    <div class="mt-5 flex justify-between items-center">
        <form action="/admin/dashboard" class="p-2 bg-white flex justify-between items-center w-[270px] rounded-sm">
            <input type="text" name="search" class="bg-transparent outline-none w-full me-2 text-gray-500 text-sm" placeholder="Search products by name" autocomplete="off">
            <button type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
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
                @forelse ($products as $product)    
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
                @empty
                <div>
                    <p class="text-sm text-blue-500 text-center my-2">Search product is not found???</p>
                </div>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin.template>



