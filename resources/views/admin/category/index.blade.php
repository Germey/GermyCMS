@extends('admin.public.content')

@section('main')
<div class="main">
	<div class="widget-box">
		<div class="widget-title"> 
			<span class="icon">
				<input type="checkbox" id="title-checkbox" name="title-checkbox" />
			</span>
			<h5><a href="{{ URL('admin/tag/create')}}" class="btn btn-mini btn-primary">新增</a></h5>
		</div>
		<div class="widget-content nopadding">
			<table class="table table-bordered table-striped with-check">
				<thead>
					<tr>
						<th><i class="icon-resize-vertical"></i></th>
						<th>标签编号</th>
						<th>标签名</th>
						<th>父标签</th>
						<th>编辑</th>
						<th>删除</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($tags as $tag)
						<tr>
							<td><input type="checkbox" /></td>
							<td>{{ $tag->id }}</td>
							<td>{{ $tag->name }}</td>
							<td>
								@if ($parent = $tag->getParent)
									{{ $parent->name }}
								@else
									顶级标签
								@endif
							</td>
							<td>
								<a href="{{ URL('admin/tag/'.$tag->id.'/edit')}}" class="btn btn-mini btn-success"><i class="icon-edit"></i> 编辑</a>
							</td>
							<td>
								<form action="{{ URL('admin/tag/'.$tag->id) }}" method="POST" style="display: inline;">
									<input name="_method" type="hidden" value="DELETE">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button type="submit" class="btn btn-mini btn-danger"><i class="icon-remove"></i> 删除</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-right">
				<p>当前第{{ $tags->currentPage() }}页，共{{ $tags->lastPage() }}页</p>
			</div>
			<div class="pagination pull-right">
				{!!  $tags->setPath('tag')->render() !!}
			</div>
		</div>
	</div>
</div>
@endsection