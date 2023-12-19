{{-- <div class=" text-center">
    <button class=" inline-block px-3 py-2 bg-gray-700 rounded hover:bg-gray-600 duration-200" id="showReviewForm">WriteReviews</button>
</div> --}}
<div class="lg:max-w-xl mx-auto mt-7" id="reviewForm">
    <form action="/review/store" method="POST">
        @csrf
        <label for="review">Review</label>
        <textarea name="body" id="review" class="w-full p-2 rounded-sm outline-none resize-none text-black bg-slate-100" rows="4"></textarea>
        @error('body')
            <p class="text-sm text-red-500 my-1">{{ $message }}</p>
        @enderror
        <button type="submit" class="px-3 py-2 text-sm rounded bg-gray-600 hover:bg-gray-700 duration-200">Submit</button>
    </form>
</div>