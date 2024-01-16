<form wire:submit="save" class="p-6 space-y-6">
    <div>
        <x-input-label for="name" :value="__('Event Title')" />
        <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div class="columns-2 mt-4">
        <!-- Sports -->
        <div class="">
            <x-input-label for="sports" :value="__('Sport')" />
            <select wire:model="sport_id" id="sports" name="sports" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                @foreach ($this->allSports as $sport)
                <option value="{{$sport->id}}">{{$sport->name}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('sport_id')" class="mt-2" />
        </div>
        <!-- Venue -->
        <div class="">
            <x-input-label for="venue" :value="__('Venue')" />
            <select wire:model="venue_id" id="venue" name="venue" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                @foreach ($this->allVenues as $venue)
                <option value="{{$venue->id}}">{{$venue->name}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('venue_id')" class="mt-2" />
        </div>
    </div>

    <div class="">
        <x-input-label for="photo" :value="__('Event Date')" />
        <x-text-input wire:model="photo" id="photo" class="block mt-1 w-full" type="file" name="photo" />
        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
    </div>

    <div class="">
        <x-input-label for="start_date" :value="__('Event Date')" />
        <x-text-input wire:model.blur="start_date" id="start_date" class="block mt-1 w-full" type="date" name="start_date" required />
        <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
    </div>
    
    <div class="">
        <x-input-label for="description" :value="__('Event Description')" />
        <div class="mt-2.5">
            <textarea wire:model="description" name="description" id="description" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button wire:loading.remove>{{ __('Save') }}</x-primary-button>
        <x-primary-button wire:loading>{{ __('Saving and Sending notifications...') }}</x-primary-button>

        <x-action-message class="me-3" on="profile-updated">
            {{ __('Saved and Send notifications to all subscribed users.') }}
        </x-action-message>
    </div>
</form>
