<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = config('portfolio.projects', []);

        foreach ($projects as $index => $data) {
            $project = Project::updateOrCreate(
                ['slug' => Str::slug($data['title'])],
                [
                    'title' => $data['title'],
                    'category' => $data['category'],
                    'description' => $data['description'],
                    'problem' => $data['problem'],
                    'tech' => $data['tech'],
                    'icon' => $data['icon'] ?? 'code',
                    'gradient' => $data['gradient'] ?? null,
                    'url' => $data['url'] ?? null,
                    'url_label' => $data['url_label'] ?? 'Visit Project',
                    'case_study_overview' => $data['case_study']['overview'] ?? null,
                    'case_study_challenge' => $data['case_study']['challenge'] ?? null,
                    'case_study_solution' => $data['case_study']['solution'] ?? null,
                    'case_study_features' => $data['case_study']['features'] ?? null,
                    'case_study_outcomes' => $data['case_study']['outcomes'] ?? null,
                    'sort_order' => $index,
                    'is_published' => true,
                ]
            );

            $project->images()->delete();

            foreach ($data['images'] ?? [] as $imageIndex => $image) {
                ProjectImage::create([
                    'project_id' => $project->id,
                    'path' => $image['src'] ?? $image['path'] ?? '',
                    'alt' => $image['alt'] ?? '',
                    'caption' => $image['caption'] ?? '',
                    'sort_order' => $imageIndex,
                ]);
            }
        }
    }
}
