<form wire:submit="save" class="mx-auto mt-16 max-w-xl sm:mt-20">
    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">

        <div class="sm:col-span-2">
            <label for="venue" class="block text-sm font-semibold leading-6 text-gray-900">Venue</label>
            <select wire:model="venue_id" id="venue" name="venue" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                @foreach ($this->allVenues as $venue)
                <option value="{{$venue->id}}">{{$venue->name}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('venue_id')" class="mt-2" />
        </div>

        <div class="sm:col-span-2">
            <label for="date" class="block text-sm font-semibold leading-6 text-gray-900">Date</label>
            <div class="mt-2.5">
                <input wire:model.blur="start_date" type="date" name="date" id="date" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
            </div>
        </div>

        <div class="sm:col-span-2">
            <label for="attendees" class="block text-sm font-semibold leading-6 text-gray-900">Number of Attendees</label>
            <div class="mt-2.5">
                <input wire:model="attendees" type="text" name="attendees" id="attendees" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <x-input-error :messages="$errors->get('attendees')" class="mt-2" />
            </div>
        </div>

        <div class="sm:col-span-2">
            <label for="phone-number" class="block text-sm font-semibold leading-6 text-gray-900">Phone number</label>
            <div class="relative mt-2.5">
                <div class="absolute inset-y-0 left-0 flex items-center">
                    <label for="country" class="sr-only">Country</label>
                    <select id="country" name="country" class="h-full rounded-md border-0 bg-transparent bg-none py-0 pl-4 pr-9 text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                        <option>LK</option>
                    </select>
                    <svg class="pointer-events-none absolute right-3 top-0 h-full w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input wire:model="phone" type="text" name="phone-number" id="phone-number" autocomplete="tel" class="block w-full rounded-md border-0 px-3.5 py-2 pl-20 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <div class="sm:col-span-2">
            <label for="reason" class="block text-sm font-semibold leading-6 text-gray-900">Reason</label>
            <div class="mt-2.5">
                <textarea wire:model="reason" name="reason" id="reason" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                <x-input-error :messages="$errors->get('reason')" class="mt-2" />
            </div>
        </div>
    </div>

    <div class="mt-10">
        <button type="submit" wire:loading.remove class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Request</button>
        <button wire:loading class="block w-full rounded-md bg-gray-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Requesting Booking...</button>
    </div>

    @if (session('status') == 'booking-request-sent')
    <div class="mt-4 font-medium text-sm text-green-600 dark:text-green-400 text-center">
        {{ __('Your booking has been successfully send. Our one of representative will contact you soon.') }}
    </div>
    @endif
</form>
