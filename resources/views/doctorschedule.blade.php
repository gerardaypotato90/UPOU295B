<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctors Schedule') }}
        </h2>
    </x-slot>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    
        
    <div class="py-12">
    <section>
	<form method="POST" action="{{ route('doctorschedule', ['id' => $doctorScheduleId]) }}">
		@method('POST')
		@csrf
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th>Doctor Name</th>    
						      <th>Available Days</th>
						      <th>Available Time</th>
							  <th>Date</th>
						      <th>Action</th>
						    </tr>
						  </thead>
						  <tbody>
                        @foreach ($drsched as $drs)
						    <tr class="alert" role="alert">
						      <th scope="row">{{$drs->doctorname}}</th>
						      <td>{{$drs->availabledays}}</td>
						      <td>{{$drs->availabletime}}</td>
							  <td>
							 	<div class="form-group">
									<x-input type="text" name="appointmentdate" class="datepicker form-control" />
								</div>
							  </td>
						      <td>
							  
								  <x-input class="block mt-1 w-full" type="hidden" name="doctorid" value="{{$drs->doctorid}}" />
								  <x-input class="block mt-1 w-full" type="hidden" name="doctorname" value="{{$drs->doctorname}}" />
								  <x-input class="block mt-1 w-full" type="hidden" name="department" value="{{$drs->department}}" />
								  <x-button class="ml-3 btn btn-primary">
                               		 {{ __('Book Now') }}
                            	  </x-button>
							  
				        	  </td>
						    </tr>
                        @endforeach
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</form>
	</section>

    </div>

</x-app-layout>
