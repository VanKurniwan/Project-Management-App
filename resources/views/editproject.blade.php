<x-layout>

    <x-slot:count>{{ $count }}</x-slot:count>

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="mx-auto max-w-4xl px-4 2xl:px-0">
            <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
                <h2 class="mt-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">
                    {{ $title . ' "' . $project->title . '"' }}
                </h2>
            </div>

            <section class="bg-white dark:bg-gray-900">
                <div class="max-w-4xl px-4 pb-4 mx-auto">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Update product</h2>
                    <form method="POST" enctype="multipart/form-data" action="/updateproject/{{ $project->slug }}"
                        id="editprojectform">
                        @csrf
                        <div class="grid gap-4 mb-4 sm:grid-cols-6 sm:gap-6 sm:mb-5">
                            <div class="sm:col-span-5">
                                <label for="title"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Project Title
                                </label>
                                <input type="text" name="title" id="title"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ $project->title }}" placeholder="Type Project Title">
                            </div>
                            <div class="sm:col-span-1">
                                <label for="priorityrank"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Priority Rank
                                </label>
                                <select id="priorityrank" name="priorityrank"
                                    class="text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    @if ($count > 0)
                                        @for ($i = 1; $i <= $count; $i++)
                                            @if ($i == $project->priorityrank)
                                                <option value="{{ $i }}" selected="">{{ $i }}
                                                </option>
                                            @else
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endif
                                        @endfor
                                        <option value="{{ $count + 1 }}">{{ $count + 1 }}</option>
                                    @else
                                        <option value="1" selected="">1</option>
                                    @endif
                                </select>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Status
                                </label>
                                <select id="status" name="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected="" value="{{ $project->status->id }}" hidden>
                                        {{ $project->status->name }}
                                    </option>
                                    <option value="1">Planned</option>
                                    <option value="2">WIP</option>
                                    <option value="3">Done</option>
                                </select>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="difficulty"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Difficulty
                                </label>
                                <select id="difficulty" name="difficulty"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected="" value="{{ $project->difficulty->id }}" hidden>
                                        {{ $project->difficulty->name }}
                                    </option>
                                    <option value="1">Easy</option>
                                    <option value="2">Medium</option>
                                    <option value="3">Hard</option>
                                </select>
                            </div>

                            <div class="sm:col-span-6">
                                <div class="flex justify-between">
                                    <label for="techstack"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Technology Stack
                                    </label>
                                    <label for="techstack"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-300">
                                        Example : html, css, javascript
                                    </label>
                                </div>
                                <input type="text" name="techstack" id="techstack"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type with lowercase separated by coma (,)"
                                    value="{{ $project->techstack }}" required="">
                            </div>

                            <div class="sm:col-span-6">
                                <label for="gitrepositorylink"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Git Repository Link
                                </label>
                                <input type="url" name="gitrepo" id="gitrepositorylink"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Paste Git Repository Link here"
                                    value="{{ $project->gitrepo == 'empty' ? '' : $project->gitrepo }}">
                            </div>

                            <div class="sm:col-span-6">
                                <div class="flex justify-between">
                                    <label for="projecticon"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Upload Project Icon
                                    </label>
                                    <label for="projecticon"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-300">
                                        Recommended icon is SVG
                                    </label>
                                </div>
                                <input type="file" name="icon" id="projecticon"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    accept="image/*, svg" placeholder="Upload Project Icon (Optional)">
                            </div>

                            <div class="sm:col-span-6">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Description
                                </label>
                                <textarea id="description" rows="4" name="description"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type project description here" required="">{{ $project->description }}
                                </textarea>
                            </div>
                        </div>
                        <div class="flex flex-row justify-center items-center">
                            <button type="submit" id="editprojectbtn"
                                class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Update Project
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </main>


</x-layout>
