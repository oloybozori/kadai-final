@extends ('layouts.app')

@section('content')
@include('commons.post_view')

<div class="post-view">
<h3>Comments</h3>

@if (Auth::check())
{{ Form::model($comments, ['route' => 'comments.store']) }}

    <div class="form-group">
        {!! Form::label('comment', 'Title:') !!}
        {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
        {!! Form::hidden('user_id', Auth::user()->id) !!}
        {!! Form::hidden('post_id', $post->id) !!}
    </div>

        {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}

{{ Form::close() }}
@endif

@foreach ($comments as $comment)
<p>{!! nl2br(htmlspecialchars($comment->comment)) !!}</p>
<p>User: {!! htmlspecialchars($comment->user->name) !!}</p>
<p>date: {!! htmlspecialchars($comment->created_at) !!}</p>
@endforeach
</div>
@endsection