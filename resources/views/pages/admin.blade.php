@extends('layouts.app')

@section('title', '后台管理')

@section('styles')
    <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
@stop

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">新闻管理</h1>
            <p class="lead">添加或是删除新闻</p>
            <hr class="my-4">
            <p>管理入口</p>
            <a class="btn btn-primary btn-lg" href="{{ route('news.index') }}" role="button">点击进入</a>
        </div>
        <div class="jumbotron">
            <h1 class="display-4">队伍管理</h1>
            <p class="lead">添加、修改或是删除队伍</p>
            <hr class="my-4">
            <p>管理入口</p>
            <a class="btn btn-primary btn-lg" href="{{ route('teams.index') }}" role="button">点击进入</a>
        </div>
        <div class="jumbotron">
            <h1 class="display-4">赛事管理</h1>
            <p class="lead">添加、删除以及修改赛事信息</p>
            <hr class="my-4">
            <p>管理入口</p>
            <a class="btn btn-primary btn-lg" href="{{ route('games.index') }}" role="button">点击进入</a>
        </div>
        <div class="jumbotron">
            <h1 class="display-4">图片管理</h1>
            <p class="lead">添加、删除以及修改图片信息</p>
            <hr class="my-4">
            <p>管理入口</p>
            <a class="btn btn-primary btn-lg" href="{{ route('photos.index') }}" role="button">点击进入</a>
        </div>
    </div>
@endsection
