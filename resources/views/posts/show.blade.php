<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h3 class="text-xl font-semibold mb-4">Post Details</h3>

                    <div class="flex gap-4 border border-0 border-b-1 border-b-gray-300 pb-2 mb-2">
                        <p class="flex-initial w-1/6">Title</p>
                        <p class="flex-grow">{{ $post->title }}</p>
                    </div>
                    <div class="flex gap-4 border border-0 border-b-1 border-b-gray-300 pb-2 mb-2">
                        <p class="flex-initial w-1/6">Slug</p>
                        <p class="flex-grow">{{ $post->slug }}</p>
                    </div>
                    <div class="flex gap-4 border border-0 border-b-1 border-b-gray-300 pb-2 mb-2">
                        <p class="flex-initial w-1/6">Author</p>
                        <p class="flex-grow">{{ $post->author->name }}</p>
                    </div>
                    <div class="flex gap-4 border border-0 border-b-1 border-b-gray-300 pb-2 mb-2">
                        <p class="flex-initial w-1/6">Content (extract)</p>
                        <p class="flex-grow">{{ $post->content }}</p>
                    </div>
                    <div class="flex gap-4 border border-0 border-b-1 border-b-gray-300 pb-2 mb-2">
                        <p class="flex-initial w-1/6">Tags</p>
                        <p class="flex-grow">
                            @foreach($post->tags as $tag)
                                <span class="px-2 rounded-lg bg-sky-800 text-sky-200 mr-1">{{ $tag->name }}</span>
                            @endforeach
                        </p>
                    </div>
                    <div class="flex gap-4">
                        <p class="flex-initial w-1/6"></p>

                        <p class="mt-8 flex gap-4">
                            <a href="{{ route('posts.index') }}"
                               class="bg-blue-500 text-white rounded p-2 w-16 flex-initial text-center">Back</a>
                            <a href="{{ route('posts.edit', compact('post')) }}"
                               class="bg-amber-500 text-white rounded p-2 w-16 flex-initial text-center">Edit</a>
                            <a href="{{ route('posts.delete', compact('post')) }}"
                               class="bg-red-500 text-white rounded p-2 w-16 flex-initial text-center">Delete</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
