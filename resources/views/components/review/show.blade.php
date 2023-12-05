@props(['posts'])

<div class="lg:max-w-2xl mx-auto mt-8">
    @foreach ($posts as $post)
        <div class="p-2 bg-slate-700 rounded my-3">
            <div class="flex items-center justify-between px-2">
                <div class="flex gap-1 items-center">
                    <img src="{{ $post->user->image }}" alt="reviewimg" width="30">
                    <span>{{$post->user->name}}</span>
                </div>
                <div class="flex gap-2 items-center">
                    @if ($post->user->id === auth()->id())
                    <form action="/review/destroy/{{$post->id}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">
                            <i class="fa-solid fa-trash text-red-500 cursor-pointer mt-1"></i>
                        </button>
                    </form>
                    <i class="fa-solid fa-edit text-blue-500 cursor-pointer"></i>
                    @endif
                </div>
            </div>
            <p class="mt-4 mb-1 px-2">{{ $post->body }}</p>
        </div>
    @endforeach
</div>