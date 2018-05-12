@extends('layouts.app')

@include('web.header')

@section('layout')
    <div class="container">
        <div class="row">
            @if(!$user->threads->isEmpty())
            @foreach($user->threads as $thread)
                <a class="col-md-6" href="{{ action('ThreadController@show', $thread->id) }}">
                    <p class="title">
                        @foreach($thread->users as $user)
                            {{ $user->name }},
                        @endforeach
                    </p>
                </a>
            @endforeach
            @else
                <div class="empty">Нет сообщений.</div>
            @endif
        </div>
    </div>
@endsection