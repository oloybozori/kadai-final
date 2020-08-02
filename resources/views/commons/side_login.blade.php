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
            {!! Form::submit('Log in', ['class' => 'btn btn-secondary btn-block']) !!}
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-success btn-block']) !!}
            {!! link_to_route('logout.get', 'Log out', [], ['class' => 'btn btn-secondary btn-block']) !!}            
        {!! Form::close() !!}


            

    </div>