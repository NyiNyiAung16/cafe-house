<x-head></x-head>
<x-navbar></x-navbar>
<x-banner></x-banner>
<x-carousel></x-carousel>
<x-about-coffee></x-about-coffee>
<x-coffee-lists></x-coffee-lists>
<x-analysis></x-analysis>
<x-subscriber></x-subscriber>
<x-contact></x-contact>
<x-footer></x-footer>

@if (session()->has('flashMessage'))
    <p class="px-4 py-3 bg-green-400 text-white rounded absolute right-0 bottom-0">{{ session()->get('flashMessage')}} </p>
@endif
