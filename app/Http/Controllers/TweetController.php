<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    //
    public function index()
    {
        $tweets = auth()->user()
            ? auth()
                ->user()
                ->timeline()
            : Tweet::find(-1);
        return view('tweets.index', compact('tweets'));
    }
    public function explore()
    {
        if (Auth::check()) {
            $users = User::all()->except(['id' => Auth::id()]);
            return view('tweets.explore', compact('users'));
        } else {
            return redirect()->action([TweetController::class, 'index']);
        }

        // dd($tweets);
    }
    public function followings()
    {
        if (Auth::check()) {
            $users = User::all()->except(['id' => Auth::id()]);
            return view('tweets.followings', compact('users'));
        } else {
            return redirect()->action([TweetController::class, 'index']);
        }

        // dd($tweets);
    }

    public function followers()
    {
        if (Auth::check()) {
            $users = User::all()->except(['id' => Auth::id()]);
            return view('tweets.followers', compact('users'));
        } else {
            return redirect()->action([TweetController::class, 'index']);
        }

        // dd($tweets);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tweet' => 'required|max:200',
            'tweet_images' => 'nullable|image',
        ]);
        if ($request->hasFile('tweet_images')) {
            $validated['tweet_images'] = $request->file('tweet_images')->store('tweet_images', 'public');
        }
        // dd($validated);
        $validated['user_id'] = auth()->id();
        Tweet::create($validated);
        return redirect('/');
    }

    public function destroy($id)
    {
        $tweet = Tweet::find($id);
        // dd($tweet);
        $tweet->delete();
        return redirect('/');
    }

    public function notifications()
    {
        $users = Follower::where('following_id',auth()->id())->latest()->pluck('follower_id');;
        $notifications = array();
        foreach($users as $user){
            $ntf = User::where('id',$user)->get();
            array_push($notifications,$ntf);
        }
        // dd($notifications);
        return Auth::check() ? view('tweets.notifications',[
            'notifications' => $notifications,
        ]) : route('/');
    }
}
