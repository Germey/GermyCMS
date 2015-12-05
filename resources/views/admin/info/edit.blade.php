@extends('admin.public.content')
@section('main')
    <link rel="stylesheet" href="{{ asset('css/colorpicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}" />
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
                        <div class="widget-content tab-content">
                            <div id="tab1" class="tab-pane active">
                                @if ($user->info)
                                    {!! Form::model($user->info, ['url' => URL('admin/info/'.$user->id), 'class' => 'form-horizontal', 'method' => 'PUT', 'id' => 'edit-base-info']) !!}
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
                                    {!! Form::close() !!}
                                @endif
                            </div>
                            <div id="tab2" class="tab-pane">
                                @if ($user->info)
                                    {!! Form::model($user->info, ['url' => URL('admin/info/'.$user->id), 'class' => 'form-horizontal', 'method' => 'PUT', 'id' => 'edit-detail-info']) !!}
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
                                        <label class="control-label">Date Picker (mm-dd)</label>
                                        <div class="controls">
                                            <div data-date="12-02-2012" class="input-append date datepicker">
                                                <input type="text" value="12-02-2012"  data-date-format="mm-dd-yyyy" class="span11" >
                                                <span class="add-on"><i class="icon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        {!! Form::label('birthday', '出生日期', ['class' => 'control-label']) !!}
                                        <div class="controls">
                                            {!! Form::text('birthday', null, ['class' => 'span4']) !!}
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
                                    {!! Form::close() !!}
                                @endif
                            </div>
                            <div id="tab3" class="tab-pane">
                                <p>full of waffle to pad out the comment. Usually, you just wish these sorts of comments
                                    would come to an end.multiple paragraphs and is full of waffle to pad out the
                                    comment. Usually, you just wish these sorts of comments would come to an end. </p>
                            </div>
                            <div id="tab4" class="tab-pane">
                                <p>And is full of waffle to It has multiple paragraphs and is full of waffle to pad out
                                    the comment. Usually, you just wish these sorts of comments would come to an
                                    end.multiple paragraphs and is full of waffle to pad out the comment. Usually, you
                                    just wish these sorts of comments would come to an end.multiple paragraphs and is
                                    full of waffle to pad out the comment. Usually, you just wish these sorts of
                                    comments would come to an end. </p>
                            </div>
                            <div id="tab5" class="tab-pane">
                                <p>And is full of waffle to It has multiple paragraphs and is full of waffle to pad out
                                    the comment. Usually, you just wish these sorts of comments would come to an
                                    end.multiple paragraphs and is full of waffle to pad out the comment. Usually, you
                                    just wish these sorts of comments would come to an end.multiple paragraphs and is
                                    full of waffle to pad out the comment. Usually, you just wish these sorts of
                                    comments would come to an end. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wysihtml5 -->
    <script src="{{ asset('js/wysihtml5-0.3.0.js') }}"></script>
    <script src="{{ asset('js/bootstrap-wysihtml5.js') }}"></script>
    <!-- end wysihtml5 -->
    <script src="{{ asset('js/jquery.uniform.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/masked.js') }}"></script>
    <script src="{{ asset('js/matrix.form_common.js') }}"></script>
    <!-- germy info -->
    <script src="{{ asset('js/germy.info.js') }}"></script>
    <!-- end germy info -->
@endsection