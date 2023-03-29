<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Notification;
use App\Models\Tweet;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function store($id){
        $tweet = Tweet::find($id);
        if(auth()->user()){
            $liked = Like::where('tweet_id', $tweet->id)->where('user_id',auth()->id())->get()->count();
            if ($liked == 1) {
                Like::where('tweet_id', $tweet->id)->where('user_id',auth()->id())->delete();
            }
            else{

                Like::create([
                    'tweet_id' => $tweet->id,
                    'user_id' => auth()->id(),
                ]);
                Notification::create([
                    'user_id' => auth()->id(),
                    'notify_id' => $tweet->user->id,
                    'notification' => "Liked Your Tweet",
                ]);
            }
        }
        return redirect()->route('home');
    }
}
