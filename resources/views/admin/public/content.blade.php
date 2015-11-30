@extends('admin.layout.germy')

@section('content')
	<div id="content">
		@include('admin.public.breadcrumb')
		@include('admin.public.alert')
		@yield('main')
	</div>
@endsection