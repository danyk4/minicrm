<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
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
                    <a href="{{ route('clients.create') }}" class="underline">Add new client</a>
                    <div class="px-3 py-4 flex justify-center">
                        <table class="w-full table-auto mt-4">
                            <thead>
                                <tr class="mb-4">
                                    <td class="font-bold">Company</td>
                                    <td class="font-bold">VAT</td>
                                    <td class="font-bold">Address</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                    <tr class="">
                                        <td class="">
                                            {{ $client->company_name }}
                                        </td>
                                        <td class="">
                                            {{ $client->company_vat }}
                                        </td>
                                        <td class="">
                                            {{ $client->company_address }}
                                        </td>
                                        <td class="">
                                            <a href="{{ route('clients.edit', $client) }}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
                                            @can(\App\Enums\PermissionEnum::DELETE_CLIENTS->value)
                                                <form method="POST" action="{{ route('clients.destroy', $client) }}" onsubmit="return confirm('Are you sure?')" class="inline-block">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="mt-4">
                        {{ $clients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
