@props(['data'])
<div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">

    {{-- Main Image Display --}}
    <div class="h-56 w-full">
        <a href="/projectdetail/{{ $data->slug }}">
            <img class="mx-auto h-full block rounded-md" src="{{ URL('storage/' . $data->icon) }}" alt="" />
        </a>
    </div>

    <div class="pt-6">

        {{-- Top Tag --}}
        <div class="pt-2 flex items-center justify-between gap-4">

            <div>
                {{-- Status --}}
                <span
                    class="me-2 rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-slate-50 dark:bg-{{ $data->status['color'] }}-{{ $data->status['palette'] }} dark:text-slate-50">
                    {{-- WIP --}}
                    {{ $data->status->name }}
                </span>

                <span class="text-slate-50"> | </span>

                {{-- Difficulty --}}
                <span
                    class="ms-1 rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-slate-50 dark:bg-{{ $data->difficulty['color'] }}-{{ $data->difficulty['palette'] }} dark:text-slate-50">
                    {{ $data->difficulty->name }}
                </span>
            </div>

            {{-- Action Button --}}
            <div class="flex items-center justify-end gap-1">
                <a href="/updateproject/{{ $data->slug }}" id="updateprojectbtn">
                    <button type="button" data-tooltip-target="tooltip-quick-look"
                        class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">
                            Edit
                        </span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                            height="24" fill="currentColor">
                            <path
                                d="M5 18.89H6.41421L15.7279 9.57627L14.3137 8.16206L5 17.4758V18.89ZM21 20.89H3V16.6473L16.435 3.21231C16.8256 2.82179 17.4587 2.82179 17.8492 3.21231L20.6777 6.04074C21.0682 6.43126 21.0682 7.06443 20.6777 7.45495L9.24264 18.89H21V20.89ZM15.7279 6.74785L17.1421 8.16206L18.5563 6.74785L17.1421 5.33363L15.7279 6.74785Z">
                            </path>
                        </svg>
                    </button>
                </a>

                <a href="/deleteproject/{{ $data->slug }}" class="deleteprojectbtn">
                    <button type="button" data-tooltip-target="tooltip-add-to-favorites"
                        class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">
                            Delete
                        </span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                            height="24" fill="currentColor">
                            <path
                                d="M7 4V2H17V4H22V6H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V6H2V4H7ZM6 6V20H18V6H6ZM9 9H11V17H9V9ZM13 9H15V17H13V9Z">
                            </path>
                        </svg>
                    </button>
                </a>
            </div>
        </div>

        {{-- Title --}}
        <a href="/projectdetail/{{ $data->slug }}"
            class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">
            {{-- 📝 Project Management App --}}
            {{ $data->title }}
        </a>

        {{-- Priority Rank --}}
        <div class="mt-2 flex items-center">
            <p class="text-sm font-semibold leading-tight text-gray-900 dark:text-slate-400">
                Priority Rank :
            </p>
            <span
                class="ms-1 rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-slate-50 dark:bg-sky-600 dark:text-slate-50">
                {{ $data->priorityrank }}
            </span>
        </div>

        {{-- Description --}}
        <p class="mt-2 text-sm dark:text-slate-500">
            {{ Str::limit($data->description, 85) }}
        </p>

        {{-- Tech Stack --}}
        <div class="mt-3 mb-2">

            @foreach ($data->techstack as $techstack)
                <span
                    class="me-2 rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-slate-50 dark:bg-{{ $techstack['color'] }}-{{ $techstack['palette'] }} dark:text-slate-50">
                    {{ $techstack['name'] }}
                </span>
            @endforeach

        </div>

        <a href="/projectdetail/{{ $data->slug }}" class="dark:text-blue-400 hover:underline">
            <span>
                Read more &raquo;
            </span>
        </a>
    </div>
</div>
