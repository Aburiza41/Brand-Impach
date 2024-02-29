<x-app-layout>
    <x-slot name="header">
        <div class="sm:px-4 lg:px-6">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profile') }}
            </h2>
        </div>
    </x-slot>

    <div class="flex items-center justify-center mb-4 rounded bg-gray-50 dark:bg-gray-800">
        <div class="w-full py-6 mx-auto sm:px-6 lg:px-8 shadow-sm">
            @include('profile.partials.update-profile-information-form')
            @include('profile.partials.update-password-form')
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>
