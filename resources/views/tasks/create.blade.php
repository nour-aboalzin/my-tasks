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
                    <form action="{{ route('task.store') }}" method="POST">
                        @csrf
                        <input type="text" placeholder="Title" name="title" class="input input-bordered w-full max-w-xs" />
                <div class="w-full my-3">
                        <input type="date" placeholder="Due Date" name="due_date" class="input input-bordered w-full max-w-xs" />
                </div>
                        <textarea class="textarea textarea-bordered w-full max-w-xs" placeholder="Description" name="description"></textarea>

                <div class="w-full my-2">
                        <button class="btn btn-success text-white">Success</button>
                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
