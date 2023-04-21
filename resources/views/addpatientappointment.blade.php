<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Patient') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors />
                 

                    <form method="POST" action="{{ route('addpatientappointment.doctorpatientlist') }}">
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
                        <div class="grid grid-cols-1 gap-6">
                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="doctorname" :value="__('Doctor Name')" />
                                    <select name="doctorname" id="doctorname" class="block mt-1 w-full">
                                        <option value="">Select Doctor Name</option>
                                        @foreach ($doctors as $doctor)
                                        <option atval="{{ $doctor->name }}" value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input id="doctornamev" class="block mt-1 w-full" type="hidden" name="doctornamev" :value="old('doctornamev')" autofocus />
                                </div>
                                <div>
                                    <x-label for="patientname" :value="__('Patient Name')" />
                                    <select name="patientname" id="patientname" class="block mt-1 w-full">
                                        <option value="">Select Patient Name</option>
                                        @foreach ($patients as $patient)
                                        <option atval="{{ $patient->name }}" value="{{ $patient->id }}">{{ $patient->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input id="patientnamev" class="block mt-1 w-full" type="hidden" name="patientnamev" :value="old('patientnamev')" autofocus />

                                </div>
                                <div>
                                    <x-label for="appointmentdate" :value="__('Appointment Date')" />
                                    <x-input id="appointmentdate" class="block mt-1 w-full" type="text" name="appointmentdate" :value="old('appointmentdate')" autofocus />
                                </div>
                                <div>
                                    <x-label for="status" :value="__('Status')" />
                                    <x-input id="status" class="block mt-1 w-full" type="text" name="status" :value="old('status')" autofocus />
                                </div>                 
                            </div>
                           
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
