<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function add()
    {
      return view('profile.edit');
    }

    public function edit()
    {
      //$profile = User::find($request->all());
      $user_id = Auth::id();
      $profile = DB::table('users')->where('id', $user_id)->first();
      //dd($profile);
      return view('profile.edit', ['profile' => $profile]);

    }

    public function update(Request $request)
    {
      $this->validate($request, User::$rules);
      $profile = User::find($request->id);
      //$profile_form = $request->all();

      $uploadfile = $request->file('icon_img');

          if(!empty($uploadfile)){
            $thumbnailname = $request->file('icon_img')->hashName();
            $request->file('icon_img')->storeAs('public/', $thumbnailname);
            $param = [
                      'name' => $request->name,
                      'introduction' => $request->introduction,
                      'icon_img' => $thumbnailname,
                     ];
          } else {
               $param = [
                         'name' => $request->name,
                         'introduction' => $request->introduction,
                        ];
          }
        User::where('id', $request->user_id)->update($param);
        return redirect('/users/edit')->with('success', '保存しました。');
    }
}
