<?php

namespace App\Orchid\Filters;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Fields\Input;

class RelationArticleFilter extends Filter
{
    /**
     * @return string
     */
    public function name(): string
    {
        return __('Article Title');
    }

    /**
     * @return array|null
     */
    public function parameters(): ?array
    {
        return ['title'];
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        return $builder->whereHas('article', function (Builder $query): void {
            $name = $this->request->get('title');

            $query->where('title', 'like', '%'.$name.'%');
        });
    }

    /**
     * @return iterable
     */
    public function display(): iterable
    {
        return [
            Input::make('title')
                ->title(__('Article Title'))
                ->placeholder(__('Example: Dolore'))
        ];
    }
}