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
					<form class="form-horizontal" method="post" action="{{ URL('admin/tag') }}" name="create_tag" id="create_tag" novalidate="novalidate">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="control-group">
							<label class="control-label">标签名</label>
							<div class="controls">
								<input type="text" name="name">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">父标签</label>
							<div class="controls">
								<select name="parent">
									@foreach ($tags as $tag)
										<option value="{{ $tag->id }}">{{ $tag->name }}</option>
									@endforeach
								</select>
							</div>
			            </div>
						<div class="form-actions">
							<button class="btn btn-lg btn-info">新增</button>
						</div>
					</form>
				</div>
			</div>
		</div>
    </div>
</div>


@endsection