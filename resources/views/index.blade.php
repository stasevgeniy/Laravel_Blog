@extends('layouts.main')

@section('content')
    <main role="main">

        <div class="jumbotron">
            <h1 class="display-3">Laravel Blog</h1>
            <p class="lead">Данный блог написан на PHP фреймворке Laravel + WEB фреймворке Bootstrap</p>
            <p><a target="_blank" class="btn btn-lg btn-warning" href="https://laravel.com/docs/5.5" role="button">Официальная документация фреймворка Laravel</a></p>
            <p><a target="_blank" class="btn btn-lg btn-primary" href="http://getbootstrap.com/docs/4.0/getting-started/introduction/" role="button">Официальная документация фреймворка Bootstrap</a></p>
        </div>

        <h1>
            <div class="text-center">Последние записи в блоге</div>
        </h1>

        <div class="list-group">
            @foreach($posts as $post)
                <div class="list-group-item">
                    <h4 class="list-group-item-heading">
                        <a href="{{ route('show',['id'=>$post->id]) }}">
                        {{ $post->title }}
                        </a>
                    </h4>
                    <div class="list-group-item-text">{!! nl2br( $post->description) !!}</div>
                    <div class="float-right">
                        <span class="badge badge-success">Автор : {{ $post->name }}</span>
                    </div>
                    <div class="float-left">
                        <div>
                            <span class="badge badge-secondary">{{ $post->created_at }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </main>
@endsection

@section('title', 'Главная - Блог')