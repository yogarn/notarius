<x-app-layout>
    <div class="max-w-lg mx-auto py-6 px-4">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <h2
                class="font-semibold text-xl mb-4 px-6 py-4 bg-gray-200 dark:bg-gray-700 rounded-t-lg text-gray-700 dark:text-gray-300">
                Create new todo</h2>
            <form action="{{ route('todos.store') }}" method="POST" class="px-6 py-4">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Todo</label>
                    <textarea name="title" rows="2"
                        class="w-full px-3 py-2 placeholder-gray-500 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white border rounded-lg focus:outline-none focus:border-blue-500"
                        placeholder="Enter your todo here" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="detail"
                        class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Detail</label>
                    <textarea name="detail" id="content" rows="12"
                        class="w-full px-3 py-2 placeholder-gray-500 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white border rounded-lg focus:outline-none focus:border-blue-500"
                        placeholder="Enter your todo detail here"></textarea>
                </div>
                <div class="mb-4">
                    <label for="priority"
                        class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Priority</label>
                    <select name="priority"
                        class="w-full px-3 py-2 placeholder-gray-500 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white border rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="0">Very Low</option>
                        <option value="1">Low</option>
                        <option value="2">Medium</option>
                        <option value="3">High</option>
                        <option value="4">Very High</option>
                        <option value="5">Urgent</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="scheduled"
                        class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Scheduled</label>
                    <input type="datetime-local" name="scheduled"
                        class="w-full px-3 py-2 placeholder-gray-500 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white border rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="due" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Due</label>
                    <input type="datetime-local" name="due"
                        class="w-full px-3 py-2 placeholder-gray-500 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white border rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('todos.index') }}"
                        class="mr-2 px-4 py-2 text-gray-700 bg-gray-200 border border-gray-300 rounded-md hover:bg-gray-300">Cancel</a>
                    <button type="submit"
                        class="px-4 py-2 text-white bg-gray-600 rounded-md hover:bg-gray-700">Create</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
