@php
    $caseStudy = $project['case_study'];
@endphp

<x-portfolio.layout :title="$title">
    {{-- Hero --}}
    <section class="relative overflow-hidden pt-24 pb-12">
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <div class="absolute -top-24 left-1/4 h-72 w-72 rounded-full bg-blue-500/15 blur-[100px]"></div>
            <div class="absolute top-1/3 right-1/4 h-64 w-64 rounded-full bg-purple-500/15 blur-[100px]"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-6xl px-6">
            <a
                href="{{ route('home') }}#projects"
                class="animate-now mb-10 inline-flex items-center gap-2 rounded-lg border border-white/10 bg-white/5 px-4 py-2 text-sm text-gray-400 transition-all hover:border-white/20 hover:text-white"
                data-animate="fadeIn"
            >
                <x-portfolio.icon name="arrow-left" class="h-4 w-4" />
                <span>Back to Projects</span>
            </a>

            <div class="animate-now max-w-4xl" data-animate="fadeInUp">
                <div class="mb-5 flex flex-wrap items-center gap-3">
                    <span class="tag-pill text-xs">{{ $project['category'] }}</span>
                    <span class="project-detail-label">Case Study</span>
                </div>

                <h1 class="text-3xl font-bold leading-tight text-white sm:text-4xl md:text-5xl lg:text-[3.25rem]">
                    {{ $project['title'] }}
                </h1>

                <p class="mt-5 text-lg leading-relaxed text-gray-400 md:text-xl">
                    {{ $project['description'] }}
                </p>
            </div>
        </div>
    </section>

    {{-- Gallery --}}
    @if (count($project['images']) > 0 || ! empty($project['url']))
        <section class="relative pb-16">
            <div class="relative z-10 mx-auto max-w-6xl px-6">
                <x-portfolio.project-gallery
                    :project="$project"
                    :show-external-link="false"
                    class="animate-on-scroll"
                    data-animate="fadeInUp"
                    data-delay="0.1"
                />
            </div>
        </section>
    @endif

    {{-- Case study body --}}
    <section class="relative pb-20 portfolio-section-alt">
        <div class="mx-auto max-w-6xl px-6">
            <div class="grid gap-8 lg:grid-cols-12 lg:gap-10">
                {{-- Sidebar --}}
                <aside class="space-y-6 lg:col-span-4 lg:sticky lg:top-24 lg:self-start">
                    <div class="animate-on-scroll project-detail-card" data-animate="fadeInUp">
                        <p class="project-detail-label mb-3">Role</p>
                        <p class="text-lg font-semibold text-white">{{ $project['problem'] }}</p>
                    </div>

                    <div class="animate-on-scroll project-detail-card" data-animate="fadeInUp" data-delay="0.05">
                        <p class="project-detail-label mb-4">Tech Stack</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($project['tech'] as $tech)
                                <span class="tech-tag">{{ $tech }}</span>
                            @endforeach
                        </div>
                    </div>

                    @if (! empty($project['url']))
                        <div class="animate-on-scroll" data-animate="fadeInUp" data-delay="0.1">
                            <a
                                href="{{ $project['url'] }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="btn-primary group flex w-full justify-center"
                            >
                                <x-portfolio.icon name="external-link" class="h-4 w-4" />
                                <span>{{ $project['url_label'] }}</span>
                                <x-portfolio.icon name="arrow-right" class="h-4 w-4 transition-transform group-hover:translate-x-1" />
                            </a>
                        </div>
                    @endif
                </aside>

                {{-- Main content --}}
                <div class="space-y-8 lg:col-span-8">
                    <article class="animate-on-scroll project-detail-card" data-animate="fadeInUp">
                        <div class="mb-5 flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl border border-blue-500/20 bg-blue-500/10">
                                <x-portfolio.icon name="book" class="h-5 w-5 text-blue-400" />
                            </div>
                            <h2 class="text-xl font-bold text-white md:text-2xl">Project Overview</h2>
                        </div>
                        <p class="leading-relaxed text-gray-300">{{ $caseStudy['overview'] }}</p>
                    </article>

                    <div class="grid gap-6 md:grid-cols-2">
                        <article class="animate-on-scroll project-detail-card project-accent-challenge" data-animate="fadeInUp" data-delay="0.05">
                            <div class="mb-4 flex items-center gap-3">
                                <div class="flex h-9 w-9 items-center justify-center rounded-lg border border-blue-500/20 bg-blue-500/10">
                                    <x-portfolio.icon name="target" class="h-4 w-4 text-blue-400" />
                                </div>
                                <h2 class="text-lg font-bold text-white">The Challenge</h2>
                            </div>
                            <p class="text-sm leading-relaxed text-gray-400 md:text-base">{{ $caseStudy['challenge'] }}</p>
                        </article>

                        <article class="animate-on-scroll project-detail-card project-accent-solution" data-animate="fadeInUp" data-delay="0.1">
                            <div class="mb-4 flex items-center gap-3">
                                <div class="flex h-9 w-9 items-center justify-center rounded-lg border border-purple-500/20 bg-purple-500/10">
                                    <x-portfolio.icon name="zap" class="h-4 w-4 text-purple-400" />
                                </div>
                                <h2 class="text-lg font-bold text-white">The Solution</h2>
                            </div>
                            <p class="text-sm leading-relaxed text-gray-400 md:text-base">{{ $caseStudy['solution'] }}</p>
                        </article>
                    </div>

                    <article class="animate-on-scroll project-detail-card" data-animate="fadeInUp" data-delay="0.15">
                        <div class="mb-6 flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl border border-cyan-500/20 bg-cyan-500/10">
                                <x-portfolio.icon name="sparkles" class="h-5 w-5 text-cyan-400" />
                            </div>
                            <h2 class="text-xl font-bold text-white md:text-2xl">Key Features</h2>
                        </div>
                        <div class="grid gap-3 sm:grid-cols-2">
                            @foreach ($caseStudy['features'] as $feature)
                                <div class="project-feature-item">
                                    <div class="mt-1 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-cyan-500/20">
                                        <div class="h-1.5 w-1.5 rounded-full bg-cyan-400"></div>
                                    </div>
                                    <span class="text-sm text-gray-300 md:text-base">{{ $feature }}</span>
                                </div>
                            @endforeach
                        </div>
                    </article>

                    <article class="animate-on-scroll project-detail-card border-cyan-500/20 bg-linear-to-br from-cyan-500/5 to-transparent" data-animate="fadeInUp" data-delay="0.2">
                        <div class="mb-6 flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl border border-cyan-500/20 bg-cyan-500/10">
                                <x-portfolio.icon name="badge" class="h-5 w-5 text-cyan-400" />
                            </div>
                            <h2 class="text-xl font-bold text-white md:text-2xl">Outcomes</h2>
                        </div>
                        <ul class="space-y-4">
                            @foreach ($caseStudy['outcomes'] as $outcome)
                                <li class="flex items-start gap-3">
                                    <span class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-500/15">
                                        <x-portfolio.icon name="badge" class="h-3.5 w-3.5 text-emerald-400" />
                                    </span>
                                    <span class="leading-relaxed text-gray-300">{{ $outcome }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </article>
                </div>
            </div>
        </div>
    </section>

    {{-- Related projects --}}
    @if (count($relatedProjects) > 0)
        <section class="relative border-t border-white/10 py-20 pb-32">
            <div class="mx-auto max-w-6xl px-6">
                <x-portfolio.section-heading
                    title="More Projects"
                    subtitle="Explore other work from the portfolio"
                    class="mb-12"
                />

                <div class="grid gap-6 md:grid-cols-2">
                    @foreach ($relatedProjects as $related)
                        <a
                            href="{{ route('projects.show', $related['slug']) }}"
                            class="group animate-on-scroll surface-card block p-8"
                            data-animate="fadeInUp"
                            data-delay="{{ $loop->index * 0.1 }}"
                        >
                            <div class="mb-5 flex items-center justify-between">
                                <div class="icon-box p-3 transition-transform group-hover:scale-105">
                                    <x-portfolio.icon :name="$related['icon']" class="h-6 w-6 text-blue-400" />
                                </div>
                                <span class="tag-pill text-xs">{{ $related['category'] }}</span>
                            </div>
                            <h3 class="mb-2 text-xl font-bold text-white transition-colors group-hover:text-blue-300">
                                {{ $related['title'] }}
                            </h3>
                            <p class="mb-5 line-clamp-2 text-sm leading-relaxed text-gray-400">
                                {{ $related['description'] }}
                            </p>
                            <span class="inline-flex items-center gap-2 text-sm font-medium text-blue-400 transition-colors group-hover:text-blue-300">
                                View case study
                                <x-portfolio.icon name="arrow-right" class="h-4 w-4 transition-transform group-hover:translate-x-1" />
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-portfolio.layout>
