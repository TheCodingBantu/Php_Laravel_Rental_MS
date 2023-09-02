<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
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

    public function addUser(Request $request)
    {
        try {

            $user = new User();
            $user->name = request('name');
            $user->email = request('email');
            $user->phone = request('phone');
            $user->national_id = request('id');
            $user->password = Hash::make('password');
            $user->role = request('type');
            $user->save();
            // return redirect()->back()->with('success', 'Saved Successfully');
            return Response(['success' => 'User Saved Successfully']);
        } catch (\Throwable $th) {
            //throw $th;
            return Response(['error' => $th->getMessage()]);

        }


    }
    public function addUserPage()
    {
        $title = 'Add User';
        return view('addUser',compact('title'));
    }

    public function allUsers()
    {   $title = 'All Users';
        $users = User::all();
        return view('users',compact('users','title'));
    }
}
