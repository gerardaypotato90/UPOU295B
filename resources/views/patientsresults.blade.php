<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patients Medical Records') }}
        </h2>
    </x-slot>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    
        
    <div class="py-12">
    <section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th>Patient Name</th>
						      <th>Department</th>
						      <th>Action</th>
						    </tr>
						  </thead>
						  <tbody>
						@foreach ($patientlists as $patientlist)
						    <tr class="alert" role="alert">
						      <th scope="row">{{$patientlist->patientname}}</th>
						      <td>{{$patientlist->department}}</td>
						      
						      <td>
						      	<!--<a href="#" class="close" data-dismiss="alert" aria-label="Close">-->
                                  <a href="/upload/{{$patientlist->patientid}}/{{$patientlist->doctorid}}" class="btn btn-primary">Send results</a>
				        	  </td>
						    </tr>
						@endforeach
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

    </div>

</x-app-layout>
