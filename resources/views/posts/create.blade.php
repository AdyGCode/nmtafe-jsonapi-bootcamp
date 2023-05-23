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

                    <h3 class="text-xl font-semibold mb-4">Create New Post</h3>
                    @if ($errors->any())
                        <ul class="bg-red-50 text-red-700 p-4 rounded mb-4">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST"
                          action="{{ route('posts.store') }}">
                        @csrf

                        <div class="flex gap-4 pb-2 mb-2">
                            <label for="title" class="flex-initial w-1/6">Title</label>
                            <input type="text"
                                   id="title"
                                   name="title"
                                   class="flex-grow"
                                   placeholder="Post Title"
                                   value="{{ old('title') }}"/>
                        </div>

                        <div class="flex gap-4 pb-2 mb-2">
                            <label for="content" class="flex-initial w-1/6">Content</label>
                            <textarea
                                id="content"
                                name="content"
                                placeholder="Add content here"
                                class="flex-grow">{{ old('content') }}</textarea>
                        </div>

                        <div class="flex gap-4 pb-2 mb-2">
                            <label for="tags" class="flex-initial w-1/6">Tags</label>
                            <input type="text"
                                   id="tags"
                                   name="tags"
                                   class="flex-grow"
                                   placeholder="Tags (comma separated)"
                                   value="{{ old('tags') }}"/>
                        </div>

                        <div class="flex gap-4">
                            <p class="flex-initial w-1/6"></p>
                            <p class="mt-8 flex gap-4">
                                <button type="submit"
                                        class="bg-gray-500 text-white rounded p-2 ">
                                    Save
                                </button>
                                <a href="{{ route('posts.index') }}" class="bg-gray-500 text-white rounded p-2 ">
                                    Cancel
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
