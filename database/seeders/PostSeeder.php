<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $author = User::create([
            'name' => 'Artie Shaw',
            'email' => 'artie.shaw@jsonapi-tutorial.test',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        $commenter = User::create([
            'name' => 'Benny Goodman',
            'email' => 'benny.goodman@jsonapi-tutorial.test',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $tag1 = Tag::create(['name' => 'Laravel']);
        $tag2 = Tag::create(['name' => 'JSON:API']);
        $tag3 = Tag::create(['name' => 'Accessibility']);
        $tag4 = Tag::create(['name' => 'REST']);

        $post = new Post([
            'title' => 'Welcome to Laravel JSON:API',
            'published_at' => now(),
            'content' => 'In our first blog post, you will learn ' .
                'all about Laravel JSON:API...',
            'slug' => 'welcome-to-laravel-jsonapi',
        ]);

        $post->author()->associate($author)->save();
        $post->tags()->saveMany([$tag1, $tag2, $tag4]);

        $comment = new Comment([
            'content' => 'Wow! Great first blog article. '.
                'Looking forward to more!',
        ]);

        $comment->post()->associate($post);
        $comment->user()->associate($commenter)->save();
    }
}
