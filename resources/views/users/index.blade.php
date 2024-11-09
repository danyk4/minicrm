<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
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
                    <a href="{{ route('users.create') }}" class="underline">Add new user</a>
                    <div class="px-3 py-4 flex justify-center">
                        <table class="w-full table-auto mt-4">
                            <thead>
                                <tr class="mb-4">
                                    <td class="font-bold">Fist Name</td>
                                    <td class="font-bold">Last Name</td>
                                    <td class="font-bold">Email</td>
                                    <td class="font-bold">Role</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr class="">
                                    <td class="">
                                        {{ $user->first_name }}
                                    </td>
                                    <td class="">
                                        {{ $user->last_name }}
                                    </td>
                                    <td class="">
                                        {{ $user->email }}
                                    </td>
                                    <td class="">
                                        user
                                    </td>
                                    <td class="">
                                        <button type="button"
                                                class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button
                                            type="button"
                                            class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
