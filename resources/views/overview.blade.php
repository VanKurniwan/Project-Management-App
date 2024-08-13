<x-layout>

    {{-- mengirim variable count ke layout --}}
    <x-slot:count>{{ $count }}</x-slot:count>

    <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
                <h2 class="mt-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">
                    {{ $title }}
                </h2>
            </div>
        </div>

        {{-- CONTENT --}}
        <div class="mb-3 flex justify-center max-w-screen-2xl">
            <img src="{{ URL('storage/' . $overview->icon) }}" class="rounded-md">
        </div>
        <h2 class="text-center text-white">
            {{ $overview->title }}
        </h2>
        <h2 class="text-center text-white">
            {{ $overview->description }}
        </h2>

    </section>
</x-layout>
