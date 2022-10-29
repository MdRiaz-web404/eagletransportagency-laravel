<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function admin_profile(){
        return view('dashboard.admin_profile');
    }
    public function admin_profile_setting (){
        return view('dashboard.admin_profile_setting');
    }
    public function admin_profile_setting_post(Request $request)
    {
        User::find(auth()->id())->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        if ($request->hasFile('avatar') ) {
            $request->validate([
                'avatar'=>'image',
            ]);
            $avatar= Carbon::now()->format('Y').rand(1,9999).".".$request->file('avatar')->getClientOriginalExtension();
            $img = Image::make($request->file('avatar'))->resize(600, 800);
            $img->save(base_path('public/uploads/profile/'.$avatar), 80);
            User::find(auth()->id())->update([
                'profile_photo'=>$avatar,
            ]);
        }
        return back()->with('success','Profile Updated Successfully.');
    }
    public function admin_password(Request $request)
    {
        $request->validate([
            'current_password'=>'required',
            'password'=>'required|confirmed|different:current_password|',
            'password_confirmation'=>'required',
        ]);
            if (Hash::check($request->current_password, auth()->user()->password)){
                User::find(auth()->id())->update([
                    'password'=>bcrypt($request->password),
                ]);
                return back()->with('success','Password Changed Successfully ');
            }
            else{
                return back()->withErrors('Your provided current password does not matched!');
            };
    }
}
