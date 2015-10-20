@extends('admin.layout.germy')

@section('content')
	<div id="content">
		@include('admin.public.breadcrumb')
		@include('admin.public.errors')
		@include('admin.public.success')
		@yield('main')
	</div>
@endsection