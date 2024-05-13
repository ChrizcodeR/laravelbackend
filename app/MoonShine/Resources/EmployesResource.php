<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employes;
use Illuminate\Support\Facades\Request;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Text;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number as FieldsNumber;

use function PHPUnit\Framework\assertNotTrue;

/**
 * @extends ModelResource<Empleados>
 */
class EmployesResource extends ModelResource
{
    protected string $model = Employes::class;

    protected string $title = 'Empleados Lista';

    protected bool $createInModal = true;

    protected bool $editInModal = true;

    protected bool $detailInModal = true;

    protected bool $saveFilterState = true;

    public function redirectAfterSave(): string
    {
        $referer = Request::header('referer');
        return $referer ?: '/';
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
{
    return [
        Block::make([
            ID::make()->sortable(),
            FieldsNumber::make('employed'),
            Text::make('name'),
            Text::make('lastname'),
            Text::make('email'),
            Text::make('address'),
            Image::make('photo'),
            FieldsNumber::make('position_id')
        ]),
    ];
}



    /**
     * @param Employees $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
