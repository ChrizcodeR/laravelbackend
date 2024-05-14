<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\EmployesResource;
use App\MoonShine\Resources\RegistersResource;
use App\MoonShine\Resources\StartResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [

            MenuItem::make('Inicio', new StartResource(), 'heroicons.outline.presentation-chart-bar'),

            MenuItem::make('Registros', new RegistersResource(), 'heroicons.outline.inbox-arrow-down'),

            MenuItem::make('Empleados', new EmployesResource(), 'heroicons.outline.user-plus')
               ->badge(fn() => 'New'),

               MenuGroup::make('System',  [
                MenuItem::make('Admins', new MoonShineUserResource(), 'heroicons.outline.users'),
                MenuItem::make('Roles', new MoonShineUserRoleResource(), 'heroicons.hashtag'),
            ])
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
