@extends('layouts.app')

@include('web.header')

@section('layout')
    <div class="profile">
        <div class="profile-private">
        <form action="{{action('UserController@update', auth()->user()->id )}}" method="post">
            {{csrf_field()}}



            <div class="form-group">
                <label for="name">Ваш Никнейм:</label>
                <input type="text" class="form-control" id="name" name="name"
                       value="{{old('name') ? old('name') : auth()->user()->name}}"/>
                @if($errors->has('name'))
                    <span class="error"> {{$errors->first('name')}} </span>
                @endif
            </div>


            <div class="form-group">
                <label for="email">Ваш e-mail:</label>
                <input type="email" class="form-control" id="email" name="email"
                       value="{{old('email') ? old('email') : auth()->user()->email}}"
                       placeholder="Введите email" />
                @if($errors->has('email'))
                    <span class="error"> {{$errors->first('email')}} </span>
                @endif
                <fieldset class="admin-filedsaet">
                    <label for="published_email">Показывать в профиле</label>
                    <input type="checkbox" name="published_email" id="published_email"
                            {{ auth()->user()->published_email === true  ?  ''  : 'checked=1'  }}/>
                </fieldset>

            </div>

            <div class="form-group">
                <label for="city">Город</label>
                <input type="text" class="form-control" id="city" name="city"
                       value="{{old('city') ? old('city') : auth()->user()->city}}"
                       placeholder="Хотите поделится где Вы живете?" />
                @if($errors->has('city'))
                    <span class="error"> {{$errors->first('city')}} </span>
                @endif
            </div>

            <div class="form-group">
                <label for="site">Укажите сайт:</label>
                <input type="text" class="form-control" id="site" name="site"
                       value="{{old('site') ? old('site') : auth()->user()->site}}"
                       placeholder="Если у Вас есть свой блог, укажите его" />
                @if($errors->has('site'))
                    <span class="error"> {{$errors->first('site')}} </span>
                @endif
            </div>




            <input type="submit">
        </form>
    </div>
    </div>
@endsection