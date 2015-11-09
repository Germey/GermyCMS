@extends('admin.layout.auth')

@section('content')
	<div id="loginbox">
		{!! Form::open(['url' => URL('/admin/auth/login'), 'role' => 'form', 'class' => 'form-vertical', 'id' => 'loginform']) !!}
			<div class="control-group normal_text"> <h3><img src="{{ asset('img/logo.png') }}" alt="Logo" /></h3></div>
			<div class="control-group">
				<div class="controls">
					<div class="main_input_box">
						<span class="add-on bg_lg"><i class="icon-user"></i></span>
						{!! Form::email('email', null, ['placeholder' => '邮箱']) !!}
					</div>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<div class="main_input_box">
						<span class="add-on bg_lg"><i class="icon-lock"></i></span>
						{!! Form::password('password', null, ['placeholder' => '密码']) !!}
					</div>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<div class="main_check_box">
						{!! Form::checkbox('remember', null, true) !!}
						<span>记住我</span>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<span class="pull-left">
					<a href="{{ url('/admin/password/email') }}" class="flip-link btn btn-info">忘记密码</a>
				</span>
				<span class="pull-right">
					{!! Form::submit('登录', ['class' => 'btn btn-success']) !!}
				</span>
			</div>
		{!! Form::close() !!}
	</div>
@endsection
