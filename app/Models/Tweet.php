<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tweet extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function likes() : HasMany{
        // dd($this->hasMany(Like::class));
        return $this->hasMany(Like::class);
    }

    public function liked($user){
        return Like::where('tweet_id',$this->id)->where('user_id',$user->id)->get();
    }


}
