@extends('layouts.app')

@section('title', '图片')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="photo">图片上传</label>
                    <input type="file" class="form-control-file" name="photo" id="photo" accept="image/png, image/jpeg, image/gif, image/jpg">
                </div>
                <div class="form-group">
                    <label for="shot_time">拍摄时间</label>
                    <input type="datetime-local" name="shot_time" id="shot_time" class="form-control">
                </div>
                <div class="form-group">
                    <label for="game_id">赛事选择</label>
                    <select class="form-control" id="game_id" name="game_id">
                        @foreach ($games as $game)
                        <option value="{{ $game->id }}">{{ $game->name }} - {{ $game->class==1?'田赛':'径赛'}} -
                            {{ $game->begins_at }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="name">描述：</label>
                    <textarea type="text" name="description" id="description" class="form-control" rows="3"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">提交</button>
            </form>
        </div>
    </div>
</div>

@endsection