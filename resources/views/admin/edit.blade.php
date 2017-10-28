@extends('layouts.main')

@section('content')
    <main role="main">
        @include('admin.layouts.menu')
        <br>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="list-group">
                    @foreach($posts as $post)
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">{{ $post->title }}</h4>
                            <div class="list-group-item-text">{!! nl2br( $post->description) !!}</div>
                            <div class="float-right">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-success" target="_blank" href="{{ route('show',['id'=>$post->id]) }}">Открыть запись</a>
                                    <a class="btn btn-danger" href="{{ route('EditPost',['id'=>$post->id]) }}">Редактировать запись</a>
                                </div>
                            </div>
                            <div class="float-left">
                                <div>
                                    <span class="badge badge-secondary">Последнее изменение : {{ $post->updated_at }}</span>
                                    <span class="badge badge-secondary">Просмотров : {{ $post->views }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </main>
@endsection

@section('title', 'Админ панель : Редактирование записей - Блог')