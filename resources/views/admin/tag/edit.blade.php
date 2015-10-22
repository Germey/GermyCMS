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
					<form class="form-horizontal" method="POST" action="{{ URL('admin/tag/'.$thisTag->id) }}" id="edit_tag">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="control-group">
							<label class="control-label">标签名</label>
							<div class="controls">
								<input type="text" name="name" value="{{ $thisTag->name }}">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">父标签</label>
							<div class="controls">
								<select name="parent">
									@foreach ($tags as $tag)
										@if ($thisTag->getParent and $thisTag->getParent->id == $tag->id)
											<option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
										@else
											<option value="{{ $tag->id }}">{{ $tag->name }}</option>
										@endif
									@endforeach
								</select>
							</div>
			            </div>
						<div class="control-group">
							<label class="control-label">修改</label>
							<div class="controls">
								<input type="submit" class="btn btn-lg btn-info" value="提交">
							</div>
						</div>
					</form>
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