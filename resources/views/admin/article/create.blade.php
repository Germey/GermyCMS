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
                        {!! Form::open(['url' => URL('admin/article'), 'class' => 'form-horizontal', 'id' => 'create_article']) !!}
                            @include('admin.article.form', ['buttonName' => '新增', 'allowComment' => '1'])
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
    <script src="{{ asset('js/germy.article.js') }}"></script>
@endsection