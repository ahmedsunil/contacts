<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to {{ config('app.name') }}</title>

    <!-- Load Tailwind CSS -->
    @filamentStyles
    @vite('resources/css/app.css')
</head>
<body class="antialiased bg-gray-100">
<nav
    class="bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 filament-navbar fixed top-0 left-0 right-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('contact') }}" class="text-xl font-bold text-gray-800 dark:text-white">
                        {{ config('app.name') }}
                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">

                </div>
            </div>
            <div class="flex items-center">
                <!-- Search Bar -->
                <div class="flex-1 flex items-center justify-center px-2 lg:ml-6 lg:justify-end">
                    <div class="max-w-lg w-full lg:max-w-xs">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <form action="{{ route('contact') }}" method="GET">
                                <input id="search" name="search"
                                       class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white dark:bg-gray-700 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-white"
                                       placeholder="Search" type="search">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Login Button -->
                <div class="ml-4 flex items-center md:ml-6">
                    <a href="/admin/login" target="_blank"
                       class="filament-button filament-button-size-md inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset dark:focus:ring-offset-0 min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700 bg-gray-600 hover:bg-gray-700 transition-duration-300  ">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:pt-24 md:pt-24">
    <!-- Your main content goes here -->
    <div class="hidden sm:block ">
        <table class="min-w-full leading-normal">
            <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Name
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Grade
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Index
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Parent Name
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Email
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Contact Number
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex items-center">
                            <div class="ml-3">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $student->name }}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $student->grade }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $student->index }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $student->parent_name }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $student->email }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="tel:{{ $student->contact_number }}"
                           class="text-blue-600 hover:text-blue-800 whitespace-no-wrap">
                            {{ $student->contact_number }}
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <!-- Cards for smaller screens -->
    <div class="sm:hidden pt-24">
        @foreach($students as $student)
            <div class="bg-white shadow-md rounded-lg overflow-hidden mb-4">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ $student->name }}
                    </h3>
                    <div class="mt-2 max-w-xl text-sm text-gray-500">
                        <p><span class="font-semibold">Grade:</span> {{ $student->grade }}</p>
                        <p><span class="font-semibold">Index:</span> {{ $student->index }}</p>
                        <p><span class="font-semibold">Parent:</span> {{ $student->parent_name }}</p>
                        <p><span class="font-semibold">Email:</span> {{ $student->email }}</p>
                        <p>
                            <span class="font-semibold">Contact:</span>
                            <a href="tel:{{ $student->contact_number }}" class="text-blue-600 hover:text-blue-800">
                                {{ $student->contact_number }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                <span class="text-xs xs:text-sm text-gray-900">
                    Showing 1 to 4 of 50 Entries
                </span>
        <div class="inline-flex mt-2 xs:mt-0">
            <button class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l">
                Prev
            </button>
            <button class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">
                Next
            </button>
        </div>
    </div>
</div>


@filamentScripts
@vite('resources/js/app.js')
</body>
</html>
