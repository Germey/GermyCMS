@if (count($errors) > 0)
	<div class="alert alert-error">
		<button class="close" data-dismiss="alert">×</button>
		<h5 class="alert-heading">Errors!</h5>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul> 
	</div>
@endif