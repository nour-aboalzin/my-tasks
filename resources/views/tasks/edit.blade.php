<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="toast toast-end">
                        @if (@session()->has('success'))
                        <div class="alert alert-success">
                          <span class="text-white font-bold capitalize">{{session('success')}}</span>
                        </div>
                        @endif
                    </div>
                    <form action="{{ route('task.update', $task) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input value="{{ old('title', $task->title) }}" type="text" placeholder="Title" name="title" class="input input-bordered w-full max-w-xs"/>
                    @error('title')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                <div class="w-full my-3">
                    <input value="{{ old('due_date', $task->due_date) }}" type="date" placeholder="Due Date" name="due_date" class="input input-bordered w-full max-w-xs"/>
                    @error('due_date')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full my-3">
                    <select class="select select-bordered w-full max-w-xs" name="status">
                        <option disabled selected>Status</option>
                        @foreach ($statuses as $status)
                        <option @selected($status->value == $task->status) value="{{ $status->value }}">{{ $status->value }}</option>
                        @endforeach
                      </select>
                    @error('status')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                    <textarea class="textarea textarea-bordered w-full max-w-xs" placeholder="Description" name="description">{{ old('description', $task->description) }}</textarea>
                    @error('description')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                <div class="w-full my-2">
                        <button class="btn btn-success text-white">Save</button>
                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
