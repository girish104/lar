<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Models\Task;

// Redirect root URL to tasks page
Route::redirect('/', '/tasks');

// Define routes with authentication middleware applied
Route::middleware('auth')->group(function () {
    // tasks page
    Route::get('/tasks', function () {
        $user = Auth::user();
        $tasks = Task::where('user_id', $user->id)->latest()->paginate(7);
        return view('index', [
            'tasks' => $tasks
        ]);
    })->name('tasks.index');
    // create task page
    Route::view('/tasks/create', 'create')->name('tasks.create');

    // edit task
    Route::get('/tasks/{task}/edit', function (Task $task) {
        return view('edit', ['task' => $task]);
    })->name('tasks.edit');

    // show task
    Route::get('/tasks/{task}', function (Task $task) {
        return view('show', ['task' => $task]);
    })->name('tasks.show');

    // create task data to DB
    Route::post('/tasks', function (\App\Http\Requests\TaskRequest $request) {
        $user = Auth::user();
        $task = $user->tasks()->create($request->validated());

        return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'task created successfully!');
    })->name('tasks.store');



    // update task
    Route::put('/tasks/{task}', function (Task $task, \App\Http\Requests\TaskRequest $request) {
        $task->update($request->validated());
        return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'task updated successfully!');
    })->name('tasks.update');

    // delete task
    Route::delete('/tasks/{task}', function (Task $task) {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'task deleted successfully!');
    })->name('tasks.destroy');

    // toggle task - Completed - Not Completed
    Route::put('tasks/{task}/toggle-complete', function (Task $task) {
        $task->toggleCompleted();
        return redirect()->back()->with('success', 'Task Updated Successfully');
    })->name('tasks.toggle-complete');
});

// Route for home (You may want to keep it outside the auth middleware)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Authentication routes
Auth::routes();
