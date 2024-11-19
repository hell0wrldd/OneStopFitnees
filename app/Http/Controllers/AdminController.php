<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all(); // Fetch all users from the database
        return view('admin.dashboard', compact('users'));
    }

    public function loadAllUsers()
    {
        $users = User::all();  // Fetch all users again for this view
        return view('admin.dashboard', compact('users')); // Ensure view name is correct
    }

    public function deleteUser($id)
{
    try {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully!');
    } catch (\Exception $e) {
        return redirect()->route('admin.users')->with('fail', $e->getMessage());
    }
}

}
