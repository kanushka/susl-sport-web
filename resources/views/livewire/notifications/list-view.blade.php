<ul role="list" class="divide-y divide-gray-100 px-4">
    @forelse ($this->notifications as $notification)
    <li class="flex justify-between gap-x-6 py-5">
        <div class="flex min-w-0 gap-x-4">
            <div class="min-w-0 flex-auto">
                <p class="font-semibold leading-6 text-gray-900">
                    @if(isset($notification->data['type']))
                    {{$notification->data['type']}}
                    @else
                    {{$notification->type}}
                    @endif
                </p>
                <p class="leading-6 text-gray-900">
                    @if(isset($notification->data['message']))
                    {{$notification->data['message']}}
                    @endif
                </p>
            </div>
        </div>
        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
            <p class="mt-1 text-xs leading-5 text-gray-500"><time datetime="{{$notification->created_at}}">{{$notification->created_at}}</time></p>
        </div>
    </li>
    @empty
    <p class="leading-6 text-gray-600 text-center p-4">No new notifications</p>
    @endforelse
</ul>
