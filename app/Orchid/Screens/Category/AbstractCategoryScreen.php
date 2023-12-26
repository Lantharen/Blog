<?php

namespace App\Orchid\Screens\Category;

use App\Models\Category;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

abstract class AbstractCategoryScreen extends Screen
{
    /**
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function delete(Category $category): void
    {
        $category->delete();

        Toast::info('Category removed.');

    }
}