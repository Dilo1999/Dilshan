@php($projects = \App\Support\PortfolioProjects::all())

<section id="projects" class="relative py-32 portfolio-section-alt">
    <div class="mx-auto max-w-7xl px-6">
        <x-portfolio.section-heading
            title="Featured Projects"
            :subtitle="config('portfolio.projects_subtitle')"
        />

        <div class="grid gap-6 md:grid-cols-2">
            @foreach ($projects as $project)
                <article
                    class="group animate-on-scroll glass-panel p-8 hover:-translate-y-2"
                    data-animate="fadeInUp"
                    data-delay="{{ $loop->index * 0.1 }}"
                >
                    <div class="space-y-6">
                        <div class="flex items-start justify-between">
                            <div class="icon-box p-4 transition-transform group-hover:scale-105">
                                <x-portfolio.icon :name="$project['icon']" class="h-8 w-8 text-zinc-600" />
                            </div>
                            <span class="tag-pill text-xs">{{ $project['category'] }}</span>
                        </div>

                        <div>
                            <h3 class="mb-3 text-2xl font-bold text-zinc-900">
                                {{ $project['title'] }}
                            </h3>
                            <p class="mb-4 leading-relaxed text-zinc-600">{{ $project['description'] }}</p>

                            <div class="inner-panel mb-4 p-4">
                                <div class="mb-1 text-sm text-zinc-500">Role</div>
                                <div class="text-sm text-zinc-700">{{ $project['problem'] }}</div>
                            </div>
                        </div>

                        <div>
                            <div class="mb-3 text-sm text-zinc-500">Tech Stack</div>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($project['tech'] as $tech)
                                    <span class="tech-tag">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>

                        <a href="{{ route('projects.show', $project['slug']) }}" class="btn-primary group/btn w-full">
                            <span>View Case Study</span>
                            <x-portfolio.icon name="arrow-right" class="h-4 w-4 transition-transform group-hover/btn:translate-x-1" />
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
