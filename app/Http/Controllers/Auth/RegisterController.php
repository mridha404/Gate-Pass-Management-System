<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    protected $redirectTo = '/dashboard';

    public function showRegistrationForm()
    {

        $departments = Department::all();
        $designations = Designation::all();
        $supervisors = User::all();

        return view('auth.register', compact('departments', 'designations', 'supervisors'));
    }

   public function register(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'department_id' => ['required', 'exists:departments,id'],
        'designation_id' => ['required', 'exists:designations,id'],
        'supervisor_id' => ['nullable', 'exists:users,id'],
        'mobile_number' => ['required', 'string', 'max:20'],
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'department_id' => $request->department_id,
        'designation_id' => $request->designation_id,
        'supervisor_id' => $request->supervisor_id,
        'mobile_number' => $request->mobile_number,
    ]);

    Auth::login($user);
    
    return redirect('dashboard');
}
}
