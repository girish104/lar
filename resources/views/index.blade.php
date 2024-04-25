@extends('layouts.app')

@section('title')
    <div class="font-bold text-2xl text-yellow-400">the list of tasks -></div>
@endsection


@section('content')
    @forelse ($tasks as $task)
        <div class="flex items-center mb-2">
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                class="flex-grow mb-2 text-sm border border-black-700 shadow-sm hover:bg-gray-100 hover:text-black
       py-1 px-3 rounded-md {{ $task->completed ? 'line-through' : '' }}">
                {{ $task->title }}
            </a>
        </div>
    @empty
        <div>there are no tasks!</div>
    @endforelse



    <nav class="mt-4">
        <a href="{{ route('tasks.create') }}" class="link text-white">Create a new task</a>
    </nav>


    @if ($tasks->count())
        <br>
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
