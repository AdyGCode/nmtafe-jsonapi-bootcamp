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

                    <h3 class="text-xl font-semibold mb-4">{{ __('Confirm Delete Post') }}</h3>

                    <div class="flex gap-4 border border-0 border-b-1 border-b-gray-300 pb-2 mb-2">
                        <p class="flex-initial w-1/6">Title</p>
                        <p class="flex-grow">{{ $post->title }}</p>
                    </div>
                    <div class="flex gap-4 border border-0 border-b-1 border-b-gray-300 pb-2 mb-2">
                        <p class="flex-initial w-1/6">Content</p>
                        <p class="flex-grow">{{ $post->content }}</p>
                    </div>
                    <div class="flex">
                        <p class="flex-initial w-1/6 mr-4"></p>
                        <div class="mt-8 flex gap-4">
                            <form action="{{ route('posts.index') }}">
                                <button class="bg-blue-500 text-white rounded p-2">Cancel Delete</button>
                            </form>
                            <form action="{{ route('posts.destroy', compact('post')) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 text-white rounded p-2 ">
                                    Confirm
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
