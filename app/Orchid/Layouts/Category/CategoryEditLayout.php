<?php

namespace App\Orchid\Layouts\Category;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class CategoryEditLayout extends Rows
{
    /**
     * Defines the layout fields for category editing.
     *
     * @return iterable
     */
    protected function fields(): iterable
    {
        return [
            Input::make('categories.name')
            ->title('Name')
            ->minlength(1)
            ->maxlength(5)
        ];
    }
}