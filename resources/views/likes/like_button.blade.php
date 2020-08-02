@if(Auth::user()->in_likes($post->id))
        {{-- unlikeボタンのフォーム --}}
    {!! Form::open(['route' => ['likes.unlike', $post->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unlike', ['class' => "btn btn-success btn-sm"]) !!}
        {!! Form::close() !!}
@else
        {{-- likeボタンのフォーム --}}
        {!! Form::open(['route' => ['likes.like', $post->id]]) !!}
            {!! Form::submit('like', ['class' => "btn btn-outline-success btn-sm"]) !!}
        {!! Form::close() !!}
@endif
