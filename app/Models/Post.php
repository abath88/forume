<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id'];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function upvote($user = null)
    {
        $user = $user ?: auth()->user();
        if($this->votes()->where('user_id', $value = $user->id)->where('vote', $value = 1)->exists()){
            return $this->votes()->detach($user);
        }else if($this->votes()->where('user_id', $value = $user->id)){
            $this->votes()->detach($user);
        }

        return $this->votes()->attach($user, ['vote' => 1]);
    }

    public function downvote($user = null)
    {
        $user = $user ?: auth()->user();
        if($this->votes()->where($column= 'user_id', $value = $user->id)->where('vote', $value = -1)->exists()){
            return $this->votes()->detach($user);
        }else if($this->votes()->where('user_id', $value = $user->id)){
            $this->votes()->detach($user);
        }

        return $this->votes()->attach($user, ['vote' => -1]);
    }

    public function votes()
    {
        return $this->morphToMany(User::class, 'votable');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) => $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
            )
        );
    }
}
