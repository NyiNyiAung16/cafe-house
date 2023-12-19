@props(['user'])
@if (session()->has('flashMessage'))
    <p class="absolute bg-green-500 text-slate-50 px-2 py-3 text-xl rounded-sm right-0 bottom-0">{{ session()->get('flashMessage')}}</p>
@endif

<x-admin.template :user="$user">
    {{-- show create form --}}
    <div class="createForm s text-gray-600 mt-5 px-3 py-2">
       <div class="py-2 px-4 lg:px-0">
            <h3 class="text-center mb-5 text-xl">Create Promotion</h3>
            <form action="/admin/promotion/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="content text-gray-200">Content</label>
                    <textarea name="content" id="content" rows="5" class="resize-none outline-none w-full p-2" placeholder="write your content..."></textarea>
                </div>
                @error('content')
                    <p class="text-red-400">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    <label for="file" class="cursor-pointer mt-7 underline hover:text-gray-800 duration-200">Choose a Image</label>
                    <input type="file" name="image" id="file" class="promotionFile hidden">
                </div>
                @error('image')
                    <p class="text-red-400">{{ $message }}</p>
                @enderror
                <div class="showImage py-2 px-3 hidden">
                    <img src="" alt="promotionImage">
                </div>
                <button type="submit" class="bg-gray-700 text-white hover:bg-gray-800 duration-150 px-3 py-2 border-0 rounded mt-3">Create</button>
            </form>
       </div>
    </div>
</x-admin.template>

