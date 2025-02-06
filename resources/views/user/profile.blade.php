<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="max-w-3xl mx-auto">
                    <h3 class="text-5xl font-semibold text-gray-900 dark:text-gray-100 mb-6">Profile Information</h3>

                    <!-- Menampilkan Foto Profil -->
                    <div class="flex justify-center mb-8">
                        @if ($user->profile_picture)
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="rounded-full w-36 h-40 object-cover shadow-lg">
                        @else
                            <div class="w-36 h-36 bg-gray-300 rounded-full flex items-center justify-center text-white text-xl">
                                No Image
                            </div>
                        @endif
                    </div>

                    <!-- Menampilkan Username -->
                    <div class="text-center">
                        <label class="block text-gray-700 font-semibold text-lg">Username</label>
                        <p class="text-gray-800 text-xl">{{ $user->name }}</p>
                    </div>

                    <!-- Menampilkan Email -->
                    <div class="text-center">
                        <label class="block text-gray-700 font-semibold text-lg">Email</label>
                        <p class="text-gray-800 text-xl">{{ $user->email }}</p>
                    </div>

                    <!-- Menampilkan Biodata -->
                    <div class="text-center">
                        <label class="block text-gray-700 font-semibold text-lg">Biodata</label>
                        <p class="text-gray-800 text-xl">{{ $user->biodata ?? 'Biodata not available' }}</p>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>

                    </div>
                    <!-- <button type="submit" class="w-full bg-blue-500 text-black px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Update Password</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan style khusus jika diperlukan -->
    <style>
        /* Bisa menambahkan style tambahan di sini */
    </style>
</x-app-layout>