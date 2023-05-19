<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
            <img src="{{ asset('images/DiagnosticMD.png') }}" width="200" height="150">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" aria-describedby="name" required autofocus />
            </div>
            <div class="mt-4"> 
                <x-label for="address" :value="__('Address')" />

                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" aria-describedby="address" required autofocus />

            </div>
            <div class="mt-4">
                <x-label for="telephone_number" :value="__('Phone Number')" />

                <x-input id="telephone_number" class="block mt-1 w-full" type="text" name="telephone_number" :value="old('telephone_number')" aria-describedby="Phone Number" required autofocus />

            </div>

            <div class="mt-4">
                <x-label for="UserType" :value="__('User Type')" />

                <select name="usertype" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
                    <option value="Patient">Patient</option>
                    <option value="Doctor">Doctor</option>
                </select>

            </div>
            
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" aria-describedby="email" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                aria-describedby="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                aria-describedby="password"
                                name="password_confirmation" required />
            </div>
            <div style="display: flex; align-items: center;" >
                <input type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 btn-lg" data-toggle="modal" data-target="#myModal" aria-describedby="checkbox">
                <label class="block font-medium text-sm text-gray-700" for="I have read and agreed to the Data Privacy and Affidavit of Undertaking">I have read and agreed to the Data Privacy and Affidavit of Undertaking</label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
            <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <div style="font-size: 14px; line-height: 1.5;">
  <p style="margin-bottom: 10px;">I hereby confirm and declare the following:</p>
  
  <ol style="list-style-type: decimal; margin-bottom: 10px;">
    <li>The information provided in this form is accurate, complete, and true to the best of my knowledge. I am aware that any false statement or deliberate omission made in this form may have legal consequences in accordance with applicable laws and regulations.</li>
    <li>I authorize the collection of my data by the Department of Information and Communications Technology for the purpose of processing and managing my clinic appointments. I further grant permission to the Department of Health, Department of Justice, Department of Finance, and Department of Tourism to process the data indicated in this form to ensure efficient appointment management. I am aware that the handling of my personal information is governed by the provisions of the Data Privacy Act of 2012 (R.A. 10173). By submitting this form, I acknowledge that it is my responsibility to provide accurate and truthful information.</li>
  </ol>
  
  <p style="margin-top: 10px;">By acknowledging and submitting this form, I affirm my understanding of the importance of providing reliable information for effective appointment scheduling and management within the clinic system.</p>
</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Yes, I Agree">Yes, I Agree</button>
        </div>
      </div>
      
    </div>
  </div>
        </form>
    </x-auth-card>
</x-guest-layout>
