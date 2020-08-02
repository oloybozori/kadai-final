@extends ('layouts.app')

@section('content')
  indexページ<br>
  {!! link_to_route('signup.get', 'Sign up now!', [], []) !!}

@endsection