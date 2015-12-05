@extends('admin.public.content')
@section('main')
    <div class="main">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>新建文章</h5>
                    </div>
                    <div class="widget-content nopadding">
                        {!! Form::open(['url' => URL('admin/article'), 'class' => 'form-horizontal', 'id' => 'create-article']) !!}
                            @include('admin.article.form', ['buttonName' => '新增'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wysihtml5 -->
    <script src="{{ asset('js/wysihtml5-0.3.0.js') }}"></script>
    <script src="{{ asset('js/bootstrap-wysihtml5.js') }}"></script>
    <!-- end wysihtml5 -->
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/matrix.form_validation.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/germy.article.js') }}"></script>
@endsection