<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    //
    public function store($id)
    {
        $user = User::find($id);
        if ($user && auth()->user()) {
            Follower::updateOrCreate([
                'follower_id' => auth()->id(),
                'following_id' => $user->id,
            ]);
            User::where('id',auth()->id())->update([
                'followers' => Follower::where('follower_id',auth()->id())->count(),
                'followings' => Follower::where('following_id',auth()->id())->count(),
            ]);
            Notification::create([
                'user_id' => auth()->id(),
                'notify_id' => $user->id,
                'notification' => "Followed You",
            ]);
        }
        // return redirect()->route('explore');
        return back();
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user && auth()->user()) {
            $followed = Follower::where('follower_id', auth()->id())->where('following_id',$user->id)->get()->count();
            if ($followed == 1) {
                Follower::where('follower_id', auth()->id())->where('following_id',$user->id)->delete();
                Notification::create([
                    'user_id' => auth()->id(),
                    'notify_id' => $user->id,
                    'notification' => "Unfollowed You",
                ]);
            }
            else{

                Follower::create([
                    'follower_id' => auth()->id(),
                    'following_id' => $user->id,
                ]);
                Notification::create([
                    'user_id' => auth()->id(),
                    'notify_id' => $user->id,
                    'notification' => "Followed You",
                ]);
            }
            User::where('id',auth()->id())->update([
                'followers' => Follower::where('follower_id',auth()->id())->count(),
                'followings' => Follower::where('following_id',auth()->id())->count(),
            ]);
        }
        // return redirect()->route('followings');
        return back();
    }
}
