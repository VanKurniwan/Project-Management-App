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
            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                {{-- FOREACH THIS LATER --}}
                @foreach ($projects as $project)
                    <x-projectcard :data="$project"></x-projectcard>
                @endforeach

            </div>

            {{ $projects->links() }}

        </div>
    </section>
</x-layout>
