<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Todos') }}
            </h2>
            <a href="{{ route('todos.create') }}"
                class="text-gray-500 dark:text-gray-300 hover:text-gray-600 dark:hover:text-gray-400">
                <svg class="h-6 w-6 text-slate-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        @foreach ($todos as $todo)
            <div class="relative bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <a href="{{ route('todos.show', $todo) }}" class="block">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-2 {{ $todo->isCompleted ? 'line-through' : '' }}">
                            {{ $todo->title }}</h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-4">
                            {{ $todo->due ? \Carbon\Carbon::parse($todo->due)->diffForHumans() : 'No due date'}}
                        </p>
                    </div>
                </a>
                <!-- Complete Button -->
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

                <!-- Edit and Delete Buttons -->
                <div class="absolute bottom-2 right-2 flex">
                    <!-- Edit Button -->
                    <a href="{{ route('todos.edit', $todo) }}" class="mr-1">
                        <svg class="h-6 w-6 text-slate-500" <svg width="24" height="24" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                        </svg>
                    </a>
                    <!-- Delete Button -->
                    <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>
                            <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="3 6 5 6 21 6" />
                                <path
                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                <line x1="10" y1="11" x2="10" y2="17" />
                                <line x1="14" y1="11" x2="14" y2="17" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
        <div class="mt-4">
            {{ $todos->links() }}
        </div>
    </div>
</x-app-layout>
