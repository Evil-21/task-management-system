<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all(); // get all the records from the database
        return view('task.index', ['tasks' => $tasks]); // redirect to the listing page
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create'); // redirect to the task create page
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $validatedData = $request->validated(); // validate form requests

        $task = Task::create($validatedData); // save records for task in database

        return redirect()->route('tasks.index')->with('success', 'The task has been successfully created.');  // redirect
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id); // find task by it's id
        return view('task.show', ['task' => $task]); // redirect to the details page
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id); // find task by it's id
        // dd($task);
        return view('task.edit', ['task' => $task]); // redirect to the edit page
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTaskRequest $request, string $id)
    {
        $task = Task::find($id);
        $validatedData = $request->validated(); // validate form requests

        $task->update($validatedData); // save records for task in database
        return redirect()->route('tasks.index')->with('success', 'The task has been successfully updated.');  // redirect
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id); // find task by it's id
        $task->delete(); // delete the task from the database
        return redirect()->route('tasks.index')->with('success', 'The task has been successfully deleted.');  // redirect
    }

    public function changeStatus(Request $request, $id){
        $task = Task::find($id);
        $task->update(['is_completed' => !$task->is_completed]);

        return response()->json(['status' => 'success', 'task' => $task]);
    }
}
