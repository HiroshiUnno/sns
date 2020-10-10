<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;
use Storage;

class ProfileController extends Controller
{
    public function add()
    {
      return view('profile.edit');
    }
    //ユーザーの取得
    public function edit(Request $request)
    {

      $user_id = Auth::id();
      $profile = DB::table('users')->where('id', $user_id)->first();
      //dd($profile);
      return view('profile.edit', ['profile' => $profile]);

    }
　　 //プロフィール編集処理
    public function update(Request $request)
    {
      $this->validate($request, User::$rules);
      $profile = User::find($request->id);
      $profile_form = $request->all();

        $uploadfile = $request->file('icon_img');
        //dd($uploadfile);
            if(!empty($uploadfile)){
              $path = Storage::disk('s3')->putFile('/', $uploadfile, 'public');
              $profile_form['icon_img'] = Storage::disk('s3')->url($path);

              $param = [
                        'name' => $request->name,
                        'introduction' => $request->introduction,
                        'icon_img' => $profile_form['icon_img'],
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
