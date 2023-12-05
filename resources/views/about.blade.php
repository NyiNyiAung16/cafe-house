@props(['posts'])
<x-head></x-head>
<x-navbar></x-navbar>

@if (session()->has('flashMessage'))
    <p class="px-4 py-3 bg-green-400 text-white rounded absolute right-0 bottom-0">{{ session()->get('flashMessage')}} </p>
@endif


<div class="min-h-screen min-w-screen bg-slate-800 text-white py-3">
    <div class="lg:max-w-6xl mx-auto text-center mt-20">
        <h2 class="text-3xl inline-block border-b">About Our Website</h2>
        <div class="mt-5" style="letter-spacing: 1px">
            <p>We want to help people to buy coffee easily and for that we builded this website. It will help people to buy and drink whenever you are. We have a lot of products and add more products in the future. We also created analysing for products users drinks these days. I hope everyone likes it and also you can write reviews about the website.</p>
        </div>
    </div>
    <div class="border-t my-6"></div>
    @auth
        <x-review.create></x-review.create>
    @endauth
    <x-review.show :posts="$posts"></x-review.show>
</div>


<x-footer></x-footer>