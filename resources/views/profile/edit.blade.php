<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit My Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 dark:text-gray-300 font-semibold">UserName</label>
                            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white" />
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 dark:text-gray-300 font-semibold">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white" />
                        </div>

                        <div class="mb-4">
                            <label for="biodata" class="block text-gray-700 dark:text-gray-300 font-semibold">Biodata</label>
                            <textarea name="biodata" id="biodata" rows="4"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white">{{ old('biodata', $user->biodata) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="profile_picture" class="block text-gray-700 dark:text-gray-300 font-semibold">Upload Foto Profil</label>
                            <input type="file" name="profile_picture" id="profile_picture" accept="image/*"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white" />
                        </div>

                        @if ($user->profile_picture)
                        <div class="mb-4">
                            <h3 class="text-gray-700 dark:text-gray-300 font-semibold">Foto Profil</h3>
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Foto Profil" class="mt-2 rounded-md w-40 h-40 object-cover" />
                        </div>
                        @endif

                        <button :href="route('user.profile')" :active="request()->routeIs('user.profile')" class="btn btn-primary">
                        {{ __('Save') }}
                        </button>


                    </form>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>