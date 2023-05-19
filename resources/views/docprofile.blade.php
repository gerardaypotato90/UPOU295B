<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors />
                 

                    <form method="POST" action="{{ route('patientprofile.update') }}">
                        @method('PUT')
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="name" :value="__('Name')" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ auth()->user()->name }}" aria-describedby="name" autofocus />
                                </div>
                                <div>
                                    <x-label for="email" :value="__('Email')" />
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ auth()->user()->email }}" aria-describedby="email" autofocus />
                                </div>
                                <div>
                                    <x-label for="new_password" :value="__('New password')" />
                                    <x-input id="new_password" class="block mt-1 w-full"
                                             type="password"
                                             name="password"
                                             aria-describedby="New password"
                                             autocomplete="new-password" />
                                </div>                       
                            </div>
                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="address" :value="__('Address')" />
                                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{ auth()->user()->address }}" aria-describedby="address" autofocus />
                                </div>
                                <div>
                                    <x-label for="telephone_number" :value="__('Phone Number')" />
                                    <x-input id="telephone_number" class="block mt-1 w-full" type="text" name="telephone_number" value="{{ auth()->user()->telephone_number }}" aria-describedby="Phone Number" autofocus />
                                </div>
                                <div>
                                    <x-label for="confirm_password" :value="__('Confirm password')" />
                                    <x-input id="confirm_password" class="block mt-1 w-full"
                                             type="password"
                                             name="password_confirmation"
                                             aria-describedby="confirm_password"
                                             autocomplete="confirm-password" />
                                </div>
                            </div>
                            
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
