@extends('admin.public.content')
@section('main')
<div class="main">
    <div class="row-fluid">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title"> 
					<span class="icon"> <i class="icon-info-sign"></i> </span>
					<h5>编辑文章</h5>
				</div>
				<div class="widget-content nopadding">
					{!! Form::model($article, ['url' => URL('admin/article/'.$article->id), 'class' => 'form-horizontal', 'method' => 'PUT', 'id' => 'edit_article']) !!}
						@include('admin.article.form', ['buttonName' => '修改'])
					{!! Form::close() !!}
				</div>
			</div>
		</div>
    </div>
</div>
<script src="{{ asset('js/wysihtml5-0.3.0.js') }}"></script>
<script src="{{ asset('js/bootstrap-wysihtml5.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>
<script src="{{ asset('js/matrix.form_validation.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/germy.article.js') }}"></script>
@endsection