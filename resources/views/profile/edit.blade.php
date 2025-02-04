<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <!-- Form Upload Foto Profil -->
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name">Name</label>
                            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required />
                        </div>

                        <div>
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required />
                        </div>

                        <div>
                            <label for="profile_picture">Upload Foto Profil</label>
                            <input type="file" name="profile_picture" id="profile_picture" accept="image/*" />
                        </div>

                        <button type="submit">Simpan Perubahan</button>
                    </form>

                    <!-- Menampilkan Foto Profil jika ada -->
                    @if ($user->profile_picture)
                        <div>
                            <h3>Foto Profil</h3>
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Foto Profil" width="150" />
                        </div>
                    @endif
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