@props(['count'])
<div id="defaultModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">

        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">

            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create new Project
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <form method="POST" enctype="multipart/form-data" action="/createproject" id="createprojectformmodal">
                @csrf
                <div class="grid gap-4 mb-4 sm:grid-cols-6">

                    <div class="sm:col-span-5">
                        <label for="projecttitle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Project Title
                        </label>
                        <input type="text" name="title" id="projecttitle"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type project title" name="title" required="">
                    </div>

                    <div class="sm:col-span-1 text-center">
                        <label for="priorityrank" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Priority Rank
                        </label>
                        <select id="priorityrank" name="priorityrank"
                            class="text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required>
                            @if ($count > 0)
                                @for ($i = 1; $i <= $count; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                                <option value="{{ $count + 1 }}" selected="">{{ $count + 1 }}</option>
                            @else
                                <option value="1" selected="">1</option>
                            @endif
                        </select>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Status
                        </label>
                        <select id="status" name="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required>
                            <option selected="" value="" disabled hidden>Select Project Status</option>
                            <option value="1">Planned</option>
                            <option value="2">WIP</option>
                            <option value="3">Done</option>
                        </select>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="difficulty" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Difficulty
                        </label>
                        <select id="difficulty" name="difficulty"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required>
                            <option selected="" value="" disabled hidden>Select Project Difficulty</option>
                            <option value="1">Easy</option>
                            <option value="2">Medium</option>
                            <option value="3">Hard</option>
                        </select>
                    </div>

                    <div class="sm:col-span-6">
                        <div class="flex justify-between">
                            <label for="techstack" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Technology Stack
                            </label>
                            <label for="techstack"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-300">
                                Example : html, css, javascript
                            </label>
                        </div>
                        <input type="text" name="techstack" id="techstack"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type with lowercase separated by coma (,)" required="">
                    </div>

                    <div class="sm:col-span-6">
                        <label for="gitrepositorylink"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Git Repository Link
                        </label>
                        <input type="url" name="gitrepo" id="gitrepositorylink"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Paste Git Repository Link here">
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
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Description
                        </label>
                        <textarea id="description" rows="4" name="description"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type project description here" required=""></textarea>
                    </div>

                </div>
                <div class="flex flex-row justify-center items-center">
                    <button type="submit" id="createprojectbtn"
                        class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add new project
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
