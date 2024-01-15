<ul role="list" class="divide-y divide-gray-100 px-4">
    @forelse ($this->messages as $message)
    <li class="flex justify-between gap-x-6 py-5">
        <div class="flex min-w-0 gap-x-4">
            <div class="min-w-0 flex-auto">
                <p class="font-semibold leading-6 text-gray-900">{{$message->name}}</p>
                <p class="mt-3 leading-5 text-gray-500">{{$message->message}}</p>
            </div>
        </div>
        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
            <p class="leading-6 text-gray-900">{{$message->email}}</p>
            <p class="leading-6 text-gray-900">{{$message->phone}}</p>
            <p class="mt-1 text-xs leading-5 text-gray-500"><time datetime="{{$message->created_at}}">{{$message->created_at}}</time></p>
        </div>
    </li>
    @empty
    <p class="leading-6 text-gray-600 text-center p-4">No new messages</p>
    @endforelse
</ul>
