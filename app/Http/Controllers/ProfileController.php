<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function view(Request $request)
    {
        return view('profile.show', ['user' => $request->user()]);
    }
    
    // Show edit form
    public function edit(Request $request)
    {
        return view('profile.edit', ['user' => $request->user()]);
    }
    // Update profile
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = $request->user();
        $user->update($validated);

        return redirect()->route('profile.show')->with('status', 'Profile updated successfully!');
    }

    // Delete account
    public function destroy(Request $request)
    {
        $request->validate([
            'password' => 'required|current_password',
        ]);

        $user = $request->user();
        Auth::logout();
        $user->delete();

        return redirect('/')->with('status', 'Account deleted successfully!');
    }
}