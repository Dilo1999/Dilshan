@php($educations = config('portfolio.education'))

<section id="education" class="relative py-32">
    <div class="absolute inset-0 bg-linear-to-b from-[#0a0e1a] via-cyan-950/10 to-[#0a0e1a]"></div>

    <div class="relative z-10 mx-auto max-w-7xl px-6">
        <x-portfolio.section-heading
            title="Academic Foundation"
            :subtitle="config('portfolio.education_subtitle')"
        />

        <div class="space-y-8">
            @foreach ($educations as $edu)
                <article class="group relative animate-on-scroll" data-animate="fadeInUp" data-delay="{{ $loop->index * 0.1 }}">
                    <div class="absolute -inset-1 rounded-2xl bg-linear-to-r from-blue-600 to-purple-600 opacity-0 blur transition duration-500 group-hover:opacity-20"></div>

                    <div class="relative glass-panel p-8 transition-all duration-300 hover:border-white/20">
                        <div class="grid items-start gap-6 md:grid-cols-12">
                            <div class="md:col-span-3">
                                <div class="mb-4 inline-flex rounded-xl border border-white/20 bg-linear-to-br {{ $edu['gradient'] }} p-4 transition-transform group-hover:scale-110">
                                    <x-portfolio.icon :name="$edu['icon']" class="h-8 w-8 text-white" />
                                </div>

                                <div class="space-y-2">
                                    <div class="flex items-center gap-2">
                                        <x-portfolio.icon name="badge" class="h-4 w-4 text-cyan-400" />
                                        <span class="text-sm text-cyan-400">Verified</span>
                                    </div>
                                    <div class="text-sm text-gray-400">{{ $edu['duration'] }}</div>
                                </div>
                            </div>

                            <div class="space-y-6 md:col-span-9">
                                <div>
                                    <h3 class="mb-2 text-2xl font-bold transition-all group-hover:text-gradient-primary">
                                        {{ $edu['degree'] }}
                                    </h3>
                                    <div class="mb-4 flex items-center gap-2 text-gray-300">
                                        <x-portfolio.icon name="book" class="h-4 w-4" />
                                        <span>{{ $edu['institution'] }}</span>
                                    </div>

                                    <div class="mb-4 rounded-xl border border-white/10 bg-linear-to-br from-white/5 to-white/2 p-4">
                                        <div class="flex items-start gap-2">
                                            <x-portfolio.icon name="sparkles" class="mt-1 h-4 w-4 shrink-0 text-purple-400" />
                                            <div>
                                                <div class="mb-1 text-sm text-gray-400">Key Achievement</div>
                                                <p class="text-sm text-gray-300">{{ $edu['achievement'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="mb-3 text-sm text-gray-400">Focus Areas</div>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($edu['focus_areas'] as $area)
                                            <span class="cursor-pointer rounded-lg border border-white/20 bg-linear-to-r {{ $edu['gradient'] }} px-4 py-2 text-sm text-gray-300 transition-all hover:scale-105 hover:border-white/30">
                                                {{ $area }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="absolute top-4 right-4 rounded-full border border-white/20 bg-linear-to-r {{ $edu['gradient'] }} px-3 py-1 text-xs opacity-0 transition-opacity group-hover:opacity-100">
                            Credential #{{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-3">
            @foreach (config('portfolio.education_stats') as $stat)
                <div class="group glass-panel p-6 text-center transition-all duration-300 hover:border-blue-500/30">
                    <x-portfolio.icon :name="$stat['icon']" class="mx-auto mb-3 h-6 w-6 text-blue-400 transition-transform group-hover:scale-110" />
                    <div class="mb-1 text-3xl font-bold text-gradient-primary">{{ $stat['value'] }}</div>
                    <div class="text-sm text-gray-400">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>
