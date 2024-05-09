<x-app-layout>
    <div class="max-w-lg mx-auto my-6 px-4">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <h2
                class="font-semibold text-xl mb-4 px-6 py-4 bg-gray-200 dark:bg-gray-700 rounded-t-lg text-gray-700 dark:text-gray-300">
                Create new note</h2>
            <form action="{{ route('notes.store') }}" method="POST" class="px-6 py-4">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Title</label>
                    <textarea name="title" rows="3"
                        class="w-full px-3 py-2 placeholder-gray-500 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white border rounded-lg focus:outline-none focus:border-blue-500"
                        placeholder="Enter your note here" required></textarea>
                </div>
                <div class="mb-6">
                    <label for="content"
                        class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Content</label>
                    <textarea name="content" id="content" rows="15"
                        class="w-full px-3 py-2 placeholder-gray-500 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white border rounded-lg focus:outline-none focus:border-blue-500"
                        placeholder="Enter your content here" required></textarea>
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('notes.index') }}"
                        class="mr-2 px-4 py-2 text-gray-700 bg-gray-200 border border-gray-300 rounded-md hover:bg-gray-300">Cancel</a>
                    <button type="submit"
                        class="px-4 py-2 text-white bg-gray-600 rounded-md hover:bg-gray-700">Create</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
