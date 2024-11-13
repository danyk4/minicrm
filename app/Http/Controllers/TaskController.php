<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['user', 'client', 'project'])->paginate(20);

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users    = User::select(['id', 'first_name', 'last_name'])->get();
        $clients  = Client::select(['id', 'company_name'])->get();
        $projects = Project::select(['id', 'title'])->get();

        return view('tasks.create', compact('users', 'clients', 'projects'));
    }

    public function store(StoreTaskRequest $request)
    {
        Task::create($request->validated());

        return redirect(route('tasks.index'))->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        //
    }

    public function edit(Task $task)
    {
        $users    = User::select(['id', 'first_name', 'last_name'])->get();
        $clients  = Client::select(['id', 'company_name'])->get();
        $projects = Project::select(['id', 'title'])->get();

        return view('tasks.edit', compact('task', 'users', 'clients', 'projects'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect(route('tasks.index'))->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        Gate::authorize(PermissionEnum::DELETE_TASKS->value);

        $task->delete();

        return redirect(route('tasks.index'))->with('success', 'Task deleted successfully.');
    }
}
