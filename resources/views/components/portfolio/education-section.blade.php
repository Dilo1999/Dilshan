@php($educations = config('portfolio.education'))

<section id="education" class="relative py-32 portfolio-section">
    <div class="mx-auto max-w-7xl px-6">
        <x-portfolio.section-heading
            title="Academic Foundation"
            :subtitle="config('portfolio.education_subtitle')"
        />

        <div class="space-y-8">
            @foreach ($educations as $edu)
                <article class="group relative animate-on-scroll" data-animate="fadeInUp" data-delay="{{ $loop->index * 0.1 }}">
                    <div class="glass-panel p-8 transition-shadow group-hover:shadow-md">
                        <div class="grid items-start gap-6 md:grid-cols-12">
                            <div class="md:col-span-3">
                                <div class="icon-box mb-4 inline-flex p-4 transition-transform group-hover:scale-105">
                                    <x-portfolio.icon :name="$edu['icon']" class="h-8 w-8 text-zinc-600" />
                                </div>

                                <div class="space-y-2">
                                    <div class="flex items-center gap-2">
                                        <x-portfolio.icon name="badge" class="h-4 w-4 text-zinc-500" />
                                        <span class="text-sm text-zinc-600">Verified</span>
                                    </div>
                                    <div class="text-sm text-zinc-500">{{ $edu['duration'] }}</div>
                                </div>
                            </div>

                            <div class="space-y-6 md:col-span-9">
                                <div>
                                    <h3 class="mb-2 text-2xl font-bold text-zinc-900">
                                        {{ $edu['degree'] }}
                                    </h3>
                                    <div class="mb-4 flex items-center gap-2 text-zinc-600">
                                        <x-portfolio.icon name="book" class="h-4 w-4" />
                                        <span>{{ $edu['institution'] }}</span>
                                    </div>

                                    <div class="inner-panel mb-4 p-4">
                                        <div class="flex items-start gap-2">
                                            <x-portfolio.icon name="sparkles" class="mt-1 h-4 w-4 shrink-0 text-zinc-500" />
                                            <div>
                                                <div class="mb-1 text-sm text-zinc-500">Key Achievement</div>
                                                <p class="text-sm text-zinc-600">{{ $edu['achievement'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="mb-3 text-sm text-zinc-500">Focus Areas</div>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($edu['focus_areas'] as $area)
                                            <span class="tag-pill transition-all hover:scale-105">{{ $area }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tag-pill absolute top-4 right-4 text-xs opacity-0 transition-opacity group-hover:opacity-100">
                            Credential #{{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-3">
            @foreach (config('portfolio.education_stats') as $stat)
                <div class="group glass-panel p-6 text-center">
                    <x-portfolio.icon :name="$stat['icon']" class="mx-auto mb-3 h-6 w-6 text-zinc-500 transition-transform group-hover:scale-110" />
                    <div class="mb-1 text-3xl font-bold text-zinc-900">{{ $stat['value'] }}</div>
                    <div class="text-sm text-zinc-500">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>
