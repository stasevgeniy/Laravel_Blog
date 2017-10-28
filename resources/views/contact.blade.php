@extends('layouts.main')

@section('content')
    <main role="main">
        <h3>Связаться с нами</h3>
        @if (isset($send))
            <div class="alert alert-success" role="alert">
                Ваше обращение успешно отправлено
            </div>
        @endif
        <form class="form-horizontal" role="form" method="POST" action="{{ route('SendMail') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('mail') ? ' has-error' : '' }}">
                <label for="description">Ваш Email</label>
                <div>
                    <input id="mail" type="mail" class="form-control" name="mail" value="{{ old('mail') }}" required>

                    @if ($errors->has('mail'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mail') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                <label for="text">Текст</label>
                <div>
                    <textarea class="form-control" id="text" name="text" rows="3" required>{{ old('text') }}</textarea>

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
                        <i class="fa fa-btn fa-sign-in"></i> Отправить
                    </button>
                </div>
            </div>
        </form>

    </main>
@endsection

@section('title', 'Контакты - Блог')