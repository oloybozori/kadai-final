@extends ('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $selected  }}</li>
  </ol>
</nav>

@foreach ($posts as $post)
@include('commons.post_list')
@endforeach

<div class="pagination">
  {{ $posts->links() }}
</div>

@endsection