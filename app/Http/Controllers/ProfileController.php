<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\AdminController;
use App\Http\Requests\ProfileUpdateRequest;
use Chatify\Facades\ChatifyMessenger;
class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $role = $user->role;
        $profileData = $user;

        switch ($role) {
            case 'admin':
                return view('admin.profile_view', compact('profileData'));
            case 'agent':
                return view('agent.profile_view', compact('profileData'));
            case 'user':
                return view('user.profile_view', compact('profileData'));
            case 'manager':
                return view('manager.profile_view', compact('profileData'));
            default:
                abort(403); // Handle unauthorized access or fallback behavior
        }
    }
    public function chatify()
    {
        $user = Auth::user();

        // Get the necessary data for Chatify
        $threads = ChatifyMessenger::getThreads($user->id);
        $contacts = ChatifyMessenger::getContacts($user->id);

        return view('chatify', compact('threads', 'contacts'));
    }
    public function changePassword()
    {
        if (request()->isMethod('post')) {
            // Handle POST request for updating the password
            // ...
        } else {
            // Handle GET request for displaying the change password form
            $user = Auth::user();
            $role = $user->role;
            $profileData = User::find($user->id);

            switch ($role) {
                case 'admin':
                    return view('admin.change_password', ['profileData' => $profileData]);
                case 'agent':
                    return view('agent.change_password', ['profileData' => $profileData]);
                case 'user':
                    return view('user.change_password', ['profileData' => $profileData]);
                case 'manager':
                    return view('manager.change_password', ['profileData' => $profileData]);
                default:
                    abort(403); // Handle unauthorized access or fallback behavior
            }
        }
    }


    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
