<div class="control-group">
    {!! Form::label('title', '标题', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::text('title', null, ['class' => 'span11']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('subtitle', '副标题', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::text('subtitle', null, ['class' => 'span11']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('summary', '摘要', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::textarea('summary', null, ['class' => 'span11', 'placeholder' => 'Enter text ...']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('content', '正文', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::textarea('content', null, ['class' => 'textarea_editor span11', 'placeholder' => 'Enter text ...', 'id' => null]) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('weight', '权重', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::text('weight', null) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('allow_comment', '允许评论', ['class' => 'control-label']) !!}
    <div class="controls">
        <div data-toggle="buttons-radio" class="btn-group">
            {!! Form::button('是', ['class' => 'btn', 'value' => 1]) !!}
            {!! Form::button('否', ['class' => 'btn', 'value' => 0]) !!}
            {!! Form::hidden('allow_comment', null, ['class' => 'value']) !!}
        </div>
    </div>
</div>
<div class="control-group">
    {!! Form::label('content', '标签', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::select('tag_list[]', $tags->lists('name', 'id'), null, ['id' => 'tag-list', 'class' => 'form-control', 'multiple' => 'multiple']) !!}
        <span href="#add-tags-panel" class="slide-up-down inline"><span>新增标签</span><span>收起</span></span>
    </div>
</div>
<div class="control-group" id="add-tags-panel" style="display: none">
    {!! Form::label('content', '新增标签', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::select('new_tags[]', [], null, ['id' => 'new-tags', 'class' => 'form-control', 'multiple' => 'multiple']) !!}
    </div>
    <div class="controls">
        {!! Form::button('新增标签', ['id' => 'add-tags', 'class' => 'btn btn-primary']) !!}
    </div>
</div>
<div class="control-group">
    <div class="controls">
        {!! Form::submit($buttonName, ['class' => 'btn btn-primary']) !!}
    </div>
</div>
