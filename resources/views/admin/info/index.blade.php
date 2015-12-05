@extends('admin.public.content')
@section('main')
    <div class="main">
        @if ($user && $user->info)
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
                                <h5>个人详情</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                    <tr>
                                        <td class="span4">姓名</td>
                                        <td class="span8">{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="span4">邮件</td>
                                        <td class="span8">{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="span4">手机</td>
                                        <td class="span8">{{ $user->info->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td class="span4">简介</td>
                                        <td class="span8">{{ $user->info->brief }}</td>
                                    </tr>
                                    <tr>
                                        <td class="span4">详细介绍</td>
                                        <td class="span8">{{ $user->info->detail }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <a class="btn btn-success" href="{{ URL('/admin/info/'.$user->id.'/edit') }}">编辑信息</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <script src="{{ asset('js/germy.info.js') }}"></script>
@endsection