<x-guest-layout>

    <x-slot name="header">
        <h2 class="text-2xl text-blue-800 font-semibold">Home</h2>
    </x-slot>

    <div class="py-12 mx-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" grid grid-cols-3 gap-4">
                <div class="border border-gray-400 grid grid-rows-2 rounded">
                    <p class="bg-gray-500 text-white p-6 -mx-6 -mt-6 content-center">Users</p>
                    <p class="text-3xl p-6 m-4 content-center"> {{ $user_count }}</p>
                </div>
                <p class="p-6 border border-gray-400">
                    Tag Count: {{ $tag_count }}
                </p>
                <p class="p-6 border border-gray-400">
                    Post Count: {{ $post_count }}
                </p>
            </div>
        </div>
    </div>

</x-guest-layout>
