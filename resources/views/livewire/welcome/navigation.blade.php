<div class="">
    @auth
    <a href="{{ url('/dashboard') }}" class="text-sm font-semibold leading-6 text-gray-100 py-2 px-4 bg-gray-900 bg-opacity-25 rounded-full " wire:navigate>Dashboard</a>
    @else
    <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-100 py-2 px-4 bg-gray-900 bg-opacity-25 rounded-full " wire:navigate>Log in</a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}" class="ms-4 text-sm font-semibold leading-6 text-gray-100 py-2 px-4 bg-gray-900 bg-opacity-25 rounded-full" wire:navigate>Register</a>
    @endif
    @endauth
</div>
