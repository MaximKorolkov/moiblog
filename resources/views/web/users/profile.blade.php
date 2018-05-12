@extends('layouts.app')

@section('title' , "Личный кабинет" . " " . auth()->user()->name)


@include('web.header')

@section('layout')

<div class="profile">
    <div class="profile-content">
        <div class="left-content">

            <div class="profile-setting-navigation">
            <ul>
                {{-- Refactoring --}}
                @if($user->id == auth()->user()->id)
                    <li><a href="{{ action('UserController@edit', $user->id) }}">Настройки</a></li>
                @else
                    @if(!auth()->user()->followers->contains($user->id))
                        <li>
                            <form method="post" action="{{ action('UserController@addSubscribe', $user->id) }}">
                                {{ csrf_field() }}
                                <button type="submit">Подписаться</button>
                            </form>
                        </li>
                    @else
                        <li>
                            <form method="post" action="{{ action('UserController@deleteSubscribe', $user->id) }}">
                                {{ csrf_field() }}
                                <button type="submit">Отписатся</button>
                            </form>
                        </li>
                    @endif
                @endif
                <li><a href="#">Друзья</a></li>
                <li><a href="#">Коментарии</a></li>
                <li><a href="#">Посты</a></li>
                <li>
                    @if($user->id == auth()->user()->id)
                        <a href="{{ action('ThreadController@index', $user->id) }}">Сообщения</a>
                    @else
                        <a href="{{ action('ThreadController@create', $user->id) }}">Написать сообщение</a>
                    @endif
                </li>
            </ul>
            </div>
        </div>
        <div class="center-content">

            <ul>

                <li> Ваш ник : {{auth()->user()->name}}</li>
                @if($user->published_email)
                    <li>Ваша почта : {{auth()->user()->email}}</li>
                @endif
                <li>Ваш город : {{$user->city}}</li>
                <li>Ваш сайт : <a href="{{ $user->site }}">{{ $user->site }}</a></li>
            </ul>



        </div>

        <div class="right-content">

        </div>
    </div>
</div>

@endsection