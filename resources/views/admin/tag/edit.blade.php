@extends('admin.public.content')

@section('main')
<div class="main">
    <div class="row-fluid">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title"> 
					<span class="icon"> <i class="icon-info-sign"></i> </span>
					<h5>Form validation</h5>
				</div>
				<div class="widget-content nopadding">
					{!! Form::model($thisTag, ['url' => URL('admin/tag/'.$thisTag->id), 'id' => 'edit_tag', 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
						@include('admin.tag.form', ['submitName' => '修改', 'parent' => $thisTag->getParent])
					{!! Form::close() !!}
				</div>
			</div>
		</div>
    </div>
</div>
<script src="{{ asset('js/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>
<script src="{{ asset('js/matrix.form_validation.js') }}"></script>
@endsection