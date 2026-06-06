@php($projects = config('portfolio.projects'))

<section id="projects" class="relative py-32">
    <div class="mx-auto max-w-7xl px-6">
        <x-portfolio.section-heading
            title="Featured Projects"
            :subtitle="config('portfolio.projects_subtitle')"
        />

        <div class="grid gap-6 md:grid-cols-2">
            @foreach ($projects as $project)
                <article
                    class="group animate-on-scroll glass-panel p-8 transition-all duration-300 hover:-translate-y-2 hover:border-white/20"
                    data-animate="fadeInUp"
                    data-delay="{{ $loop->index * 0.1 }}"
                >
                    <div class="space-y-6">
                        <div class="flex items-start justify-between">
                            <div class="rounded-xl border border-white/20 bg-linear-to-br {{ $project['gradient'] }} p-4 transition-transform group-hover:scale-110">
                                <x-portfolio.icon :name="$project['icon']" class="h-8 w-8 text-white" />
                            </div>
                            <span class="rounded-full border border-white/20 bg-linear-to-r {{ $project['gradient'] }} px-3 py-1 text-xs opacity-80">
                                {{ $project['category'] }}
                            </span>
                        </div>

                        <div>
                            <h3 class="mb-3 text-2xl font-bold transition-all group-hover:text-gradient-primary">
                                {{ $project['title'] }}
                            </h3>
                            <p class="mb-4 leading-relaxed text-gray-300">{{ $project['description'] }}</p>

                            <div class="mb-4 rounded-lg border border-white/10 bg-white/5 p-4">
                                <div class="mb-1 text-sm text-gray-400">Role</div>
                                <div class="text-sm text-gray-300">{{ $project['problem'] }}</div>
                            </div>
                        </div>

                        <div>
                            <div class="mb-3 text-sm text-gray-400">Tech Stack</div>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($project['tech'] as $tech)
                                    <span class="rounded-lg border border-white/10 bg-white/10 px-3 py-1.5 text-sm text-gray-300 transition-colors hover:border-white/20">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <button type="button" class="group/btn flex w-full items-center justify-center gap-2 rounded-xl border border-blue-500/30 bg-linear-to-r from-blue-600/20 to-purple-600/20 px-4 py-3 transition-all duration-300 hover:border-blue-500/50">
                            <span>View Case Study</span>
                            <x-portfolio.icon name="arrow-right" class="h-4 w-4 transition-transform group-hover/btn:translate-x-1" />
                        </button>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
