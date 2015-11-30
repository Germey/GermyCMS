@if (Session::has('success'))
	<div class="alert alert-success">
		<button class="close" data-dismiss="alert">×</button>
		<h5 class="alert-heading">Success!</h5>
		{{ Session::get('success') }}
	</div>
@endif