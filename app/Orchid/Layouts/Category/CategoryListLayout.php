<?php

namespace App\Orchid\Layouts\Category;

use App\Models\Category;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CategoryListLayout extends Table
{
    /**
     * Data source.
     *
     * @var string
     */
    protected $target = 'categories';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id', 'ID')
                ->width('50')
                ->alignCenter()
                ->cantHide(),

            TD::make('name', 'Name')
                ->width('50')
                ->alignCenter()
                ->cantHide(),

            TD::make('created_at', 'Created')
                ->render(function (Category $category) {
                    return $category->created_at->toDayDateTimeString();
                })
                ->width('50')
                ->alignCenter()
                ->cantHide(),

            TD::make('updated_at', 'Updated')
                ->render(function (Category $category) {
                    return $category->updated_at->toDayDateTimeString();
                })
                ->width('50')
                ->alignCenter()
                ->cantHide(),

            TD::make(__('Actions'))
                ->cantHide()
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Category $category) {
                    return DropDown::make()
                        ->icon('bs.three-dots-vertical')
                        ->list($this->getActionDropdownItems($category));
                }),
        ];
    }

    /**
     * Returns the items to be displayed in the action dropdown for the given
     * category.
     *
     * @param  \App\Models\Category $category
     * @return array
     */
    protected function getActionDropdownItems(Category $category): array
    {
        return [
            Link::make('Edit')
                ->route('platform.system.categories.edit', $category->id)
                ->icon('bs.pencil-fill'),

            Button::make('Delete')
                ->icon('bs.trash-fill')
                ->method('delete', [
                    'category' => $category->id,
                ]),
        ];
    }
}