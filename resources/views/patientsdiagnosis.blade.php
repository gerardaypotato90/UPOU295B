<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Medical Records') }}
        </h2>
    </x-slot>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    
        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">    
        <table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th>Patient Name</th>
						      <th>Diagnosis</th>
						      <th>Perscription/Lab test</th>
                              <th>Actions</th>
						    </tr>
						  </thead>
						  <tbody>
                        @foreach ($patientsdiagnose as $patientd)
						    <tr class="alert" role="alert">
						      <th scope="row">{{$patientd->patientname}}</th>
						      <td>{{$patientd->diagnostic}}</td>
						      <td><img src="{{ asset('storage/images/' . $patientd->imagename) }}" width="250" height="300"></td>
                              <td><a href="{{ route('download.downloads', ['filename' => $patientd->imagename]) }}" title="Download Image">Download Image</a></td>
						    </tr>
						@endforeach
						  </tbody>
						</table>
        </div>
    </div>

</x-app-layout>
