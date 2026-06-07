<?php

namespace App\Support;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioProjects
{
    public static function all(): array
    {
        if (Project::query()->exists()) {
            return Project::query()
                ->published()
                ->ordered()
                ->with('images')
                ->get()
                ->map(fn (Project $project) => self::fromModel($project))
                ->all();
        }

        return array_map([self::class, 'normalize'], config('portfolio.projects', []));
    }

    public static function findBySlug(string $slug): ?array
    {
        if (Project::query()->exists()) {
            $project = Project::query()
                ->published()
                ->where('slug', $slug)
                ->with('images')
                ->first();

            return $project ? self::fromModel($project) : null;
        }

        foreach (self::all() as $project) {
            if ($project['slug'] === $slug) {
                return $project;
            }
        }

        return null;
    }

    public static function fromModel(Project $project): array
    {
        $caseStudy = array_filter([
            'overview' => $project->case_study_overview,
            'challenge' => $project->case_study_challenge,
            'solution' => $project->case_study_solution,
            'features' => $project->case_study_features,
            'outcomes' => $project->case_study_outcomes,
        ], fn ($value) => ! is_null($value) && $value !== [] && $value !== '');

        return self::normalize([
            'title' => $project->title,
            'slug' => $project->slug,
            'category' => $project->category,
            'description' => $project->description,
            'problem' => $project->problem,
            'tech' => Project::normalizeStringList($project->tech ?? []),
            'icon' => $project->icon,
            'gradient' => $project->gradient,
            'url' => $project->url,
            'url_label' => $project->url_label,
            'case_study' => $caseStudy,
            'images' => $project->images->map(fn ($image) => [
                'src' => $image->path,
                'alt' => $image->alt,
                'caption' => $image->caption,
            ])->all(),
        ]);
    }

    public static function slug(array $project): string
    {
        return Str::slug($project['title']);
    }

    private static function normalize(array $project): array
    {
        $project['slug'] = $project['slug'] ?? self::slug($project);
        $project['tech'] = Project::normalizeStringList($project['tech'] ?? []);
        $caseStudy = $project['case_study'] ?? [];

        $features = array_key_exists('features', $caseStudy)
            ? Project::normalizeStringList($caseStudy['features'])
            : null;
        $outcomes = array_key_exists('outcomes', $caseStudy)
            ? Project::normalizeStringList($caseStudy['outcomes'])
            : null;

        $project['case_study'] = [
            'overview' => $caseStudy['overview'] ?? $project['description'],
            'challenge' => $caseStudy['challenge'] ?? 'Design and deliver a reliable '.$project['category'].' solution that solves real operational needs while keeping the codebase maintainable and scalable.',
            'solution' => $caseStudy['solution'] ?? $project['description'],
            'features' => ($features !== null && count($features) > 0) ? $features : self::inferFeatures($project),
            'outcomes' => ($outcomes !== null && count($outcomes) > 0) ? $outcomes : [
                'Delivered a functional, production-ready solution aligned with project goals.',
                'Applied '.$project['problem'].' practices across planning, implementation, and testing.',
            ],
        ];

        $project['url'] = $project['url'] ?? null;
        $project['url_label'] = $project['url_label'] ?? 'Visit Project';
        $project['images'] = array_values(array_map([self::class, 'normalizeImage'], $project['images'] ?? []));

        return $project;
    }

    private static function normalizeImage(array|string $image): array
    {
        if (is_string($image)) {
            return [
                'src' => self::imageUrl($image),
                'alt' => '',
                'caption' => '',
            ];
        }

        $path = $image['src'] ?? $image['path'] ?? '';

        return [
            'src' => self::imageUrl($path),
            'alt' => $image['alt'] ?? '',
            'caption' => $image['caption'] ?? '',
        ];
    }

    private static function imageUrl(string $path): string
    {
        $path = ltrim($path, '/');

        if ($path === '') {
            return '';
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        if (str_starts_with($path, 'storage/')) {
            return asset($path);
        }

        if (Storage::disk('public')->exists($path)) {
            return asset('storage/'.$path);
        }

        return asset($path);
    }

    private static function inferFeatures(array $project): array
    {
        if (preg_match('/Key features include (.+)\./i', $project['description'], $matches)) {
            return array_values(array_filter(array_map('trim', preg_split('/,\s*(?:and )?/i', $matches[1]))));
        }

        $features = [rtrim(Str::before($project['description'], '.'), '.').'.'];

        foreach (array_slice($project['tech'], 0, 3) as $tech) {
            $features[] = 'Implemented core functionality using '.$tech.'.';
        }

        return array_slice($features, 0, 4);
    }
}
