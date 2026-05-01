<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

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

        public function index(Request $request)
        {
            $user = auth()->user();
            $status = $request->query('status');
            $query = $user->items();

            if ($status) {
                $query->where('status', $status);
            }

            $items = $query->latest()->get();
            $totalReports = $user->items()->count();
            $lost = $user->items()->where('status', 'lost')->count();
            $found = $user->items()->where('status', 'found')->count();
            $returned = $user->items()->where('status', 'returned')->count();

            return view('profile.index', compact(
                'user', 'items', 'totalReports', 'lost', 'found', 'returned', 'status'
            ));
        }

        public function updatePhoto(Request $request)
        {
            $request->validate([
                'photo' => 'required|image|max:2048'
            ]);

            $user = Auth::user();

            if ($request->hasFile('photo')) {
                $oldPhoto = $user->profile_photo;
                $path = $request->file('photo')->store('profiles', 'public');
                $user->profile_photo = $path;
                $user->save();

                if ($oldPhoto) {
                    Storage::disk('public')->delete($oldPhoto);
                }
            }

            return back()->with('success', 'Profile photo updated!');
        }
}
