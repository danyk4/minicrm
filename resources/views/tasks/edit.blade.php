<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('tasks.update', $task) }}">
                        @method('PUT')
                        @csrf

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')"/>
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $task->title)" required autofocus autocomplete="title"/>
                            <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                        </div>

                        <!-- Description -->
                        <div>
                            <x-input-label for="description" :value="__('Description')"/>
                            <textarea id="description" class="block mt-1 w-full border-gray-300" type="text" name="description" required autofocus autocomplete="description">{{  old('description', $task->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                        </div>

                        <!-- Assigned User -->
                        <div class="mt-4">
                            <x-input-label for="user_id" :value="__('Assigned User')"/>
                            <select class="block mt-1 w-full" name="user_id">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" @selected(old('user_id', $task->user_id) == $user->id)>{{ $user->first_name . ' ' . $user->last_name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('user_id')" class="mt-2"/>
                        </div>

                        <!-- Client -->
                        <div class="mt-4">
                            <x-input-label for="client_id" :value="__('Client')"/>
                            <select class="block mt-1 w-full" name="client_id">
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}" @selected(old('client_id', $task->client_id) == $client->id)>{{ $client->company_name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('client_id')" class="mt-2"/>
                        </div>

                        <!-- Project -->
                        <div class="mt-4">
                            <x-input-label for="project_id" :value="__('Project')"/>
                            <select class="block mt-1 w-full" name="project_id">
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}" @selected(old('project_id', $task->project_id) == $project->id)>{{ $project->title }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('project_id')" class="mt-2"/>
                        </div>

                        <!-- Deadline At -->
                        <div class="mt-4">
                            <x-input-label for="deadline_at" :value="__('Deadline At')"/>
                            <x-text-input id="deadline_at" class="block mt-1 w-full" type="date" name="deadline_at" :value="old('deadline_at', $task->deadline_at)" required autocomplete="deadline_at"/>
                            <x-input-error :messages="$errors->get('deadline_at')" class="mt-2"/>
                        </div>

                        <!-- Status -->
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Status')"/>
                            <select class="block mt-1 w-full" name="status">
                                @foreach(\App\Enums\TaskStatus::cases() as $status)
                                    <option value="{{ $status->value }}" @selected(old('status', $task->status->value) == $status->value)>{{ $status }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2"/>
                        </div>

                        <x-primary-button class="mt-4">
                            {{ __('Save') }}
                        </x-primary-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
