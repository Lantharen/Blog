<?php

namespace App\Orchid\Screens\Category;

use App\Http\Requests\Category\SaveCategoryRequest;
use App\Models\Category;
use App\Orchid\Elements\Buttons\DeleteButton;
use App\Orchid\Elements\Buttons\SaveButton;
use App\Orchid\Layouts\Category\CategoryEditLayout;
use Illuminate\Http\RedirectResponse;
use Orchid\Support\Facades\Toast;

class CategoryEditScreen extends AbstractCategoryScreen
{
    /**
     * @var \App\Models\Category|null
     */
    public ?Category $category = null;


    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Category $category): iterable
    {
        return [
            'categories' => $category
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        if (optional($this->category)->exists) {
            return __('Edit Category: :name', [
                'name' => $this->category->name
            ]);
        }

        return __('Create Category');
    }

    /**
     * The screen's action buttons.
     *
     * @uses \App\Orchid\Screens\Category\AbstractCategoryScreen::delete()
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            SaveButton::make(),

            DeleteButton::make(),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            CategoryEditLayout::class,
        ];
    }

    /**
     * @param  \App\Models\Category  $category
     * @param  \App\Http\Requests\Category\SaveCategoryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Category $category, SaveCategoryRequest $request) : RedirectResponse
    {
        $category->fill($request->input('categories'))->save();

        Toast::info('Category successfully created.');

        return redirect()->route('platform.system.categories');
    }
}
