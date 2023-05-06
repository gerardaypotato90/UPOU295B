<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctors Schedule') }}
        </h2>
    </x-slot>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


        
    <div class="py-12">
    <section>
	<form method="POST" action="{{ route('doctortoschedule', ['did' => $doctorsid, 'pid' => $patientid]) }}">
		@method('POST')
					@if(Session::has('success'))
						<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
							<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
								<div class="p-6 bg-white border-b border-gray-200">
										<div class="alert alert-success">
											{{ Session::get('success') }}
										</div>
								</div>
							</div>
						</div>
                    @endif
                    @if(Session::has('failed'))
						<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
							<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
								<div class="p-6 bg-white border-b border-gray-200">								
                                    <div class="alert alert-danger">
                                        {{ Session::get('failed') }}
                                    </div>
								</div>
							</div>
						</div>
                    @endif
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
									<x-input type="text" name="appointmentdate" id="datepicker" class="datepicker form-control" />
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
	<script>
		flatpickr("#datepicker", {
			enableTime: true,
			dateFormat: "Y-m-d h:i K",
			time_24hr: false,
			minDate: "today"
		});
	</script>

    </div>

</x-app-layout>
