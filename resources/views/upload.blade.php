<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patients Results') }}
        </h2>
    </x-slot>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    
        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       
            <form method="POST" action="{{ route('upload', [$patientid, $doctorid]) }}" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                <div class="font-semibold text-xl text-gray-800 leading-tight">Patient Name: {{$photos[0]->patientname}}</div>
                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="diagnosis" :value="__('Diagnosis')" />
                                    <x-input id="diagnosis" class="block mt-1 w-full" type="text" name="diagnosis" :value="old('diagnosis')" autofocus />
                                </div>
                            </div>
                
                <input type="file" name="image">
                <input type="submit" name="upload" class="btn btn-primary">
                </div>
               
            </form>
       
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
                        @foreach ($photos as $photo)
						    <tr class="alert" role="alert">
						      <th scope="row">{{$photo->patientname}}</th>
						      <td>{{$photo->diagnostic}}</td>
						      <td><img src="{{ asset('storage/images/' . $photo->imagename) }}" width="250" height="300"></td>
                              <td><a href="{{ route('download.downloads', ['filename' => $photo->imagename]) }}">Download Image</a></td>
						    </tr>
						@endforeach
						  </tbody>
						</table>
        </div>
    </div>

</x-app-layout>
