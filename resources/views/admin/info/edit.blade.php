@extends('admin.public.content')
@section('main')
    <link rel="stylesheet" href="{{ asset('css/colorpicker.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/uniform.css') }}" />
    <div class="main">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab1">基本资料</a></li>
                                <li><a data-toggle="tab" href="#tab2">详细资料</a></li>
                                <li><a data-toggle="tab" href="#tab3">教育信息</a></li>
                                <li><a data-toggle="tab" href="#tab4">工作信息</a></li>
                                <li><a data-toggle="tab" href="#tab5">头像设置</a></li>
                            </ul>
                        </div>
                        @if ($user->info)
                            {!! Form::model($user->info, ['url' => URL('admin/info/'.$user->id), 'class' => 'form-horizontal', 'method' => 'PUT', 'id' => 'edit-base-info']) !!}
                            {!! Form::hidden('tab', null, ['id' => 'info-tab']) !!}
                            <div class="widget-content tab-content">
                                <div id="tab1" class="tab-pane active">
                                    <div class="control-group">
                                        {!! Form::label('nickname', '昵称', ['class' => 'control-label']) !!}
                                        <div class="controls">
                                            {!! Form::text('nickname', null, ['class' => 'span4']) !!}
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        {!! Form::label('phone', '手机', ['class' => 'control-label']) !!}
                                        <div class="controls">
                                            {!! Form::text('phone', null, ['class' => 'span4']) !!}
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        {!! Form::label('brief', '简介', ['class' => 'control-label']) !!}
                                        <div class="controls">
                                            {!! Form::text('brief', null, ['class' => 'span8']) !!}
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        {!! Form::label('detail', '详细介绍', ['class' => 'control-label']) !!}
                                        <div class="controls">
                                            {!! Form::textarea('detail', null, ['class' => 'textarea_editor span8']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div id="tab2" class="tab-pane">
                                    <div class="control-group">
                                        {!! Form::label('gender', '性别', ['class' => 'control-label']) !!}
                                        <div class="controls">
                                            <div data-toggle="buttons-radio" class="btn-group">
                                                {!! Form::button('男', ['class' => 'btn', 'value' => 1]) !!}
                                                {!! Form::button('女', ['class' => 'btn', 'value' => 2]) !!}
                                                {!! Form::hidden('gender', null, ['class' => 'value']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        {!! Form::label('birthday', '出生日期', ['class' => 'control-label']) !!}
                                        <div class="controls">
                                            {!! Form::text('birthday', null, ['class' => 'datepicker span4', 'data-date-format' => 'yyyy-mm-dd']) !!}
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        {!! Form::label('blood_type', '血型', ['class' => 'control-label']) !!}
                                        <div class="controls">
                                            <div data-toggle="buttons-radio" class="btn-group">
                                                {!! Form::button('O', ['class' => 'btn', 'value' => 1]) !!}
                                                {!! Form::button('A', ['class' => 'btn', 'value' => 2]) !!}
                                                {!! Form::button('B', ['class' => 'btn', 'value' => 3]) !!}
                                                {!! Form::button('AB', ['class' => 'btn', 'value' => 4]) !!}
                                                {!! Form::hidden('blood_type', null, ['class' => 'value']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab3" class="tab-pane">
                                    <div class="edu-content">
                                        <div class="edu-messages">
                                            <div id="edu-messages-inner"></div>
                                        </div>
                                        <div class="well">
                                            <span class="input-box">
                                                {!! Form::text('edu_name', null, ['placeholder' => '学校',  'id' => 'edu-name']) !!}
                                            </span>
                                            <span class="input-box">
                                                {!! Form::text('edu_start', null, ['placeholder' => '入学时间', 'id' => 'edu-start', 'class' => 'datepicker', 'data-date-format' => 'yyyy-mm-dd']) !!}
                                            </span>
                                            <span class="input-box">
                                                {!! Form::text('edu_end', null, ['placeholder' => '入学时间', 'id' => 'edu-end', 'class' => 'datepicker', 'data-date-format' => 'yyyy-mm-dd']) !!}
                                            </span>
                                            <span class="input-box">
                                                {!! Form::text('edu_loc', null, ['placeholder' => '地点', 'id' => 'edu-loc']) !!}
                                            </span>
                                            {!! Form::button('添加', ['class' => 'btn btn-success', 'id' => 'add-edu-item']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div id="tab4" class="tab-pane">
                                    <div class="work-content">
                                        <div class="work-messages">
                                            <div id="work-messages-inner"></div>
                                        </div>
                                        <div class="well">
                                            <span class="input-box">
                                                {!! Form::text('work_name', null, ['placeholder' => '单位',  'id' => 'work-company']) !!}
                                            </span>
                                            <span class="input-box">
                                                {!! Form::text('work_start', null, ['placeholder' => '开始工作时间', 'id' => 'work-start', 'class' => 'datepicker', 'data-date-format' => 'yyyy-mm-dd']) !!}
                                            </span>
                                            <span class="input-box">
                                                {!! Form::text('work_end', null, ['placeholder' => '结束时间', 'id' => 'work-end', 'class' => 'datepicker', 'data-date-format' => 'yyyy-mm-dd']) !!}
                                            </span>
                                            <span class="input-box">
                                                {!! Form::text('work_loc', null, ['placeholder' => '职位', 'id' => 'work-occupation']) !!}
                                            </span>
                                            {!! Form::button('添加', ['class' => 'btn btn-success', 'id' => 'add-work-item']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div id="tab5" class="tab-pane">
                                    <div class="control-group">
                                        <div class="controls">
                                            @if ($user->info->image)
                                                <img id="now-img" src="{{ $user->info->image }}">
                                            @else
                                                <img id="now-img">
                                            @endif
                                            {!! Form::hidden('image', null, ['id' => 'now-img-src']) !!}
                                        </div>
                                        <label class="control-label">上传新头像</label>
                                        <div class="controls">
                                            {!! Form::file('image', ['id' => 'info-img']) !!}
                                        </div>
                                        <div class="controls">
                                            {!! Form::button('上传', ['class' => 'btn btn-success', 'id' => 'upload-info-img']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wysihtml5 -->
    <script src="{{ asset('js/wysihtml5-0.3.0.js') }}"></script>
    <script src="{{ asset('js/bootstrap-wysihtml5.js') }}"></script>
    <!-- end wysihtml5 -->
    <!-- date picker -->
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <!-- end date picker -->
    <!-- uniform -->
    <!--
    <script src="{{ asset('js/jquery.uniform.js') }}"></script>
    -->
    <!-- end uniform -->
    <!-- file upload -->
    <script src="{{ asset('js/jquery.ajaxfileupload.js') }}"></script>
    <!-- end file upload -->
    <!-- germy info -->
    <script src="{{ asset('js/germy.info.js') }}"></script>
    <!-- end germy info -->
    <?php
        //dd($user->info->education);
    ?>
    <script>
    @foreach ($user->info->education as $item)
        add_edu_message("{{ $item['name'] }}", "{{ $item['start'] }}", "{{ $item['end'] }}", "{{ $item['loc'] }}");
    @endforeach
    @foreach ($user->info->work as $item)
        add_work_message("{{ $item['company'] }}", "{{ $item['start'] }}", "{{ $item['end'] }}", "{{ $item['occupation'] }}");
    @endforeach
    </script>
@endsection