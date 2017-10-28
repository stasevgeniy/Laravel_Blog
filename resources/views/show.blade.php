@extends('layouts.main')

@section('content')
    <main role="main">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
            </ol>
        </nav>

        <h1>{{ $post->title }}</h1>
        <div>{!! nl2br($post->text) !!}</div>
        <p>
            <div>
                <span class="badge badge-primary">Дата создания : {{ $post->created_at }}</span>
            <span class="badge badge-secondary">Просмотров : {{ $post->views }}</span>
            <span class="badge badge-secondary">Автор : {{ $post->name }}</span>
            </div>
        </p>
    </main>
@endsection

@section('title', 'Просмотр статьи - Блог')