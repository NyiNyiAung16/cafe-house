@props(['products'])

<x-head></x-head>
{{-- <x-navbar></x-navbar> --}}
{{-- <x-banner></x-banner> --}}


<div class="mt-10">
    <h3 class="text-white text-2xl underline mx-6" style="user-select: none">Cart Products</h3>
    <div class="cartContainer p-6 grid grid-cols-12 gap-3">
        @forelse ($products as $product)    
        <div class="col-span-2 relative w-60 bg-blue-200 border-0 rounded">
            <div class="card-body h-full flex flex-col justify-between">
                <img src="{{ asset('storage/'.$product->image) }}" alt="card1" class="w-full rounded-t h-full object-cover">
                <div class="card-content px-3 py-1">
                    <h3 class="text-lg capitalize">{{$product->name}}</h3>
                    <p class="text-sm text-orange-600">${{ $product->price }}</p>
                </div>
                <a href="/carts/{{$product->id}}/destroy"><i class="fa-solid fa-xmark text-lg text-white absolute top-0 right-2 cursor-pointer hover:text-red-400 duration-200"></i></a>
            </div>
        </div>
        @empty
            <div class="col-span-4">
                <p class="text-white text-lg">Your cart is empty.</p>
            </div>
        @endforelse
    </div>
    <div class="ms-7 text-white">
        <a href="/" class="bg-gray-700 hover:bg-gray-900 duration-200 px-3 py-2 rounded">Go Home</a>
    </div>

</div>


<x-footer></x-footer>