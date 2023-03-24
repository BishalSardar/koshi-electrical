<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    // admin profile function
    public function adminProfile()
    {
        $profile = User::all();
        return view('profile.index', compact('profile'));
    }

    // admin profile edit function
    public function adminProfileEdit()
    {
        return view('profile.edit');
    }

    // admin profile update function
    public function adminProfileUpdate(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $user = User::find(Auth::user()->id);

            if ($request->file('image')) {
                $image_dest = 'admin/images/profile/' . $user->image;
                if (File::exists($image_dest)) {
                    File::delete($image_dest);
                }
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('admin/images/profile'), $filename);
                $user->profile_image = $filename;
            }
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->update();
            return redirect()->route('admin.profile')->with('success', "Profile Updated Successfully");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Error While Updating Profile');
        }
    }


    // admin edit password function
    public function adminPasswordEdit()
    {
        return view('profile.changePassword');
    }

    // admin update password function
    public function adminPasswordUpdate(Request $request)
    {
        try {
            $request->validate(
                [
                    'current_password' => ['required', new MatchOldPassword],
                    'new_password' => ['required', 'min:5', 'different:current_password'],
                    'confirm_password' => ['required', 'same:new_password'],
                ]
            );
            $user = User::find(Auth::user()->id);
            User::whereId($user->id)->update(['password' => Hash::make($request->new_password)]);
            return redirect()->route('admin.profile')->with('success', "Password Updated Successfully");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', "Error While Changing Password");
        }
    }
}
