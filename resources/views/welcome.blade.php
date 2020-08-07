@extends ('layouts.app')

@section('top_page')
@include('commons.top_image')
@endsection

@section('content')

<div class="main_items">
  <h1>Regions</h1>
  @foreach ($regions as $region)
  <span>{{ link_to_route('regions.show', $region->region, ['region' => $region->id],[]) }}</span>
  @endforeach
</div>

<div class="main_items">
  <h1>Categories</h1>
  @foreach ($categories as $category)
  <span>{{ link_to_route('categories.show', $category->category, ['category' => $category->id],[]) }}</span>
  @endforeach
</div>
  
<div class="main_items">
  <h1>Recent Posts</h1>
  @include('commons.recent_posts')
</div>

@endsection