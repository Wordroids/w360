<x-app-layout>

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Projects</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add Project Button -->
    <div class="mb-4">
        <a href="{{ route('projects.create') }}"
            class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
            Add New Project
        </a>
    </div>

    <!-- Projects Table -->
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">#</th>
                    <th scope="col" class="px-6 py-3">Project Name</th>
                    <th scope="col" class="px-6 py-3">Description</th>
                    <th scope="col" class="px-6 py-3">Visibility</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $project->project_name }}</td>
                        <td class="px-6 py-4">{{ Str::limit($project->description, 50) }}</td>
                        <td class="px-6 py-4 capitalize">{{ $project->visibility }}</td>
                        <td class="px-6 py-4 flex gap-2">
                            <a href="{{ route('projects.edit', $project->id) }}"
                                class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this project?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 dark:text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $projects->links('pagination::tailwind') }}
    </div>
</div>
</x-app-layout>