@extends('layouts.app')

@include('web.header')

@section('layout')
    <div class="container">
        <div class="row">
            @foreach($thread->messages as $message)
                <div class="col-md-6 {{ auth()->user()->id === $message->user->id ? 'own' : '' }}">
                    <div class="text">
                        {{ $message->text }}
                    </div>
                    <div class="author">
                        @if(auth()->user()->id === $message->user->id)
                            Вы
                        @else
                            {{ $message->user->name }}
                        @endif
                    </div>
                    <div class="date">
                        {{ $message->created_at->format('d.M.y') }}
                    </div>
                </div>
            @endforeach
        </div>
        <form action="{{ action('MessageController@create', $thread->id) }}" method="POST">
            {{ csrf_field() }}
            <textarea name="text" id="text" cols="30" rows="10"></textarea>
            <button type="submit">Отправить</button>
        </form>
    </div>
@endsection