@php
    $caseStudy = $project['case_study'];
@endphp

<x-portfolio.layout :title="$title">
    <section class="relative overflow-hidden pt-24 pb-16 portfolio-mesh">
        <div class="relative z-10 mx-auto max-w-5xl px-6">
            <a
                href="{{ route('home') }}#projects"
                class="animate-now mb-8 inline-flex items-center gap-2 text-sm text-gray-400 transition-colors hover:text-white"
                data-animate="fadeIn"
            >
                <x-portfolio.icon name="arrow-left" class="h-4 w-4" />
                <span>Back to Projects</span>
            </a>

            <div class="animate-now mb-10 flex flex-wrap items-start justify-between gap-6" data-animate="fadeInUp">
                <div class="flex items-start gap-5">
                    <div class="icon-box p-4">
                        <x-portfolio.icon :name="$project['icon']" class="h-10 w-10 text-gray-300" />
                    </div>
                    <div>
                        <span class="tag-pill mb-3 inline-block text-xs">{{ $project['category'] }}</span>
                        <h1 class="text-4xl font-bold text-white md:text-5xl">{{ $project['title'] }}</h1>
                        <p class="mt-4 max-w-3xl text-lg leading-relaxed text-gray-300">{{ $project['description'] }}</p>
                    </div>
                </div>
            </div>

            <div class="grid gap-6 md:grid-cols-3">
                <div class="glass-panel animate-now p-6 md:col-span-1" data-animate="fadeInUp" data-delay="0.1">
                    <div class="mb-2 text-sm text-gray-400">Role</div>
                    <div class="text-lg font-medium text-white">{{ $project['problem'] }}</div>
                </div>

                <div class="glass-panel animate-now p-6 md:col-span-2" data-animate="fadeInUp" data-delay="0.15">
                    <div class="mb-3 text-sm text-gray-400">Tech Stack</div>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($project['tech'] as $tech)
                            <span class="tech-tag">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="relative z-10 mx-auto mt-8 max-w-7xl px-4 md:px-6">
            <x-portfolio.project-gallery :project="$project" />
        </div>
    </section>

    <section class="relative py-16 portfolio-section">
        <div class="mx-auto max-w-5xl space-y-6 px-6">
            <article class="glass-panel animate-on-scroll p-8" data-animate="fadeInUp">
                <h2 class="mb-4 text-2xl font-bold text-white">Project Overview</h2>
                <p class="leading-relaxed text-gray-300">{{ $caseStudy['overview'] }}</p>
            </article>

            <div class="grid gap-6 md:grid-cols-2">
                <article class="glass-panel animate-on-scroll p-8" data-animate="fadeInUp" data-delay="0.1">
                    <div class="mb-4 flex items-center gap-3">
                        <div class="icon-box p-2">
                            <x-portfolio.icon name="target" class="h-5 w-5 text-gray-300" />
                        </div>
                        <h2 class="text-xl font-bold text-white">The Challenge</h2>
                    </div>
                    <p class="leading-relaxed text-gray-300">{{ $caseStudy['challenge'] }}</p>
                </article>

                <article class="glass-panel animate-on-scroll p-8" data-animate="fadeInUp" data-delay="0.15">
                    <div class="mb-4 flex items-center gap-3">
                        <div class="icon-box p-2">
                            <x-portfolio.icon name="zap" class="h-5 w-5 text-gray-300" />
                        </div>
                        <h2 class="text-xl font-bold text-white">The Solution</h2>
                    </div>
                    <p class="leading-relaxed text-gray-300">{{ $caseStudy['solution'] }}</p>
                </article>
            </div>

            <article class="glass-panel animate-on-scroll p-8" data-animate="fadeInUp" data-delay="0.2">
                <h2 class="mb-6 text-2xl font-bold text-white">Key Features</h2>
                <div class="grid gap-4 md:grid-cols-2">
                    @foreach ($caseStudy['features'] as $feature)
                        <div class="inner-panel flex items-start gap-3 p-4">
                            <div class="mt-1.5 h-2 w-2 shrink-0 rounded-full bg-cyan-400"></div>
                            <span class="text-gray-300">{{ $feature }}</span>
                        </div>
                    @endforeach
                </div>
            </article>

            <article class="glass-panel animate-on-scroll p-8" data-animate="fadeInUp" data-delay="0.25">
                <h2 class="mb-6 text-2xl font-bold text-white">Outcomes</h2>
                <div class="space-y-4">
                    @foreach ($caseStudy['outcomes'] as $outcome)
                        <div class="flex items-start gap-3">
                            <x-portfolio.icon name="badge" class="mt-0.5 h-5 w-5 shrink-0 text-gray-400" />
                            <span class="text-gray-300">{{ $outcome }}</span>
                        </div>
                    @endforeach
                </div>
            </article>
        </div>
    </section>

    @if (count($relatedProjects) > 0)
        <section class="relative py-16 pb-32 portfolio-section-alt">
            <div class="mx-auto max-w-5xl px-6">
                <h2 class="animate-on-scroll mb-8 text-2xl font-bold text-white" data-animate="fadeInUp">More Projects</h2>
                <div class="grid gap-6 md:grid-cols-2">
                    @foreach ($relatedProjects as $related)
                        <a
                            href="{{ route('projects.show', $related['slug']) }}"
                            class="group animate-on-scroll glass-panel block p-6 hover:-translate-y-1"
                            data-animate="fadeInUp"
                            data-delay="{{ $loop->index * 0.1 }}"
                        >
                            <div class="mb-4 flex items-center justify-between">
                                <div class="icon-box p-3">
                                    <x-portfolio.icon :name="$related['icon']" class="h-6 w-6 text-gray-300" />
                                </div>
                                <span class="tag-pill text-xs">{{ $related['category'] }}</span>
                            </div>
                            <h3 class="mb-2 text-xl font-bold text-white">{{ $related['title'] }}</h3>
                            <p class="line-clamp-2 text-sm text-gray-400">{{ $related['description'] }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-portfolio.layout>
