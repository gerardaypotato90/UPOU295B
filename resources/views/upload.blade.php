<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload Photo') }}
        </h2>
    </x-slot>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    
        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image">
            <input type="submit" name="upload" class="btn btn-primary">
        </form>
        <ul>
            @foreach ($photos as $photo)
                <li>{{ $photo->name }}</li>
            @endforeach
        </ul>
        <table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th>Patient Name</th>
						      <th>Diagnosis</th>
						      <th>Perscription/Lab test</th>
						    </tr>
						  </thead>
						  <tbody>
                        @foreach ($photos as $photo)
						    <tr class="alert" role="alert">
						      <th scope="row">{{$photo->patientname}}</th>
						      <td>{{$photo->diagnostic}}</td>
						      <td><img src="{{ asset('storage/images/' . $photo->imagename) }}" width="250" height="300"></td>
						    </tr>
						@endforeach
						  </tbody>
						</table>
        </div>
    </div>

</x-app-layout>
