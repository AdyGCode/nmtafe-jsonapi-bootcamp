<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{

    public function home() {
         $user_count = User::count();
         $post_count = Post::count();
         $comment_count = Comment::count();
         $tag_count = Tag::count();

        return view('static.home', compact(
            ['user_count','post_count','comment_count','tag_count']
        ));

    }
}
