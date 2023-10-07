<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:100', 'regex:/^[a-zA-Z ]+$/'],
            'email' => ['required', 'email', 'unique:users,email,' . auth()->user()->id],
            'image' => ['image', 'max:2048']
        ]);
        $user = auth()->user();
        if ($validator->fails()) {
            toastr()->error('Profile Updated Failed!');

            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if ($request->hasFile('image')) {
                if (File::exists(public_path($user->image))) {
                    File::delete(public_path($user->image));
                }

                $image = $request->image;
                $imageName = rand() . '_' . $image->getClientOriginalName();
                $pathPrefix = 'uploads/user_images/';
                $image->move(public_path($pathPrefix), $imageName);

                $path = $pathPrefix . $imageName;

                $user->image = $path;
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            toastr()->success('Profile Updated Successfully!');
        }

        return redirect()->back();
    }

    /** Update Password */
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8']
        ]);

        if ($validator->fails()) {
            toastr()->error('Profile Password Updated Failed!');

            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $request->user()->update([
                'password' => bcrypt($request->password)
            ]);

            toastr()->success('Profile Password Updated Successfully!');
        }

        return redirect()->back();
    }
}
