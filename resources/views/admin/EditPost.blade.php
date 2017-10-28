@extends('layouts.main')

@section('content')
    <main role="main">
        @include('admin.layouts.menu')
        <br>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('SavePost',$post->id) }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title">Название</label>

                        <div>
                            <input value="{{ $post->title }}" id="title" type="text" class="form-control" name="title" required>

                            @if ($errors->has('title'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">Описание</label>
                        <div>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $post->description }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                        <label for="text">Полный текст записи</label>
                        <div>
                            <textarea class="form-control" id="text" name="text" rows="10" required>{{ $post->text }}</textarea>

                            @if ($errors->has('text'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-sign-in"></i> Сохранить
                            </button>
                        </div>
                    </div>
                </form>
                <a href="{{ route('DeletePost',$post->id) }}" class="btn btn-danger">
                    <i class="fa fa-btn fa-sign-in"></i> Удалить запись
                </a>
            </div>
        </div>
        <script type="text/javascript">
            bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
        </script>
    </main>
@endsection

@section('title', 'Админ панель : Добавить новую запись - Блог')