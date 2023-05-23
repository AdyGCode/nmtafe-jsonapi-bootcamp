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

                    @if(Session('success')||Session('info')||Session('warning')||Session('fail'))
                        <x-alert message="{{Session('success')}}" type="success"/>
                    @endif

                    <table class="table table-auto w-full">
                        <thead class="pb-2 mb-4 bg-black text-white">
                        <tr>
                            <th class="p-2 mb-1">#</th>
                            <th class="p-2 mb-1">Title (& Extract)</th>
                            <th class="p-2 mb-1">Author</th>
                            <td class="p-2 mb-1">
                                <a href="{{ route('posts.create') }}"
                                   class="bg-gray-500 text-white rounded p-1 px-2 w-10 flex-initial">
                                    Add post
                                </a>
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr class="odd:bg-gray-100 ">
                                <td class="p-2 border-0 border-b-1 border-b-gray-300 content-right">{{ $loop->iteration }}</td>
                                <td class="p-2 border-0 border-b-1 border-b-gray-300 w-1/2">
                                    <p class="text-md font-medium">
                                        {{ $post->title }}
                                    </p>
                                    <p class="text-sm italic font-light ml-2 px-2 border border-0 border-l-2 border-l-indigo-400">
                                        {{$post->post_extract()}}
                                    </p>
                                </td>
                                <td class="p-2 border-0 border-b-1 border-b-gray-300 w-1/3">
                                    {{ $post->author->name }}
                                </td>
                                <td class="w-1/6 flex flex-row gap-2 p-2 border-0 border-b-1 border-b-gray-300">
                                    <a href="{{ route('posts.show', compact('post')) }}"
                                       class="bg-blue-500 text-white rounded p-2 text-center flex-grow">
                                        <i class="fa-solid fa-eye"></i> <span class="sr-only">Show</span>
                                    </a>
                                    <a href="{{ route('posts.edit', compact('post')) }}"
                                       class="bg-amber-500 text-white rounded p-2 text-center flex-grow">
                                        <i class="fa-solid fa-pen"></i> <span class="sr-only">Edit</span>
                                    </a>
                                    <a href="{{ route('posts.delete', compact('post')) }}"
                                       class="bg-red-500 text-white rounded p-2 text-center flex-grow">
                                        <i class="fa-solid fa-times"></i> <span class="sr-only">Delete</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="4" class="p-2">
                                {{ $posts->links() }}
                            </td>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
