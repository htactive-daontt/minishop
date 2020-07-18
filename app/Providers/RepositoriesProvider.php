<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\Categories\CategoriesRepository::class, \App\Repositories\Categories\CategoriesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Comments\CommentsRepository::class, \App\Repositories\Comments\CommentsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contacts\ContactsRepository::class, \App\Repositories\Contacts\ContactsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\GiftCodes\GiftCodesRepository::class, \App\Repositories\GiftCodes\GiftCodesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\News\NewsRepository::class, \App\Repositories\News\NewsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PayMents\PayMentsRepository::class, \App\Repositories\PayMents\PayMentsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Products\ProductsRepository::class, \App\Repositories\Products\ProductsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Roles\RolesRepository::class, \App\Repositories\Roles\RolesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Slides\SlidesRepository::class, \App\Repositories\Slides\SlidesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Users\UsersRepository::class, \App\Repositories\Users\UsersRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Bills\BillsRepository::class, \App\Repositories\Bills\BillsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BillsDetail\BillsDetailRepository::class, \App\Repositories\BillsDetail\BillsDetailRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Permissions\PermissionsRepository::class, \App\Repositories\Permissions\PermissionsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ModelHasPermissions\ModelHasPermissionsRepository::class, \App\Repositories\ModelHasPermissions\ModelHasPermissionsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RoleHasPermissions\RoleHasPermissionsRepository::class, \App\Repositories\RoleHasPermissions\RoleHasPermissionsRepositoryEloquent::class);

    }
}
