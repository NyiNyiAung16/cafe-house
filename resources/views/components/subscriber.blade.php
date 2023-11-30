<div class="subscriberContainer">
    <div class="lg:max-w-3xl mx-auto">
        <div class="mb-5 px-5">
            <h3 class="text-center text-2xl text-white mb-3">Subscribe For new products</h3>
            <p class="text-center text-white">If you subscribe, you will get a email when we will post a new product. Also subscribers can get discount three months a day. So get subscribe quickly as fast!!</p>
        </div>
        <form action="/subscribe" class="subscriberForm" method="POST">
            @csrf
            <div class="form-group">
                <input type="email"  name="email" class="input" placeholder="{{ auth()->user()->isSubscribe ? 'fill email to unsubscribe' : 'fill email to subscribe' }}">
                <label for="email" class="label text-yellow-400">Email</label>
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <button @class([
                'px-3 py-2 mt-4  duration-150 rounded text-white mx-auto block',
                'bg-yellow-500 hover:bg-yellow-600' => auth()->user()->isSubscribe,
                'bg-gray-700 hover:bg-gray-900' => !auth()->user()->isSubscribe
            ])>
                {{ auth()->user()->isSubscribe ? 'Unscbscribe' : 'Subscribe' }}
            </button>
        </form>
    </div>
</div>