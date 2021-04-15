@extends('layouts.app')

@section('title', '图片')

@section('content')
<div class="container">
    <a href="{{ route('photos.create') }}" class="btn btn-info">创建新图片</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">缩略图</th>
                <th scope="col">赛事</th>
                <th scope="col">开始时间</th>
                <th scope="col">描述</th>
            </tr>
        </thead>
        <tbody>
            @foreach($photos as $photo)
            <tr>
                <th scope="row">{{ $photo->id }}</th>
                <td><img src="{{ $photo->path }}" alt="img" width="70"></td>
                <td>
                    <a href="{{ route('photos.edit', ['id'=>$photo->id]) }}"
                        class="btn btn-warning btn-sm d-sm-inline-flex">修改</a>
                    <form method="post" action="{{ route('photos.destroy', $photo->id) }}" class=" d-sm-inline-flex">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm">删除</button>
                    </form>
                </td>
                <th>{{ $photo->shot_time }}</th>
                <th>{{ $photo->description }}</th>
            </tr>
            @endforeach
        </tbody>
    </table>

    {!! $photos->render() !!}

</div>
@endsection