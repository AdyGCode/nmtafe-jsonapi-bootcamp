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
                    <x-alert message="{{Session('success')}}" type="success" />
                    @endif

                    <table class="table table-auto w-full">
                        <thead class="pb-2 mb-4 bg-black text-white">
                        <tr >
                            <th class="p-2 mb-1">#</th>
                            <th class="p-2 mb-1">Title</th>
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
                            <td class="p-2 border-0 border-b-1 border-b-gray-300">{{ $loop->iteration }}</td>
                            <td class="p-2 border-0 border-b-1 border-b-gray-300 w-1/4">{{ $post->title }}</td>
                            <td class="p-2 border-0 border-b-1 border-b-gray-300 w-2/4">{{ $post->author->name }}</td>
                            <td class="grid grid-cols-4 gap-4 px-2 py-1 border-0 border-b-1 border-b-gray-300">
                                <a href="{{ route('posts.show', compact('post')) }}"
                                   class="bg-blue-500 text-white rounded px-2 py-1 w-16 text-center">Show</a>
                                <a href="{{ route('posts.edit', compact('post')) }}"
                                   class="bg-amber-500 text-white rounded px-2 py-1 w-16 text-center">Edit</a>
                                <a href="{{ route('posts.delete', compact('post')) }}"
                                   class="bg-red-500 text-white rounded px-2 py-1 w-16 text-center">Delete</a>
                                <span class="w-full"></span>

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
