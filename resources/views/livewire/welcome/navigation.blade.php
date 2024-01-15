<div class="">
    @auth
    <a href="{{ url('/dashboard') }}" class="text-sm font-semibold leading-6 text-gray-900" wire:navigate>Dashboard</a>
    @else
    <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900" wire:navigate>Log in</a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}" class="ms-4 text-sm font-semibold leading-6 text-gray-900" wire:navigate>Register</a>
    @endif
    @endauth
</div>
