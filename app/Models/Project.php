<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'problem',
        'tech',
        'icon',
        'gradient',
        'url',
        'url_label',
        'case_study_overview',
        'case_study_challenge',
        'case_study_solution',
        'case_study_features',
        'case_study_outcomes',
        'sort_order',
        'is_published',
    ];

    protected $casts = [
        'tech' => 'array',
        'case_study_features' => 'array',
        'case_study_outcomes' => 'array',
        'is_published' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected static function booted(): void
    {
        static::creating(function (Project $project) {
            if (! array_key_exists('sort_order', $project->getAttributes())) {
                $project->sort_order = ((int) static::max('sort_order')) + 1;
            }
        });

        static::saving(function (Project $project) {
            if (filled($project->title)) {
                $project->slug = static::uniqueSlug(Str::slug($project->title), $project->id);
            }

            $project->tech = self::normalizeStringList($project->tech);
            $project->case_study_features = self::normalizeStringList($project->case_study_features);
            $project->case_study_outcomes = self::normalizeStringList($project->case_study_outcomes);
        });
    }

    public static function normalizeStringList(mixed $value): array
    {
        if (is_array($value)) {
            return array_values(array_filter(array_map(
                fn ($item) => is_string($item) ? trim($item) : (string) $item,
                $value
            ), fn ($item) => $item !== ''));
        }

        if (is_string($value)) {
            $decoded = json_decode($value, true);

            if (is_array($decoded)) {
                return self::normalizeStringList($decoded);
            }

            return array_values(array_filter(array_map('trim', preg_split('/\s*,\s*/', $value))));
        }

        return [];
    }

    protected static function uniqueSlug(string $slug, ?int $ignoreId = null): string
    {
        $candidate = $slug;
        $suffix = 1;

        while (
            static::query()
                ->where('slug', $candidate)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $candidate = $slug.'-'.$suffix;
            $suffix++;
        }

        return $candidate;
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class)->orderBy('sort_order');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('title');
    }
}
