@extends('layouts.dashboard')

@section('content')
    <h2 class="text-2xl font-semibold text-gray-100 mb-4">User Details</h2>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <div class="mb-4">
                <strong class="text-gray-800">Name:</strong>
                <p class="text-gray-700">{{ $user->name }}</p>
            </div>
            <div class="mb-4">
                <strong class="text-gray-800">Email:</strong>
                <p class="text-gray-700">{{ $user->email }}</p>
            </div>
            <div class="mb-4">
                <strong class="text-gray-800">Department:</strong>
                <p class="text-gray-700">{{ $user->department->name }}</p>
            </div>
            <div class="mb-4">
                <strong class="text-gray-800">Designation:</strong>
                <p class="text-gray-700">{{ $user->designation->name }}</p>
            </div>
            <div class="mb-4">
                <strong class="text-gray-800">Supervisor:</strong>
                <p class="text-gray-700">{{ $user->supervisor ? $user->supervisor->name : 'None' }}</p>
            </div>
            <div class="mb-4">
                <strong class="text-gray-800">Mobile Number:</strong>
                <p class="text-gray-700">{{ $user->mobile_number ?? 'Not provided' }}</p>
            </div>
            <div class="mb-4">
                <strong class="text-gray-800">Role:</strong>
                <p class="text-gray-700">{{ $user->roles->first()->name ?? 'No role assigned' }}</p>
            </div>
            <div class="mt-6">
                <a href="{{ route('users.edit', $user) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Edit User
                </a>
                <a href="{{ route('users.index') }}" class="ml-2 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back to Users
                </a>
            </div>
        </div>
    </div>
@endsection
