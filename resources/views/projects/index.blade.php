<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('success'))
                    <div class="py-4 px-6 bg-emerald-200 text-center">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="p-6 text-gray-900">
                    <a href="{{ route('projects.create') }}" class="underline">Add new project</a>
                    <div class="px-3 py-4 flex justify-center">
                        <table class="w-full table-auto mt-4">
                            <thead>
                                <tr class="mb-4">
                                    <td class="font-bold">Title</td>
                                    <td class="font-bold">Assigned To</td>
                                    <td class="font-bold">Client</td>
                                    <td class="font-bold">Deadline</td>
                                    <td class="font-bold">Status</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                    <tr class="">
                                        <td class="">
                                            {{ $project->title }}
                                        </td>
                                        <td class="">
                                            {{ $project->user->first_name }} {{ $project->user->last_name }}
                                        </td>
                                        <td class="">
                                            {{ $project->client->company_name }}
                                        </td>
                                        <td class="">
                                            {{ $project->deadline_at }}
                                        </td>
                                        <td class="">
                                            {{ $project->status }}
                                        </td>
                                        <td class="">
                                            <a href="{{ route('projects.edit', $project) }}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
                                            <form method="POST" action="{{ route('projects.destroy', $project) }}" onsubmit="return confirm('Are you sure?')" class="inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="mt-4">
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
