<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id','tweet_id','comment','comment_images','created_at','updated_at','deleted_at'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
