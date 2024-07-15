<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function index()
    {
        $users = User::with(['department', 'designation', 'supervisor'])->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $departments = Department::all();
        $designations = Designation::all();
        $supervisors = User::all();
        $roles = Role::all();
        return view('users.create', compact('departments', 'designations', 'supervisors', 'roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'department_id' => 'required|exists:departments,id',
            'designation_id' => 'required|exists:designations,id',
            'supervisor_id' => 'nullable|exists:users,id',
            'mobile_number' => 'nullable|string|max:20',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'department_id' => $validated['department_id'],
            'designation_id' => $validated['designation_id'],
            'supervisor_id' => $validated['supervisor_id'],
            'mobile_number' => $validated['mobile_number'],
        ]);

        $user->roles()->attach($validated['role_id']);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $departments = Department::all();
        $designations = Designation::all();
        $supervisors = User::where('id', '!=', $user->id)->get();
        $roles = Role::all();
        return view('users.edit', compact('user', 'departments', 'designations', 'supervisors', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'department_id' => 'required|exists:departments,id',
            'designation_id' => 'required|exists:designations,id',
            'supervisor_id' => 'nullable|exists:users,id',
            'mobile_number' => 'nullable|string|max:20',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update($validated);
        $user->roles()->sync([$validated['role_id']]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
