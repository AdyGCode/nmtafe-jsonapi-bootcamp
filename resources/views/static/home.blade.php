<x-guest-layout>

    <x-slot name="header" class="bg-dark">
        <h2 class="text-2xl text-blue-800 font-semibold">Home</h2>
    </x-slot>

    <div class="py-12 mx-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-2xl p-4 mb-8 text-white rounded-lg bg-red-600">Remember to sign in at lecturer desk.</div>
            <div class=" grid grid-cols-3 gap-4 pt-4">
                <div class="border border-gray-400 grid grid-rows-2 rounded">
                    <p class="bg-gray-500 text-white p-6 content-center text-center">Users</p>
                    <p class="bg-gray-900 text-gray-100 text-3xl p-6 m-0 content-center text-center rounded-b"> {{ $user_count }}</p>
                </div>

                <div class="border border-gray-400 grid grid-rows-2 rounded">
                    <p class="bg-gray-500 text-white p-6 content-center text-center">Tags</p>
                    <p class="bg-gray-900 text-gray-100 text-3xl p-6 m-0 content-center text-center rounded-b"> {{ $tag_count}}</p>
                </div>

                <div class="border border-gray-400 grid grid-rows-2 rounded">
                    <p class="bg-gray-500 text-white p-6 content-center text-center">Posts</p>
                    <p class="bg-gray-900 text-gray-100 text-3xl p-6 m-0 content-center text-center rounded-b"> {{ $post_count }}</p>
                </div>

            </div>
        </div>
    </div>

</x-guest-layout>
