@extends('admin.layout')

@section('content')
    <div class="container">
        <form action="{{ action('Admin\UserController@store' )  }}" method="post">
            {{csrf_field()}}
            <fieldset>
                <label for="name">Имя</label>
                <input type="text" name="name" id="name"
                       value="{{old('name')}}" />
                @if($errors->has('name'))
                    <span class="error"> {{ $errors->first('name') }} </span>
                @endif

            </fieldset>
            <fieldset>
                <label for="email">Email</label>
                <input type="email" name="email" id="email"
                       value="{{old('email')}}" />
                @if($errors->has('email'))
                    <span class="error"> {{ $errors->first('email') }} </span>
                @endif
            </fieldset>
            <fieldset>
                <label for="password">Password</label>
                <input type="password" name="password" id="password"
                       value="{{old('password')}}" />
                @if($errors->has('password'))
                    <span class="error"> {{ $errors->first('password') }} </span>
                @endif
            </fieldset>
            <fieldset>
                <label for="role">Role</label>
                <select name="role" id="role">
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->title }}</option>
                    @endforeach
                </select>
                @if($errors->has('role'))
                    <span class="error"> {{ $errors->first('role') }} </span>
                @endif
            </fieldset>

            <button type="submit">Сохранить</button>
        </form>
    </div>

@endsection