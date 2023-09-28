<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ChangePasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        $layout = auth_layout();
        return view('change-password', compact('layout'));
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('change.password')->with('success', 'Password changed successfully!');
    }

    public function showChangePasswordFormAdmin()
    {
        return view('admin.auth.change-password');
    }

    public function changePasswordAdmin(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
        // return $request->all();
        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('admin.change.password')->with('success', 'Password changed successfully!');
    }

    public function updateProfileImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024'
        ]);

        $user = Auth::user();
        $profileImage = $request->file('profile_image');
        $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
        $imageExists = $user->profile_photo_path;

        // Check if the file already exists
        if ($imageExists) {
            if (Storage::disk('public')->exists($imageExists)) {
                // If it exists, delete the old file
                Storage::disk('public')->delete($imageExists);
            }
        }

        $profileImage->storeAs('profile_images', $imageName, 'public');

        $user->profile_photo_path = 'profile_images/' . $imageName;
        $user->save();

        return response()->json(['profile_image' => $user->profile_photo_path]);
    }
}
