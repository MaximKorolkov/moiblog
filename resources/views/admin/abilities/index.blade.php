@extends('admin.layout')

@section('content')
    @if ($roles->count())
        <form role="form" method="POST" action="{{ action('Admin\AbilityController@update') }}">
            {{ csrf_field() }}
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        {{-- TODO title --}}
                        <th>{{ trans("ability.Access") }}</th>
                        @foreach ($roles as $role)
                            <th class="text-center">{{ $role->title }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($actions as $model => $modelActions)
                        @foreach ($modelActions as $modelAction)
                            @if ($loop->first)
                                <tr class="success">
                                    {{-- TODO Role Name --}}
                                    <td colspan="{{ count($roles) + 1 }}"><b>{{ trans('ability.models' ) .' '. class_basename($model)}}</b></td>
                                </tr>
                            @endif
                            <tr>
                                {{-- TODO Role action --}}
                                <td>{{  $modelAction }}</td>
                                @foreach ($roles as $role)
                                    <td class="text-center">
                                        <input type="checkbox"
                                               name="abilities[{{$role->name}}][{{$model}}][{{$modelAction}}]"
                                                {{ $role->can($modelAction, $model !== 'global' ? $model : null) ? 'checked=checked' : '' }}
                                        >
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    @endif
@endsection