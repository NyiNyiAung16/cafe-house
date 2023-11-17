<x-head></x-head>
<x-navbar></x-navbar>


<div class="createForm bg-slate-500 text-white grid md:grid-cols-1 lg:grid-cols-2 gap-5 w-3/4 translate-y-32">
    @if (session()->has('flashMessage'))
        <p class="bg-green-500 text-slate-50 px-2 py-3 text-xl">{{ session()->get('flashMessage')}}</p>
    @endif
    <div>
        <img src="/photos/1.jpg" alt="">
    </div>
   <div class="py-2 px-4 lg:px-0">
        <h3 class="text-center mb-5 text-xl">Create Coffee Lists</h3>
        <form action="/addData" method="POST" enctype="multipart/form-data">
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
                <label for="file" class="cursor-pointer mt-7 underline">Choose a Image</label>
                <input type="file" name="image" id="file" class="hidden">
            </div>
            @error('image')
                <p class="text-red-400">{{ $message }}</p>
            @enderror
            <button type="submit" class="bg-gray-700 px-3 py-2 border-0 rounded mt-3">Submit</button>
        </form>
   </div>
</div>

<x-footer></x-footer>