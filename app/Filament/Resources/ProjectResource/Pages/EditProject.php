<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use App\Filament\Resources\ProjectResource\Concerns\SyncsProjectGallery;
use Filament\Resources\Pages\EditRecord;

class EditProject extends EditRecord
{
    use SyncsProjectGallery;

    protected static string $resource = ProjectResource::class;

    protected function afterSave(): void
    {
        $this->syncProjectGallery();
    }
}
