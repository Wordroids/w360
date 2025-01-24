<x-app-layout>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Edit Project</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.update', $project->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PATCH')

        <!-- Project Name -->
        <div>
            <label for="project_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Project Name
            </label>
            <input type="text" name="project_name" id="project_name" value="{{ old('project_name', $project->project_name) }}"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:text-gray-200" required>
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Description
            </label>
            <textarea name="description" id="description" rows="5"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:text-gray-200" required>{{ old('description', $project->description) }}</textarea>
        </div>

        <!-- Visibility -->
        <div>
            <label for="visibility" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Visibility
            </label>
            <select name="visibility" id="visibility"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:text-gray-200">
                <option value="public" {{ $project->visibility === 'public' ? 'selected' : '' }}>Public</option>
                <option value="private" {{ $project->visibility === 'private' ? 'selected' : '' }}>Private</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                Update Project
            </button>
        </div>
    </form>
</div>
</x-app-layout>