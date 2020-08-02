@extends ('layouts.app')
@section('content')
    <div>
        <h1>Log in</h1>
    </div>
    <div id="register">
        {!! Form::open(['route' => 'login.post']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Email') !!}
                {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
            {!! Form::submit('Log in', ['class' => 'btn btn-secondary']) !!}
        {!! Form::close() !!}
    </div>
@endsection