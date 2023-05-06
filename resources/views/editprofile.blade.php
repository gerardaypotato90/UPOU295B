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
                 

                    <form method="POST" action="{{ route('editprofile.update') }}">
                        @method('PUT')
                        @if(Session::has('success'))
										<div class="alert alert-success">
											{{ Session::get('success') }}
										</div>
                        @endif
                        @if(Session::has('failed'))							
                                    <div class="alert alert-danger">
                                        {{ Session::get('failed') }}
                                    </div>
                        @endif
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="name" :value="__('Name')" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ auth()->user()->name }}" autofocus />
                                </div>
                                <div>
                                    <x-label for="email" :value="__('Email')" />
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ auth()->user()->email }}" autofocus />
                                </div>                   
                            </div>
                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="address" :value="__('Address')" />
                                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{ auth()->user()->address }}" autofocus />
                                </div>
                                <div>
                                    <x-label for="telephone_number" :value="__('Phone Number')" />
                                    <x-input id="telephone_number" class="block mt-1 w-full" type="text" name="telephone_number" value="{{ auth()->user()->telephone_number }}" autofocus />
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
