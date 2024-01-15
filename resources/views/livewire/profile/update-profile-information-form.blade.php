<?php

use App\Models\Sport;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    public string $name = '';
    public string $email = '';
    // Additional fields
    public string $height = '';
    public string $weight = '';
    public string $gender = 'Male';
    public string $dob = '';
    public $sports = [];
    public $allSports = [];

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->height = Auth::user()->height;
        $this->weight = Auth::user()->weight;
        $this->dob = Auth::user()->dob;
        $this->gender = Auth::user()->gender;
        $this->sports = Auth::user()->sports->pluck('id')->toArray();
        $this->allSports = Sport::all();
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'height' => ['nullable', 'regex:/^\d+(\.\d{1,2})?$/'],
            'weight' => ['nullable', 'regex:/^\d+(\.\d{1,2})?$/'],
            'gender' => ['required', 'string'],
            'dob' => ['required', 'date'],
            'sports' => ['nullable', 'array'],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $path = session('url.intended', RouteServiceProvider::HOME);

            $this->redirect($path);

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-full" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button wire:click.prevent="sendVerification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
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

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
