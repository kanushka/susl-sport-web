<x-layout>

    <div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32 h-[50vh]">
        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=focalpoint&fp-y=.8&w=2830&h=1500&q=80&blend=111827&sat=-100&exp=15&blend-mode=multiply" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center">
        <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl" aria-hidden="true">
            <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu" aria-hidden="true">
            <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-2xl py-32">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl capitalize">Contact Us</h2>
                <p class="mt-4 text-lg leading-8 text-gray-200">Get in touch effortlessly. We're just a click away for any inquiries or assistance!</p>
            </div>
        </div>
    </div>

    <div class="my-20 flex flex-col items-center">
        <dl class="mt-16 grid gap-10 grid-cols-1">
            <div class="flex flex-col-reverse items-center">
                <dt class="text-base leading-7 text-gray-800">Sabaragamuwa University of Sri Lanka, Rathnapura</dt>
                <dd class="text-2xl font-bold leading-9 tracking-tight text-gray-800">Address</dd>
            </div>
            <div class="flex flex-col-reverse items-center">
                <dt class="text-base leading-7 text-gray-800">+94 11 990 9939</dt>
                <dt class="text-base leading-7 text-gray-800">+94 77 998 6543</dt>
                <dd class="text-2xl font-bold leading-9 tracking-tight text-gray-800">Phone</dd>
            </div>
            <div class="flex flex-col-reverse items-center">
                <dt class="text-base leading-7 text-gray-800">suslsport@gmail.com</dt>
                <dd class="text-2xl font-bold leading-9 tracking-tight text-gray-800">Email</dd>
            </div>
        </dl>
    </div>

    <div class="isolate my-32">
        <h3 class="mt-4 text-3xl font-bold text-center tracking-tight text-indigo-600 uppercase">Send Message</h3>
        <livewire:messages.create-form />
    </div>
</x-layout>
