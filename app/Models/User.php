<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tweets(): HasMany
    {
        return $this->hasMany(Tweets::class);
    }

    public function followers(): HasMany
    {
        return $this->hasMany(Follower::class,'follower_id','id');
    }

    public function timeline(){
        $ids = $this->followers()->pluck('following_id');
        $ids->push($this->id);
        // dd($ids);
        // dd(Tweet::whereIn('user_id', $ids));
        return Tweet::whereIn('user_id', $ids)->latest()->get();

        // return $ids;
    }
    public function follows($user){
        return $this->followers()
        ->where('following_id', $user->id)
        ->exists();
    }

    public function getFollowers($user){
        return Follower::where('following_id', $user->id)->count();
    }

    public function getFollowings($user){
        return Follower::where('follower_id', $user->id)->count();
    }
}
