<x-layout>
    {{-- mengirim variable count ke layout --}}
    <x-slot:count>{{ $count }}</x-slot:count>

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="mx-auto max-w-4xl px-4 2xl:px-0">
            <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
                <h2 class="mt-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">
                    {{ $title }}
                </h2>
            </div>
            <article
                class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">

                <header class="mb-4 lg:mb-6 not-format">
                    {{-- Title --}}
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $project->title }}
                    </h1>
                    {{-- mini detail --}}
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16" src="{{ URL('storage/' . $project->icon) }}" alt="Jese Leos">
                            <div>
                                <a href="#" rel="author"
                                    class="text-xl font-bold text-gray-900 dark:text-white">Jese
                                    Leos</a>
                                <p class="text-base text-gray-500 dark:text-gray-400">Graphic Designer, educator & CEO
                                    Flowbite</p>
                                <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate
                                        datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time></p>
                            </div>
                        </div>
                    </address>
                </header>

                <p>
                    <pre>{{ $project->description }}</pre>
                </p>
            </article>
        </div>
    </main>

</x-layout>
