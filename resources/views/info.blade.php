@extends('layouts.main')

@section('content')
    <main role="main">
        <h3>Информация про блог</h3>
        <table class="table table-striped">
            <tbody>
            <tr>
                <td>Всего записей в блоге</td>
                <td><b>{{ $count_all }}</b></td>
            </tr>
            <tr>
                <td>Самый популярный пост</td>
                <td>
                    <a href="{{ route('show',['id'=>$popular_post->id]) }}">{{ $popular_post->title }}</a>
                    <p>Просмотров : <b>{{ $popular_post->views }}</b></p>
                    <p>Автор : {{ $popular_post->name }}</p>
                </td>
            </tr>
            <tr>
                <td>Последний измененный пост</td>
                <td>
                    <a href="{{ route('show',['id'=>$last_update_post->id]) }}">{{ $last_update_post->title }}</a>
                    <p>Дата изменения : <b>{{ $last_update_post->updated_at }}</b></p>
                </td>
            </tr>
            </tbody>
        </table>

    </main>
@endsection

@section('title', 'Информация - Блог')