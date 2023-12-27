<?php

namespace App\Orchid\Elements\Buttons;

use Illuminate\Support\Str;
use Orchid\Screen\Actions\Link;

class CreateButton extends Link
{
    /**
     * Create a new button instance.
     *
     * @param  string|null  $name
     * @return \App\Orchid\Elements\Buttons\CreateButton|\Orchid\Screen\Actions\Link
     */
    public static function make(?string $name = null): CreateButton|Link
    {
        return (new static())
            ->name($name ?: __('Create'))
            ->icon('bs.plus-circle-fill')
            ->class('btn btn-primary')
            ->route(static::guessRouteName());
    }

    /**
     * Generates the 'create' route name based on the current route.
     * Replaces '.index' with '.create' in the current route name.
     *
     * @return string
     */
    protected static function guessRouteName(): string
    {
        $name = request()?->route()?->getName();

        if (Str::endsWith($name, '.index')) {
            $name = Str::replaceLast('.index', '', $name);
        }

        return $name.'.create';
    }
}