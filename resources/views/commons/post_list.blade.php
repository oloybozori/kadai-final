<div class="post-view">
    <h2>{{ link_to_route('posts.show', $post->title, ['post' => $post->id], [] )  }}</h2>
    <div class="text-right">Date: {{ $post->user->created_at }}</div>
    <p>{!! nl2br(htmlspecialchars($post->content)) !!}</p>
</div>
