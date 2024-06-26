<?php

declare(strict_types=1);

use App\Orchid\Screens\Article\ArticleEditScreen;
use App\Orchid\Screens\Article\ArticleListScreen;
use App\Orchid\Screens\Category\CategoryEditScreen;
use App\Orchid\Screens\Category\CategoryListScreen;
use App\Orchid\Screens\Comment\CommentEditScreen;
use App\Orchid\Screens\Comment\CommentListScreen;
use App\Orchid\Screens\Examples\ExampleActionsScreen;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleGridScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));

// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push($user->name, route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create')));

// Platform > System > Users
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));

// Platform > System > Category
Route::screen('categories', CategoryListScreen::class)
    ->name('platform.system.categories')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Category'));

// Platform > System > Categories > Category
Route::screen('categories/{category}/edit', CategoryEditScreen::class)
    ->name('platform.system.categories.edit')
    ->breadcrumbs(fn (Trail $trail, $category) => $trail
        ->parent('platform.system.categories')
        ->push($category->name, route('platform.system.categories.edit', $category)));

// Platform > System > Category > Create
Route::screen('categories/create', CategoryEditScreen::class)
    ->name('platform.system.categories.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.system.categories')
        ->push(__('Create'), route('platform.system.categories.create')));

// Platform > System > Article
Route::screen('articles', ArticleListScreen::class)
    ->name('platform.system.articles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Articles'));

// Platform > System > Article > Create
Route::screen('articles/create', ArticleEditScreen::class)
    ->name('platform.system.articles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.system.articles')
        ->push(__('Create'), route('platform.system.articles.create')));

// Platform > System > Articles > Article
Route::screen('articles/{article}/edit', ArticleEditScreen::class)
    ->name('platform.system.articles.edit')
    ->breadcrumbs(fn (Trail $trail, $article) => $trail
        ->parent('platform.system.articles')
        ->push($article->id, route('platform.system.articles.edit', $article)));

// Platform > System > Comment
Route::screen('comments', CommentListScreen::class)
    ->name('platform.system.comments')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Comment'));

// Platform > System > Comment > Create
Route::screen('comments/create', CommentEditScreen::class)
    ->name('platform.system.comments.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.system.comments')
        ->push(__('Create'), route('platform.system.comments.create')));

//Platform > System > Comments > Comment
Route::screen('comments/{comment}/edit', CommentEditScreen::class)
    ->name('platform.system.comments.edit')
    ->breadcrumbs(fn (Trail $trail, $comment) => $trail
        ->parent('platform.system.comments')
        ->push(__($comment->id), route('platform.system.comments.edit', $comment)));

//Route::screen('idea', Idea::class, 'platform.screens.idea');
