@extends ('layouts.app')
@section('content')
<div class="main_items">
        <h1>ユーザー情報</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>  
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{ $user->id }}</td>
      <td>{{ $user->name }}</td>
    </tr>
  </tbody>
</table>            
</div>

<div class="main_items">
<h1>Recent Posts</h1>
@include('commons.recent_posts')
<div id="more" class="text-right">
{{ link_to_route('my_posts', 'more', ['id' => Auth::user()->id], ['class' => 'btn btn-sm btn-secondary mt-4']) }}
</div>
</div>

<div class="main_items">
<h1>Likes</h1>    
<table class="table">
  <tbody>
    @foreach ($likes as $post)
    <tr>
      <td>{{ link_to_route('posts.show', $post->title, ['post' => $post->id], [] )  }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<div id="more" class="text-right">
{{ link_to_route('my_likes', 'more', ['id' => Auth::user()->id], ['class' => 'btn btn-sm btn-secondary mt-2']) }}
</div>
</div>    
@endsection