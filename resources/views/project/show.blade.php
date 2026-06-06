@php
    $caseStudy = $project['case_study'];
@endphp

<x-portfolio.layout :title="$title">
    <section class="relative overflow-hidden pt-24 pb-16">
        <div class="absolute inset-0 bg-linear-to-b from-blue-950/20 via-purple-950/10 to-[#0a0e1a]"></div>
        <div class="absolute top-1/4 left-1/4 h-96 w-96 rounded-full bg-blue-500/10 blur-[128px]"></div>
        <div class="absolute right-1/4 bottom-0 h-96 w-96 rounded-full bg-purple-500/10 blur-[128px]"></div>

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
                    <div class="rounded-xl border border-white/20 bg-linear-to-br {{ $project['gradient'] }} p-4 shadow-lg shadow-purple-500/20">
                        <x-portfolio.icon :name="$project['icon']" class="h-10 w-10 text-white" />
                    </div>
                    <div>
                        <span class="mb-3 inline-block rounded-full border border-white/20 bg-linear-to-r {{ $project['gradient'] }} px-3 py-1 text-xs opacity-90">
                            {{ $project['category'] }}
                        </span>
                        <h1 class="text-4xl font-bold text-gradient-hero md:text-5xl">{{ $project['title'] }}</h1>
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
                            <span class="rounded-lg border border-white/10 bg-white/10 px-3 py-1.5 text-sm text-gray-300">
                                {{ $tech }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="relative py-16">
        <div class="mx-auto max-w-5xl space-y-6 px-6">
            <article class="glass-panel animate-on-scroll p-8" data-animate="fadeInUp">
                <h2 class="mb-4 text-2xl font-bold text-gradient-primary">Project Overview</h2>
                <p class="leading-relaxed text-gray-300">{{ $caseStudy['overview'] }}</p>
            </article>

            <div class="grid gap-6 md:grid-cols-2">
                <article class="glass-panel animate-on-scroll p-8" data-animate="fadeInUp" data-delay="0.1">
                    <div class="mb-4 flex items-center gap-3">
                        <div class="rounded-lg border border-white/20 bg-linear-to-br from-red-500/20 to-orange-500/20 p-2">
                            <x-portfolio.icon name="target" class="h-5 w-5 text-orange-300" />
                        </div>
                        <h2 class="text-xl font-bold">The Challenge</h2>
                    </div>
                    <p class="leading-relaxed text-gray-300">{{ $caseStudy['challenge'] }}</p>
                </article>

                <article class="glass-panel animate-on-scroll p-8" data-animate="fadeInUp" data-delay="0.15">
                    <div class="mb-4 flex items-center gap-3">
                        <div class="rounded-lg border border-white/20 bg-linear-to-br from-blue-500/20 to-cyan-500/20 p-2">
                            <x-portfolio.icon name="zap" class="h-5 w-5 text-cyan-300" />
                        </div>
                        <h2 class="text-xl font-bold">The Solution</h2>
                    </div>
                    <p class="leading-relaxed text-gray-300">{{ $caseStudy['solution'] }}</p>
                </article>
            </div>

            <article class="glass-panel animate-on-scroll p-8" data-animate="fadeInUp" data-delay="0.2">
                <h2 class="mb-6 text-2xl font-bold text-gradient-primary">Key Features</h2>
                <div class="grid gap-4 md:grid-cols-2">
                    @foreach ($caseStudy['features'] as $feature)
                        <div class="flex items-start gap-3 rounded-xl border border-white/10 bg-white/5 p-4">
                            <div class="mt-1.5 h-2 w-2 shrink-0 rounded-full bg-linear-to-r {{ $project['gradient'] }}"></div>
                            <span class="text-gray-300">{{ $feature }}</span>
                        </div>
                    @endforeach
                </div>
            </article>

            <article class="glass-panel animate-on-scroll p-8" data-animate="fadeInUp" data-delay="0.25">
                <h2 class="mb-6 text-2xl font-bold text-gradient-primary">Outcomes</h2>
                <div class="space-y-4">
                    @foreach ($caseStudy['outcomes'] as $outcome)
                        <div class="flex items-start gap-3">
                            <x-portfolio.icon name="badge" class="mt-0.5 h-5 w-5 shrink-0 text-green-400" />
                            <span class="text-gray-300">{{ $outcome }}</span>
                        </div>
                    @endforeach
                </div>
            </article>
        </div>
    </section>

    @if (count($relatedProjects) > 0)
        <section class="relative py-16 pb-32">
            <div class="mx-auto max-w-5xl px-6">
                <h2 class="animate-on-scroll mb-8 text-2xl font-bold" data-animate="fadeInUp">More Projects</h2>
                <div class="grid gap-6 md:grid-cols-2">
                    @foreach ($relatedProjects as $related)
                        <a
                            href="{{ route('projects.show', $related['slug']) }}"
                            class="group animate-on-scroll glass-panel block p-6 transition-all duration-300 hover:-translate-y-1 hover:border-white/20"
                            data-animate="fadeInUp"
                            data-delay="{{ $loop->index * 0.1 }}"
                        >
                            <div class="mb-4 flex items-center justify-between">
                                <div class="rounded-xl border border-white/20 bg-linear-to-br {{ $related['gradient'] }} p-3">
                                    <x-portfolio.icon :name="$related['icon']" class="h-6 w-6 text-white" />
                                </div>
                                <span class="rounded-full border border-white/20 bg-linear-to-r {{ $related['gradient'] }} px-3 py-1 text-xs opacity-80">
                                    {{ $related['category'] }}
                                </span>
                            </div>
                            <h3 class="mb-2 text-xl font-bold transition-all group-hover:text-gradient-primary">{{ $related['title'] }}</h3>
                            <p class="line-clamp-2 text-sm text-gray-400">{{ $related['description'] }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-portfolio.layout>
