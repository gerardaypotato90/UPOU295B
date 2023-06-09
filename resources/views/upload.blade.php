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
    <div class="profile-card">
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
    <div class="container mt-5">
                <div class="row d-flex justify-content-center">       
        <div class="col-md-7">            
            <div class="card p-3 py-4">               
                <div class="text-center">
                    <img src="{{ asset('images/logo.png') }}" width="100" class="rounded-circle img-center">
                </div>
                
                <div class="text-center mt-3">
                    <h5 class="mt-2 mb-0">{{$user[0]->name}}</h5>
                    <div>{{$user[0]->email}}</div>
                    <div>{{$user[0]->address}}</div>
                    <div>{{$user[0]->telephone_number}}</div>
                    
                    <div class="px-4 mt-1">
                        <p class="fonts">Please provide a diagnosis and upload any relevant documents, such as prescriptions or lab results.</p>
                    </div>
                    
                                <div class="grid grid-rows-2 gap-6">
                                    <div>
                                        <x-label for="diagnosis" :value="__('Diagnosis')" />
                                        <x-input id="diagnosis" class="block mt-1 w-full" type="text" name="diagnosis" :value="old('diagnosis')" autofocus />
                                    </div>
                                </div>
                    
                    <input type="file" name="image">
                    <input type="submit" name="upload" class="btn btn-primary">
                </div>  
            </div>     
            </div>
            </div>
        </div>
    </div>

                <div class="grid grid-cols-1 gap-6">
                    
                </div>
               
            </form>
       
        <table class="table">
						  <thead class="thead-dark">
						    <tr>
                              <th><div class="text-sm" aria-label="Patient Name">Patient Name</div></th>
						      <th><div class="text-sm" aria-label="Diagnosis">Diagnosis</div></th>
						      <th><div class="text-sm" aria-label="Perscription/Lab test">Perscription/Lab test</div></th>
                              <th><div class="text-sm" aria-label="Actions">Actions</div></th>
						    </tr>
						  </thead>
						  <tbody>
                        @foreach ($photos as $photo)
						    <tr class="alert" role="alert">
						      <th scope="row"><div class="text-sm" aria-label="{{$photo->patientname}}">{{$photo->patientname}}</div></th>
						      <td><div class="text-sm" aria-label="{{$photo->diagnostic}}">{{$photo->diagnostic}}</div></td>
						      <td><img src="{{ asset('storage/images/' . $photo->imagename) }}" width="250" height="300" alt="Immage"></td>
                              <td><a href="{{ route('download.downloads', ['filename' => $photo->imagename]) }}" title="Download Image">Download Image</a></td>
						    </tr>
						@endforeach
						  </tbody>
						</table>
        </div>
    </div>

</x-app-layout>
