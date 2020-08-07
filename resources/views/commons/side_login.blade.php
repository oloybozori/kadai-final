@if(Auth::check())

@else
<div id="side_login">

    {!! Form::open(['route' => 'login.post']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Email') !!}
            {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Log in', ['class' => 'btn btn-secondary btn-block']) !!}
    {!! Form::close() !!}            
</div>
@endif
