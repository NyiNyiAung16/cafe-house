@props(['lists'])

<h3 class="text-3xl text-center mt-3 text-gray-200 underline">Coffee Lists</h3>
<div class="listContainer p-6 flex  gap-6 justify-center flex-wrap">
    @foreach ($lists as $list)
        <div class="card w-60 bg-blue-200 border-0 rounded">
            <div class="card-body h-full flex flex-col justify-between">
                <img src="{{ asset('storage/'.$list->image) }}" alt="card1" class="w-full rounded-t object-cover max-h-[200px] h-full">
                <div class="card-content px-3 py-1">
                    <h3 class="card-title text-lg">{{$list->name}}</h3>
                    <p class="card-subtitle text-sm text-orange-500">${{$list->price}}</p>
                    <a href="/coffee/{{$list->id}}/carts" class="text-slate-700 hover:underline duration-200">Add Cart</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
