@props(['lists'])


<div class="analysisContainer bg-gray-900 py-5 text-white">
    
    <h3 class="text-center text-2xl">Analysis for people drinks these days.</h3>
    
    <div class="analysis w-[700px] mx-auto mt-10">
        @foreach ($lists as $list)  
        <div class="mb-8">
            <p>{{$list->coffee_name}}</p>
            <div class="progress w-full">
                <div
                    @class([
                        'progress-bar',
                        'rounded-sm',
                        'h-[4px]',
                        'bg-blue-500' => $loop->iteration === 1,
                        'bg-orange-500' => $loop->iteration === 2,
                        'bg-green-500' => $loop->iteration === 3,
                        'bg-pink-500' => $loop->iteration === 4,
                        'bg-yellow-500' => $loop->iteration === 5
                        ]) 
                    style="width:{{$list->count}}%">
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>