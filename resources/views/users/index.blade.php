@extends('layouts.dashboard')

@section('content')
    <h2 class="text-2xl font-semibold text-gray-100 mb-4">Users</h2>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            @can('create', App\Models\User::class)
                <a href="{{ route('users.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create User
                </a>
            @endcan


            <table class="min-w-full divide-y divide-gray-200 mt-4">
                <thead>
                    <tr>
                        <th
                            class="px-6 py-3 bg-gray-900 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                            Name</th>
                        <th
                            class="px-6 py-3 bg-gray-900 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                            Email</th>
                        <th
                            class="px-6 py-3 bg-gray-900 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                            Department</th>
                        <th
                            class="px-6 py-3 bg-gray-900 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                            Designation</th>
                        <th
                            class="px-6 py-3 bg-gray-900 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                            Supervisor</th>

                        <th
                            class="px-6 py-3 bg-gray-900 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->department->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->designation->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->supervisor ? $user->supervisor->name : 'N/A' }}</td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">

                                @can('view', $user)
                                    <a href="{{ route('users.show', $user) }}"
                                        class="text-blue-600 hover:text-blue-900">View</a>
                                @endcan
                                @can('update', $user)
                                    <a href="{{ route('users.edit', $user) }}"
                                        class="ml-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                @endcan
                                @can('delete', $user)
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
