<?php

use App\Models\Sport;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;


new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    // Additional fields
    public string $height = '';
    public string $weight = '';
    public string $gender = 'male';
    public string $dob = '';
    public $sports = [];
    public $allSports = [];

    public function mount(): void
    {
        $this->allSports = Sport::all();
        $this->dob = now()->subYears(20)->format('Y-m-d');
    }

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'height' => ['nullable', 'regex:/^\d+(\.\d{1,2})?$/'],
            'weight' => ['nullable', 'regex:/^\d+(\.\d{1,2})?$/'],
            'gender' => ['required', 'string'],
            'dob' => ['required', 'date'],
            'sports' => ['nullable', 'array'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $user->height = $this->height;
        $user->weight = $this->weight;
        $user->gender = $this->gender;
        $user->dob = $this->dob;
        $user->save();
        $user->sports()->sync($this->sports);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

<div>
    <form wire:submit="register">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="columns-2 mt-4">
            <!-- Gender -->
            <div class="">
                <x-input-label for="gender" :value="__('Gender')" />
                <div class="">
                    <select wire:model="gender" id="gender" name="gender" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            <!-- DOB -->
            <div class="">
                <x-input-label for="dob" :value="__('Birthday')" />
                <x-text-input wire:model="dob" id="dob" class="block mt-1 w-full" type="date" name="dob" required />
                <x-input-error :messages="$errors->get('dob')" class="mt-2" />
            </div>
        </div>

        <!-- Height n Weight -->
        <div class="columns-2 mt-4">
            <div>
                <x-input-label for="height" :value="__('Height (in)')" />
                <x-text-input wire:model="height" id="height" class="block mt-1 w-full" type="text" name="height" />
                <x-input-error :messages="$errors->get('height')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="weight" :value="__('Weight (kg)')" />
                <x-text-input wire:model="weight" id="weight" class="block mt-1 w-full" type="text" name="weight" />
                <x-input-error :messages="$errors->get('weight')" class="mt-2" />
            </div>
        </div>

        <!-- Sports -->
        <div class="mt-4">
            <x-input-label for="sports" :value="__('Favorite Sports')" />
            <select wire:model="sports" id="sports" name="sports" multiple class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                @foreach ($this->allSports as $sport)
                <option value="{{$sport->id}}">{{$sport->name}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('sports')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
