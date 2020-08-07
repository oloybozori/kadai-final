<div class="post-view">
    <h2>{{ link_to_route('posts.show', $post->title, ['post' => $post->id], [] )  }}</h2>
    <div class="text-right">Date: {{ $post->user->created_at }}</div>


    <p>{!! nl2br(htmlspecialchars($post->content)) !!}</p>


    <div class="post-status">
        <span>Posted by {{ $post->user->name }}</span><br>
        <span>Region: {{ $post->region->region }}</span>, 
        @foreach ($categories as $category)
        <span>Category: {{ $category }}</span>
        @endforeach
    </div>
</div>

@if(Auth::check())
<div class="post-edit btn-group mt-1">
    @include('likes.like_button')
    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm ml-1']) !!}
    {!! Form::close() !!}
</div>    
@endif
