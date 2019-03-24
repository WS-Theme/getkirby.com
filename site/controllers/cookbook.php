<?php

return function ($page) {

  $recipes = $page->children()->listed()->sortBy('slug', 'asc');

  return [
    'categories' => $recipes->pluck('category', ',', true),
    'recipes'    => $recipes
  ];

};
