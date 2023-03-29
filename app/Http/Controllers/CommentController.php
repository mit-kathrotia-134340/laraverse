<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Notification;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //

    public function store(Request $request,$id){
        $validated = $request->validate([
            'comment'=>'required|max:200',
            'comment_images' => 'nullable|image'
        ]);
        if($request->hasFile('comment_images')){
            $validated['comment_images'] = $request->file('comment_images')->store('comment_images','public');
        }

        $validated['tweet_id'] = $id;
        $user_id = auth()->user()->id;
        $validated['user_id'] = $user_id;
        $tweet = Tweet::find($id);

        Comment::create($validated);

        Notification::create([
            'user_id' => auth()->id(),
            'notify_id' => $tweet->user->id,
            'notification' => "Commented On Your Tweet",
        ]);

        return redirect('/');
    }
    public function destroy($id){
        $comment =  Comment::find($id);
        $comment->update([
            'deleted_at' => now(),
        ]);
        return redirect(route('home'));
    }
}
