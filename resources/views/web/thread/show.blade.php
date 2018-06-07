@extends('layouts.app')

@include('web.header')

@section('layout')
    <div class="container">
        <div class="row">
            @foreach($thread->messages as $message)
                <div class="{{ auth()->user()->id === $message->user->id ? 'own' : '' }}" >
                <div class="author">
                    @if(auth()->user()->id === $message->user->id)
                       <h4> Вы</h4>
                    @else
                       <h4> {{ $message->user->name }}</h4>
                    @endif
                </div>
                <div class="date">
                    <date>{{ $message->created_at->format('d.M.y') }}</date>
                </div>
                    <div class="text">
                        <p>{{ $message->text }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <form action="{{ action('MessageController@create', $thread->id) }}" method="POST">
            {{ csrf_field() }}
            <label for="label-meseng">Введите текст сообщения</label>
            <textarea name="text" id="text" cols="160" rows="5"></textarea>
            <button style="margin-bottom: 26px;" class="btn btn-danger" type="submit">Отправить</button>
        </form>
    </div>
@endsection