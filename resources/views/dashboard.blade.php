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
                    <a href="{{ route('task.create') }}" class="btn link-primary text-white">Create Task</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="table">
                      <!-- head -->
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Title</th>
                          <th>Status</th>
                          <th>Due Date</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $task->title }}</td>
                            <td>

                                @if ($task->status == 'pending')
                                <div class="badge bg-red-800">{{$task->status}}</div>

                                @else
                                <div class="badge bg-green-800">{{$task->status}}</div>
                                @endif

                            </td>
                            <td>{{ $task->due_date }}</td>
                            <td>
                            <a href="{{ route('task.edit', [$task,]) }}" class="btn btn-success text-white btn-sm">Show / Edit</a>
                            </td>
                          </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                  <div class="flex">
                    {{ $tasks->links() }}
                  </div>
            </div>
        </div>
    </div>
</x-app-layout>
