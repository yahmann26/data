<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;


class PostPolicy
{
    public function viewAny(User $user)
    {
        return true; // everyOne can view index
    }

    public function view(User $user, Post $post)
    {
        return true; // everyOne can view posts
    }

    public function create(User $user)
    {
        return true; // everyOne can view posts
    }

    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
