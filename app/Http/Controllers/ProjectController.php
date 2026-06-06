<?php

namespace App\Http\Controllers;

use App\Support\PortfolioProjects;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function show(string $slug): View
    {
        $project = PortfolioProjects::findBySlug($slug);

        abort_unless($project, 404);

        $relatedProjects = collect(PortfolioProjects::all())
            ->filter(fn (array $item) => $item['slug'] !== $project['slug'])
            ->take(2)
            ->values()
            ->all();

        return view('project.show', [
            'project' => $project,
            'relatedProjects' => $relatedProjects,
            'title' => $project['title'].' | '.config('portfolio.name'),
        ]);
    }
}
