@extends('admin.public.content')

@section('main')
<div class="main">
    <div class="row-fluid">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title"> 
					<span class="icon"> <i class="icon-info-sign"></i> </span>
					<h5>新建一篇文章</h5>
				</div>
				<div class="widget-content nopadding">
					<form class="form-horizontal" method="post" action="{{ URL('admin/tag') }}" name="create_tag" id="create_tag" novalidate="novalidate">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="control-group">
							<label class="control-label">标题</label>
							<div class="controls">
								<input type="text" name="title" class="span11">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">副标题</label>
							<div class="controls">
								<input type="text" name="subtitle" class="span11">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">摘要</label>
							<div class="controls">
								<textarea class="span11" rows="6" name="summary" placeholder="Enter text ..."></textarea>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">正文</label>
							<div class="controls">
								<textarea class="textarea_editor span11" rows="6" name="content" placeholder="Enter text ..."></textarea>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">权重</label>
							<div class="controls">
								<input type="text" name="name">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">允许评论</label>
							<div class="controls">
								<input type="text" name="name">
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
<script>
	
</script>

@endsection