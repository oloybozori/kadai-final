@extends ('layouts.app')

@section('content')
  <h1>Regions</h1>
  <h1>Categories</h1>
  <h1>Recent Posts</h1>
  @foreach ($posts as $post)
  <h2>{{ $post->title }}</h2>
  <p>{{ nl2br(e($post->content)) }}</p>
  <span>Posted by {{ $post->user->name }}</span>
  @if(Auth::check())
    @include('likes.like_button')
  @endif
    <span>Likeの数 {{ $post->likes_count }}</span>
  @endforeach
  <div>{!! link_to_route('signup.get', 'Sign up now!', [], []) !!}</div>
@endsection