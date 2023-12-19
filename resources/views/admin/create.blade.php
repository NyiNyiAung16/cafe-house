@props(['user'])
@if (session()->has('flashMessage'))
    <p class="absolute bg-green-500 text-slate-50 px-2 py-3 text-xl rounded-sm right-0 bottom-0">{{ session()->get('flashMessage')}}</p>
@endif

<x-admin.template :user="$user">
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
</x-admin.template>
