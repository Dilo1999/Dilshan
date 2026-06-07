<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use App\Filament\Resources\ProjectResource\Concerns\SyncsProjectGallery;
use Filament\Resources\Pages\CreateRecord;

class CreateProject extends CreateRecord
{
    use SyncsProjectGallery;

    protected static string $resource = ProjectResource::class;

    protected function afterCreate(): void
    {
        $this->syncProjectGallery();
    }
}
