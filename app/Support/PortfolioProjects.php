<?php

namespace App\Support;

use Illuminate\Support\Str;

class PortfolioProjects
{
    public static function all(): array
    {
        return array_map([self::class, 'normalize'], config('portfolio.projects', []));
    }

    public static function findBySlug(string $slug): ?array
    {
        foreach (self::all() as $project) {
            if ($project['slug'] === $slug) {
                return $project;
            }
        }

        return null;
    }

    public static function slug(array $project): string
    {
        return Str::slug($project['title']);
    }

    private static function normalize(array $project): array
    {
        $project['slug'] = self::slug($project);
        $caseStudy = $project['case_study'] ?? [];

        $project['case_study'] = [
            'overview' => $caseStudy['overview'] ?? $project['description'],
            'challenge' => $caseStudy['challenge'] ?? 'Design and deliver a reliable '.$project['category'].' solution that solves real operational needs while keeping the codebase maintainable and scalable.',
            'solution' => $caseStudy['solution'] ?? $project['description'],
            'features' => $caseStudy['features'] ?? self::inferFeatures($project),
            'outcomes' => $caseStudy['outcomes'] ?? [
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
                'src' => asset($image),
                'alt' => '',
                'caption' => '',
            ];
        }

        $path = $image['src'] ?? $image['path'] ?? '';

        return [
            'src' => str_starts_with($path, 'http') ? $path : asset($path),
            'alt' => $image['alt'] ?? '',
            'caption' => $image['caption'] ?? '',
        ];
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
