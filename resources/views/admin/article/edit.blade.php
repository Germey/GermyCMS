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
					<form class="form-horizontal" method="post" action="{{ URL('admin/article/'.$article->id) }}">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="control-group">
							<label class="control-label">标题</label>
							<div class="controls">
								<input type="text" name="title" class="span11" value="{{ $article->title }}">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">副标题</label>
							<div class="controls">
								<input type="text" name="subtitle" class="span11" value="{{ $article->subtitle }}">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">摘要</label>
							<div class="controls">
								<textarea class="span11" rows="6" name="summary" placeholder="Enter text ...">{{ $article->summary }}</textarea>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">正文</label>
							<div class="controls">
								<textarea class="textarea_editor span11" rows="6" name="content" placeholder="Enter text ...">{{ $article->content }}</textarea>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">权重</label>
							<div class="controls">
								<input type="text" name="weight" value="{{ $article->weight }}">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">允许评论</label>
							<div class="controls">
								<div data-toggle="buttons-radio" class="btn-group">
									<button class="btn" type="button" value="1">是</button>
									<button class="btn" type="button" value="0">否</button>
									<input type="hidden" name="allow_comment" value="{{ $article->allow_comment }}">
								</div>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<button class="btn btn-primary">修改</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
    </div>
</div>
<script src="{{ asset('js/wysihtml5-0.3.0.js') }}"></script>
<script src="{{ asset('js/bootstrap-wysihtml5.js') }}"></script>

@endsection