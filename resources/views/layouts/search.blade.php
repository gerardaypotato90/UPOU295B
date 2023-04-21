
		<form action="{{ route('search.index') }}" method="GET">
			@method('GET')
            @csrf
		<!--<input type="text" name="query" placeholder="Search...">-->
		<select name="query">
			<option value="">Select Department</option>
			@foreach ($department as $dept)
			<option value="{{ $dept->departmentname }}">{{ $dept->departmentname }}</option>
			@endforeach
		</select>
		<button type="submit" class="btn btn-primary">Search</button>
		</form>