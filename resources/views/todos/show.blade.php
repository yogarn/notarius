<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('todos.index') }}"
                class="text-gray-500 dark:text-gray-300 hover:text-gray-600 dark:hover:text-gray-400 me-2">
                <svg class="h-6 w-6 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Show Todos') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="grid grid-cols-1 gap-6">
            <div class="relative bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-2 {{ $todo->isCompleted ? 'line-through' : '' }}">
                        {{ $todo->title }}</h3>
                    <p class="text-sm">{{ $todo->detail }}</p>
                </div>
                <div class="absolute top-2 right-2">
                    <form
                        action="{{ $todo->isCompleted ? route('todos.uncomplete', $todo) : route('todos.complete', $todo) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="text-blue-500 hover:text-blue-700">
                            {!! $todo->isCompleted
                                ? '<svg class="h-8 w-8 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <path d="M9 12l2 2l4 -4" /></svg>'
                                : '<svg class="h-8 w-8 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" /></svg>' !!}
                        </button>
                    </form>
                </div>
                <!-- Priority -->
                <div class="p-6 border-t border-gray-200 dark:text-white-200 dark:border-gray-700">
                    <h4 class="text-gray-500 text-md font-semibold mb-2">Priority</h4>
                    <p class="text-lg dark:text-gray-200">
                        {{ $priorityLabels[$todo->priority] }}</p>
                    </p>
                </div>
                <!-- Scheduled -->
                <div class="p-6 border-t border-gray-200 dark:text-white-200 dark:border-gray-700">
                    <h4 class="text-gray-500 text-md font-semibold mb-2">Scheduled</h4>
                    @if ($todo->scheduled)
                        <p class="text-lg dark:text-gray-200">
                            {{ \Carbon\Carbon::parse($todo->scheduled)->format('M d, Y H:i A') }}
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                            {{ \Carbon\Carbon::parse($todo->scheduled)->diffForHumans() }}
                        </p>
                    @else
                        <p class="text-lg dark:text-gray-200">Not scheduled</p>
                    @endif
                </div>
                <!-- Due -->
                <div class="p-6 border-t border-gray-200 dark:text-white-200 dark:border-gray-700">
                    <h4 class="text-gray-500 text-md font-semibold mb-2">Due</h4>
                    @if ($todo->due)
                        <p class="text-lg dark:text-gray-200">
                            {{ \Carbon\Carbon::parse($todo->due)->format('M d, Y H:i A') }}
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                            {{ \Carbon\Carbon::parse($todo->due)->diffForHumans() }}
                        </p>
                    @else
                        <p class="text-lg dark:text-gray-200">No due date</p>
                    @endif
                </div>
                <!-- Created At -->
                <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                        Created {{ $todo->created_at->diffForHumans() }}
                    </p>
                </div>
                <!-- Edit and Delete Buttons -->
                <div class="absolute bottom-2 right-2 flex">
                    <!-- Edit Button -->
                    <a href="{{ route('todos.edit', $todo) }}" class="mr-1">
                        <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                    </a>
                    <!-- Delete Button -->
                    <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>
                            <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path
                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                </path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
