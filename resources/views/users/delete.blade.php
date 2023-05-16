<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h3 class="text-xl font-semibold mb-4">{{ __('Confirm Delete User') }}</h3>

                    <div class="flex gap-4 border border-0 border-b-1 border-b-gray-300 pb-2 mb-2">
                        <p class="flex-initial w-1/6">Name</p>
                        <p class="flex-grow">{{ $user->name }}</p>
                    </div>
                    <div class="flex gap-4 border border-0 border-b-1 border-b-gray-300 pb-2 mb-2">
                        <p class="flex-initial w-1/6">eMail Address</p>
                        <p class="flex-grow">{{ $user->email }}</p>
                    </div>
                    <div class="flex gap-4">
                        <p class="flex-initial w-1/6"></p>
                        <p class="mt-8 flex gap-4">

                            <a href="{{ route('users.index') }}"
                               class="bg-blue-500 text-white rounded p-2 ">Cancel Delete</a>

                        <form action="{{ route('users.destroy', compact('user')) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 text-white rounded p-2 ">
                                Confirm
                            </button>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
