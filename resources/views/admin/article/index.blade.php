@extends('admin.public.content')

@section('main')
<div class="main">
	<div class="widget-box">
		<div class="widget-title"> 
			<span class="icon">
				<input type="checkbox" id="title-checkbox" name="title-checkbox" />
			</span>
			<h5><a href="{{ URL('admin/article/create')}}" class="btn btn-mini btn-primary">新增</a></h5>
		</div>
		<div class="widget-content nopadding">
			<table class="table table-bordered table-striped with-check">
				<thead>
					<tr>
						<th><i class="icon-resize-vertical"></i></th>
						<th>标题</th>
						<th>操作</th>
						<th>状态</th>
						<th>浏览量</th>
						<th>点赞量</th>
						<th>作者</th>
						<th>发布时间</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($articles as $article)
						<tr>
							<td><input type="checkbox" /></td>
							<td class="text-center span6">{{ $article->title }}</td>
							<td class="span2">
								<a href="{{ URL('admin/article/'.$article->id.'/edit')}}" class="btn btn-mini btn-success"><i class="icon-edit"></i> 编辑</a>
								<form action="{{ URL('admin/article/'.$article->id) }}" method="POST" style="display: inline;">
									<input name="_method" type="hidden" value="DELETE">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button type="submit" class="btn btn-mini btn-danger"><i class="icon-remove"></i> 删除</button>
								</form>
							</td>
							<td class="text-center span2">已发布</td>
							<td class="text-center span">{{ $article->pv }}</td>
							<td class="text-center span">{{ $article->praise }}</td>
							<td class="text-center span">未知</td>
							<td>{{ $article->created_at }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection