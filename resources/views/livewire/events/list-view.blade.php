<div class="mx-auto mt-4 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
    @forelse ($this->events as $event)
    <article class="flex max-w-xl flex-col items-start justify-between bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
    
    @if($event->image)
        <div class="flex-shrink-0">
            <img class="h-48 w-full object-cover mb-4" src="{{asset('storage/' . $event->image)}}" alt="">
        </div>
    @endif
    
    <div class="flex items-center gap-x-4 text-xs">
            <time datetime="2020-03-16" class="text-gray-500">{{ \Carbon\Carbon::parse($event->created_at)->format('M d, Y') }}</time>
            <a href="#" class="relative z-10 rounded-full bg-indigo-50 px-3 py-1.5 font-medium text-indigo-600 hover:bg-gray-100">{{$event->sport->name}}</a>
        </div>
        <div class="group relative">
            <h3 class="mt-2 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                <a href="#">
                    <span class="absolute inset-0"></span>
                    {{$event->name}}
                </a>
            </h3>
            <p class="mt-4 line-clamp-3 text-sm leading-6 text-gray-600">{{$event->description}}</p>
        </div>
        @if($event->venue)
        <div class="mt-2 flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
            </svg>
            <p class="mt-1 line-clamp-3 text-sm leading-6 text-gray-600">{{$event->venue->name}}</p>
        </div>
        @endif

    </article>
    @empty
    <p class="leading-6 text-gray-600 text-center p-4">No new events</p>
    @endforelse
</div>
