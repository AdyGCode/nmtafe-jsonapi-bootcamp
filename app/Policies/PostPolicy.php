<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User|null $user
     * @param Post $post
     * @return Response|bool
     */
    public function view(?User $user, Post $post): Response|bool
    {
        if ($post->published_at) {
            return true;
        }

        return $user && $user->is($post->author);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User|null $user
     * @param Post $post
     * @return Response|bool
     */
    public function viewAuthor(?User $user, Post $post): Response|bool
    {
        return $this->view($user, $post);
    }

    public function viewTags(?User $user, Post $post): Response|bool
    {
        return $this->view($user, $post);
    }

    public function viewComments(?User $user, Post $post): Response|bool
    {
        return $this->view($user, $post);
    }
}
