<?php
    $regions = App\Region::all();
    $categories = App\Category::all();
?>

<div id="side_menu" class="dropdown">
  <button class="btn btn-secondary btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Regions
  </button>
  <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
    @foreach ($regions as $region)
    {{ link_to_route('regions.show', $region->region, ['region' => $region->id],['class' => 'dropdown-item']) }} 
    @endforeach
  </div>
</div>

<div class="dropdown mt-3">
  <button class="btn btn-secondary btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Categories
  </button>
  <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
    @foreach ($categories as $category)
    {{ link_to_route('categories.show', $category->category, ['category' => $category->id],['class' => 'dropdown-item']) }}
    @endforeach
  </div>
</div>

@include('commons.side_login')

