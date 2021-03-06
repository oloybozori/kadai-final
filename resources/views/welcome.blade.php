@extends ('layouts.app')

@section('top_page')
@include('commons.top_image')
@endsection

@section('content')

<div class="main_items">
  <h1>Regions</h1>
  <ul class="top-lists">
    @foreach ($regions as $region)
    <li>{{ link_to_route('regions.show', $region->region, ['region' => $region->id],[]) }}</li>
    @endforeach
  </ul>
</div>

<div class="main_items">
  <h1>Categories</h1>
  <ul class="top-lists">
    @foreach ($categories as $category)
    <li>{{ link_to_route('categories.show', $category->category, ['category' => $category->id],[]) }}</li>
    @endforeach
  </ul>
</div>
  
<div class="main_items">
  <h1>Recent Posts</h1>
  @include('commons.recent_posts')
</div>

@endsection