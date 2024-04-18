@extends('layouts.app')

@section('title')
    <div class="mb-4 text-lg">
        <a href="{{ route('tasks.index') }}" class="link"><- Go back to the task list!</a>
                </nav>
    </div>
    <div>
        {{ $task->title }}
    </div>
@endsection

@section('content')
    <p class="mb-4 text-white">{{ $task->description }}</p>

    @if ($task->long_description)
        <p class="mb-4 text-white">{{ $task->long_description }}</p>
    @endif
    <p class="mb-4 text-sm text-blue-500">Created {{ $task->created_at->diffForHumans() }} - Updated
        {{ $task->updated_at->diffForHumans() }} </p>
    </p>
    <p class="mb-4">

        @if ($task->completed)
            <span class="font-medium text-green-500">
                Completed
            </span>
        @else
            <span class="font-medium text-red-500">
                Not Completed
            </span>
        @endif
    </p>

    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn">Edit</a>

        <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn">Mark as {{ $task->completed ? 'not completed' : 'Completed' }}</button>
        </form>

        <form action="{{ route('tasks.destory', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete</button>
        </form>
    </div>
@endsection
