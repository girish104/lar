<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use \App\Models\Task;
use Illuminate\Support\Facades\Route;


// first redirect route ->

Route::get('/', function () {
    return redirect()->route('tasks.index');
});




// tasks page ->

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate(7)
    ]);
})->name('tasks.index');





// create task page  ->

Route::view('/tasks/create', 'create')->name('tasks.create');



// edit task ->

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', ['task' => $task]);
})->name('tasks.edit');



// show task -> 

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', ['task' => $task]);
})->name('tasks.show');



// create task data to DB  ->

Route::post('/tasks', function (TaskRequest $request) {

    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'task created successfully!');
})->name('tasks.store');



// update task -> 

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {

    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'task updated successfully!');
})->name('tasks.update');




// delete task ->


Route::delete('/tasks/{task}', function (Task $task) {

    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'task deleted successfully!');
})->name('tasks.destory');



// toggle task - Completed - Not Completed -> 

Route::put('tasks/{task}/toggle-complete', function (Task $task) {

    $task->toggleCompleted();

    return redirect()->back()->with('success', 'Task Updated Successfully');
})->name('tasks.toggle-complete');









Route::fallback(function () {
    return 'Still got somewhere!';
});
