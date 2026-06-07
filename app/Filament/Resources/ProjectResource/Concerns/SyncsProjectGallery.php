<?php

namespace App\Filament\Resources\ProjectResource\Concerns;

trait SyncsProjectGallery
{
    protected array $galleryPathsToSync = [];

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['gallery_paths'] = $this->record->images()
            ->orderBy('sort_order')
            ->pluck('path')
            ->all();

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->galleryPathsToSync = array_values(array_filter(
            is_array($data['gallery_paths'] ?? null) ? $data['gallery_paths'] : []
        ));

        unset($data['gallery_paths']);

        return $data;
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $this->mutateFormDataBeforeSave($data);
    }

    protected function syncProjectGallery(): void
    {
        $paths = $this->galleryPathsToSync;

        $this->record->images()->whereNotIn('path', $paths)->delete();

        foreach ($paths as $index => $path) {
            $this->record->images()->updateOrCreate(
                ['path' => $path],
                [
                    'sort_order' => $index,
                    'alt' => null,
                    'caption' => null,
                ]
            );
        }
    }
}
