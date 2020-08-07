
<div class="row ml-1"> 
     @foreach ($posts as $post)
            <div class="card col-4">
                <div class="card-body">
                    <div class="card-title">
                            <h5>{{ link_to_route('posts.show', $post->title, ['post' => $post->id], [] )  }}</h5>
                    </div>
                </div>
            </div>
    @endforeach
</div>
