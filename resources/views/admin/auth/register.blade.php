@extends('admin.layout.auth')

@section('content')
	<div id="register-box">
		{!! Form::open(['url' => URL('/admin/auth/register'), 'role' => 'form', 'class' => 'form-vertical', 'id' => 'register-form']) !!}
		<div class="control-group normal_text"> <h3><img src="{{ asset('img/logo.png') }}" alt="Logo" /></h3></div>
		<div class="control-group">
			<div class="controls">
				<div class="main_input_box">
					<span class="add-on bg_lg"><i class="icon-user"></i></span>
					{!! Form::text('name', old('name'), ['placeholder' => '用户名']) !!}
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="main_input_box">
					<span class="add-on bg_lg"><i class="icon-envelope"></i></span>
					{!! Form::email('email', old('email'), ['placeholder' => '邮箱']) !!}
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="main_input_box">
					<span class="add-on bg_lg"><i class="icon-lock"></i></span>
					{!! Form::password('password', ['placeholder' => '密码']) !!}
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="main_input_box">
					<span class="add-on bg_lg"><i class="icon-lock"></i></span>
					{!! Form::password('password_confirmation', ['placeholder' => '确认密码']) !!}
				</div>
			</div>
		</div>
		<div class="form-actions">
				<span class="pull-left">
					<a href="{{ url('/admin/auth/login') }}" class="flip-link btn btn-info">直接登录</a>
				</span>
				<span class="pull-right">
					{!! Form::submit('注册', ['class' => 'btn btn-success']) !!}
				</span>
		</div>
		{!! Form::close() !!}
	</div>
<!--
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
-->
@endsection
