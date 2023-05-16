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

                    <h3 class="text-xl font-semibold mb-4">Add New User</h3>
                    @if ($errors->any())
                        <ul class="bg-red-50 text-red-700 p-4 rounded mb-4">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST"
                          action="{{ route('users.store') }}">
                        @csrf

                        <div class="flex gap-4 pb-2 mb-2">
                            <label for="name" class="flex-initial w-1/6">Name</label>
                            <input type="text"
                                   name="name"
                                   class="flex-grow"
                                   placeholder="User's Full Name"
                                   value="{{ old('name') }}"/>
                        </div>
                        <div class="flex gap-4 pb-2 mb-2">
                            <label for="email" class="flex-initial w-1/6">eMail Address</label>
                            <input type="email"
                                   name="email"
                                   placeholder="User's email address"
                                   class="flex-grow"
                                   value="{{ old('email') }}"/>
                        </div>

                        <div class="flex gap-4 pb-2 mb-2">
                            <label for="password" class="flex-initial w-1/6">
                                Password
                            </label>
                            <input type="text"
                                   name="password"
                                   placeholder="Password"
                                   class="flex-grow border-0 border-b-1 border-b-grey-300"
                                   value="{{ old('password') }}"/>
                            <label for="confirm-password" class="flex-initial w-1/6">
                                Confirm
                            </label>
                            <input type="text"
                                   name="confirm-password"
                                   placeholder="Confirm Password"
                                   class="flex-grow border-0 border-b-1 border-b-grey-300"
                                   value=""/>
                        </div>

                        <div class="flex gap-4">
                            <p class="flex-initial w-1/6"></p>
                            <p class="mt-8 flex gap-4">
                                <button type="submit"
                                        class="bg-gray-500 text-white rounded p-2 ">
                                    Save
                                </button>
                                <a href="{{ route('users.index') }}" class="bg-gray-500 text-white rounded p-2 ">
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
