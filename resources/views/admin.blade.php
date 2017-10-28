@extends('layouts.main')

@section('content')
    <main role="main">

        <form action="{{ route('admin') }}" method="POST" class="form-signin">
            {{ csrf_field() }}
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input name="mail" type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <hr>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>

        </form>

    </main>
@endsection

@section('title', 'Админ панель - Блог')