<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctors Appointment Dashboard') }}
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
						      <th><div class="text-sm" aria-label="Patient Name">Patient Name</div></th>
						      <th><div class="text-sm" aria-label="Department">Department</div></th>
						      <th><div class="text-sm" aria-label="Action">Action</div></th>
						    </tr>
						  </thead>
						  <tbody>
						@foreach ($dplist as $dpl)
						    <tr class="alert" role="alert">
						      <th scope="row"><div class="text-sm" aria-label="{{$dpl->patientname}}">{{$dpl->patientname}}</div></th>
						      <td><div class="text-sm" aria-label="{{$dpl->department}}">{{$dpl->department}}</div></td>
						      
						      <td>
						      	<!--<a href="#" class="close" data-dismiss="alert" aria-label="Close">-->
								  <a href="/doctortoschedule/{{Auth::user()->id}}/{{$dpl->patientid}}" class="btn btn-primary" title="Schedule an appoinment">Schedule an appoinment</a>
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
